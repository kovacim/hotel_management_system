<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
Use Cake\Auth\DefaultPasswordHasher;
use DateInterval;
use Cake\Utility\Xml;


class UsersController extends AppController
{
    public function beforeFilter(Event $event){

        $this->Auth->allow(['login', 'register']);

    }


//    public  function convert(){
//
/*        $xmlString = '<?xml version="1.0"?><root><child>value</child></root>';*/
//        $xmlArray = Xml::toArray(Xml::build($xmlString));
//        $data = [
//            'post' => [
//                'id' => 1,
//                'title' => 'Best post',
//                'body' => ' ... '
//            ]
//        ];
//        $xmlObject = Xml::fromArray($data);
//        $xmlString = $xmlObject->asXML();
//        dd($xmlString);
//        $this->set('xmlString', $xmlString);
//    }
    public function index()
    {
        $this->set('rooms', TableRegistry::get('Rooms')->find()->count());
        $this->set('guests', TableRegistry::get('Guests')->find()->count());

        $now = Time::now();
        $time_now = $now->i18nFormat('yyyy-MM-dd');
        $time_before = $now->modify('- 5 days ');

        $arrivals = TableRegistry::get('Bookings')->find()->where(['check_in'=>$time_now])->count();
        $this->set('arrivals', $arrivals);

        $recent_bookings = TableRegistry::get('Bookings')->find('all')->where(['created >'=>$time_before])->count();
        $this->set('recent_bookings', $recent_bookings);


    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        if ($this->Auth->user()) {

            return $this->redirect($this->Auth->redirectUrl(['controller'=>'users']));

        } else  {

            if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl(['controller'=>'users']));
                } else {

                    $this->Flash->error('Incorrect password or username');

                }
            }
        }
    }

    public function register(){
        $this->viewBuilder()->setLayout('login');

        if($this->request->is('post')) {
            $userTable = TableRegistry::get('Users');
            $user = $this->Users->newEntity();
            $hasher = new DefaultPasswordHasher();
            $myname = $this->request->getData('name');
            $myemail = $this->request->getData('email');
            $mypass = $hasher->hash($this->request->getData('password'));

            $user->name = $myname;
            $user->email = $myemail;
            $user->password = $mypass;
            $userTable->save($user);

            if ($userTable->save($user)) {
                $this->Flash->success('Successfully registered');
            } else {
                $this->Flash->error('Register failed, please try again');
            }

        }
    }


    // Logout
    public function logout(){
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }


}
