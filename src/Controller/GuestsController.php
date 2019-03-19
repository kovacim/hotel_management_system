<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Guests Controller
 *
 *
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GuestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $guests = TableRegistry::get('Guests')->find()->all();
        $this->set('guests', $guests);

    }

    /**
     * View method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => []
        ]);

        $this->set('guest', $guest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guest = $this->Guests->newEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The guest could not be saved. Please, try again.'));
        }
        $this->set(compact('guest'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The guest could not be saved. Please, try again.'));
        }
        $this->set(compact('guest'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $guest = $this->Guests->get($id);
        if ($this->Guests->delete($guest)) {
            $this->Flash->success(__('The guest has been deleted.'));
        } else {
            $this->Flash->error(__('The guest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
