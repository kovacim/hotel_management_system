<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use function PHPSTORM_META\type;

class RoomsController extends AppController
{


    public function index()
    {
        $rooms  = TableRegistry::get('Rooms')->find()->all();
        $this->set('rooms', $rooms);
    }


    public function view($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => []
        ]);

        $this->set('room', $room);
    }


    public function add()
    {
        $rooms = TableRegistry::get('Rooms');
        $this->set('rooms', $rooms->find()->select(['type'])->distinct(['type'])->all());
        $room = $rooms->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
    }


    public function edit($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
//        $this->set(compact('room'));
        $this->set('room', $room);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        if ($this->Rooms->delete($room)) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function showAvailability(){
        $rooms = TableRegistry::get('Rooms')->find()->all();

        $this->set('rooms', $rooms);
        $now = Time::now();
        $calendar = array();
        $red = array(array());
        if ($this->request->is('post')) {
            $from = $this->request->getData('from');
            $to = $this->request->getData('to');
            $from_dt = new Date($from);
            $to_dt = new Date($to);

            foreach ($rooms as $room){
                $bookings = TableRegistry::get('Bookings')->find()->where(['check_in >='=>$from_dt, 'check_out <='=>$to_dt, 'room_nr'=>$room['id']])->all();
                foreach ($bookings as $key=>$booking){
                    $start = new Date($booking['check_in']);
                    $end = new Date($booking['check_out']);
                    for ($row=0; $row<count($rooms); $row++){
                        for ($col=$start->day; $col<$end->day; $col++){

                        }
                    }
                }
            }

//            $bookings = TableRegistry::get('Bookings')->find()->where(['check_in >='=>$from_dt, 'check_out <='=>$to_dt])->all();
//            foreach($bookings as $key=>$value) {
//                $date = new Date($value['check_in']);
//                dd($date->i18nFormat('yyyy-mm-dd'));
//            }


            if ($to_dt->month > $from_dt->month) {
                for ($i = $from_dt->month; $i <= $to_dt->month; $i++) {
                    $jd=cal_to_jd(0, $i, 2, 2019);
                    if ($i == $from_dt->month) {
                        for ($j = $from_dt->day; $j <= cal_days_in_month(0, $from_dt->month, 2019); $j++) {
                            array_push($calendar, $j.'-'.jdmonthname($jd, 0));
                        }
                    } elseif ($i == $to_dt->month) {
                        for ($j = 1; $j <= $to_dt->day; $j++) {
                            array_push($calendar, $j.'-'.jdmonthname($jd, 0));
                        }
                    } else {
                        for ($j = 1; $j <= cal_days_in_month(0, $i, 2019); $j++) {
                            array_push($calendar, $j.'-'.jdmonthname($jd, 0));
                        }

                    }
                }
            } else {
                for ($j = $from_dt->day; $j <= $to_dt->day; $j++) {
                    $jd=cal_to_jd(0, $from_dt->month, 2, 2019);
                    array_push($calendar, $j.'-'.jdmonthname($jd, 0));
                }
            }

        $this->set('calendar', $calendar);

        } else {

            $this->set('calendar', $calendar);
        }

    }
}
