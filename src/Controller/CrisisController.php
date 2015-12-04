<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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
        $this->Auth->allow(['add','view','index','test']);

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
        $infos = $this->Crisis->Infos->find()
        ->where(['crisis_id' => $id])
        ->order(['created' => 'DESC']);

        $this->set('crisi', $crisi);
        $this->set('infos', $infos);
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
        if (isset($this->request->data))
        {
            $crisi = $this->Crisis->patchEntity($crisi, $this->request->data);
            //do magic here
            $crisis = $this->Crisis->find("all");
            $delta_search = 0.5;
            foreach ($crisis as $crisi_db){
             if (abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search
                && abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search ) {   //1° lat/long-> 111 km
                  $crisi_db->severity += 1;
                  $this->Crisis->save($crisi_db);
                  $this->Flash->success('Crisis Already notified so we are incrementing severity..');
                  return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                }
            }

            if ($this->Crisis->save($crisi))
            {
                $this->Flash->success(__('La crise a bien été enregistrée.'));
            }
            else
            {
                $this->Flash->error(__('La crise n\'a pas pu être enregistrée.'));
            }

            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        }
        /*$users = $this->Crisis->Users->find('list', ['limit' => 200]);
        $this->set(compact('crisi', 'users'));
        $this->set('_serialize', ['crisi']);*/
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
                $this->Flash->success(__('La crise a bien été enregistrée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La crise n\'a pas pu être enregistrée.'));
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
            $this->Flash->success(__('La crise a bien été supprimée.'));
        } else {
            $this->Flash->error(__('La crise n\'a pas pu être supprimée.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function test()
    {
      $crisi = $this->Crisis->newEntity();
      if (isset($this->request->data))
      {
          $crisi = $this->Crisis->patchEntity($crisi, $this->request->data);
          //do magic here
          $crisis = $this->Crisis->find("all");
          $delta_search = 0.5;
          foreach ($crisis as $crisi_db){
           if (abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search
              && abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search ) {   //1° lat/long-> 111 km
                $crisi_db->severity += 1;
                $this->Crisis->save($crisi_db);
                $this->Flash->success('Crisis Already notified - Increment severity..');
              }
          }

        if ($this->Crisis->save($crisi))
        {
          $this->Flash->success(__('La crise a bien été enregistrée.'));
        }
        else
        {
          $this->Flash->error(__('La crise n\'a pas pu être enregistrée.'));
        }

      }
      $users = $this->Crisis->Users->find('list', ['limit' => 200]);
      $this->set(compact('crisi', 'users'));
      $this->set('_serialize', ['crisi']);
    }

    public function isAuthorized($user)
    {
       $state = $this->Crisis->get($this->request->params['pass'][0])->state;

        if($this->request->action === 'edit')
        {
            if($state === 'spotted') //Anyone can still edit it
            {
                return true;
            }

            elseif($state === 'verified') //A logged user can edit or delete a verified crisis
            {
                return true;
            }

            else //An over crisis can't be modified
            {
                return false;
            }
        }

        //A logged user can delete a crisis
        if($this->request->action === 'delete' && $user['id'] > 0)
        {
            return true;
        }

        return parent::isAuthorized($user);
    }
}
