<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Crisis Controller
 *
 * @property \App\Model\Table\CrisisTable $Crisis
 */
class CrisisController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout','add','view','index','edit']);
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('crisis', $this->paginate($this->Crisis));
        $this->set('_serialize', ['crisis']);
    }

    /**
     * View method
     *
     * @param string|null $id Crisi id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crisi = $this->Crisis->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('crisi', $crisi);
        $this->set('_serialize', ['crisi']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crisi = $this->Crisis->newEntity();
        if ($this->request->is('post')) {
            $crisi = $this->Crisis->patchEntity($crisi, $this->request->data);
            if ($this->Crisis->save($crisi)) {
                $this->Flash->success(__('The crisi has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crisi could not be saved. Please, try again.'));
            }
        }
        $users = $this->Crisis->Users->find('list', ['limit' => 200]);
        $this->set(compact('crisi', 'users'));
        $this->set('_serialize', ['crisi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Crisi id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crisi = $this->Crisis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crisi = $this->Crisis->patchEntity($crisi, $this->request->data);
            if ($this->Crisis->save($crisi)) {
                $this->Flash->success(__('The crisi has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crisi could not be saved. Please, try again.'));
            }
        }
        $users = $this->Crisis->Users->find('list', ['limit' => 200]);
        $this->set(compact('crisi', 'users'));
        $this->set('_serialize', ['crisi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Crisi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crisi = $this->Crisis->get($id);
        if ($this->Crisis->delete($crisi)) {
            $this->Flash->success(__('The crisi has been deleted.'));
        } else {
            $this->Flash->error(__('The crisi could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
