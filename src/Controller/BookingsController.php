<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use function PHPSTORM_META\type;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 *
 * @method \App\Model\Entity\Booking[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookingsController extends AppController
{

    public function index()
    {
        $bookings = TableRegistry::get('Bookings')->find()->all();
        $this->set('bookings', $bookings);

    }

    public function add()
    {
        $booking = $this->Bookings->newEntity();
        $guests = TableRegistry::get('Guests');

        $rooms = TableRegistry::get('Rooms');
        $this->set('rooms', $rooms->find()->select(['type'])->distinct(['type'])->all());

        if ($this->request->is('post')) {
            $guest = $guests->newEntity();
            $check_in = strtotime($this->request->getData('check_in'));
            $check_out = strtotime($this->request->getData('check_out'));
            $diff = $check_out-$check_in;
            $nr_days = $diff/60/60/24;
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());


            $value = $this->request->getData('room_type');
            $room_type = '';
            switch ($value){
                case 0: {
                    $room_type = 'double';
                    break;
                }
                case 1: {
                    $room_type = 'quadruple';
                    break;
                }
                case 2: {
                    $room_type = 'single';
                    break;
                }
                case 3: {
                    $room_type = 'suite';
                    break;
                }
                case 4: {
                    $room_type = 'triple';
                    break;
                }
                case 5: {
                    $room_type = 'twin';
                    break;
                }
            }
            $room = $rooms->find()->where(['type'=>$room_type])->first();
            $booking->room_nr = $room['id'];
            $booking->room_type = $room_type;
            $booking->total_cost=$nr_days * $room['price'];
            if ($nr_days>0){
                if ($this->Bookings->save($booking)) {
                    $guest = $guests->patchEntity($guest, $this->request->getData());
                    if ($this->request->getData('state')==null){
                        $guest->state = null;
                    }

                    $guests->save($guest);

                    $this->Flash->success(__('Your reservation has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Your reservation could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error('Minimum stay is at least 1 night, please reset your check-in and check-out dates ');
            }

        }
        $this->set(compact('booking'));

    }


    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('Your reservation has been changed.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your reservation could not be changed. Please, try again.'));
        }
//        $this->set(compact('booking'));
        $this->set('booking', $booking);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('Your reservation has been deleted.'));
        } else {
            $this->Flash->error(__('Your reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function showArrivals(){
        $now = Time::now();
        $time_now = $now->i18nFormat('yyyy-MM-dd');

        $arrivals = TableRegistry::get('Bookings')->find()->where(['check_in'=>$time_now])->all();
        $departures = TableRegistry::get('Bookings')->find()->where(['check_out'=>$time_now])->all();
        $guests = TableRegistry::get('Bookings')->find()->where(['check_in <' =>$time_now, 'check_out >'=>$time_now])->all();

        $nr_arrivals = TableRegistry::get('Bookings')->find()->where(['check_in'=>$time_now])->count();
        $this->set('nr_arrivals', $nr_arrivals);
        $nr_departures = TableRegistry::get('Bookings')->find()->where(['check_out'=>$time_now])->count();
        $this->set('nr_departures', $nr_departures);
        $nr_in_house = TableRegistry::get('Bookings')->find()->where(['check_in <' =>$time_now, 'check_out >'=>$time_now])->count();
        $this->set('nr_in_house', $nr_in_house);

        $this->set('arrivals', $arrivals);
        $this->set('departures', $departures);
        $this->set('guests', $guests);
        $this->set('time_now', $time_now);
    }


}
