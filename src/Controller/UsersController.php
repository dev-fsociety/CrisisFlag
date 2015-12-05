<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout']);
    }

    public function isAuthorized($user)
    {
        if(isset($user) && ($this->request->action === 'view' || $this->request->action === 'index' || $this->request->action === 'add'))
        {
            return true;
        }

        if(in_array($this->request->action, ['edit', 'delete']))
        {
            if((int)$this->request->params['pass'][0] === $user['id'] || (isset($user) && $user['id'] === 1))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function login()
    {
          if($this->request->is('post'))
          {
                $user = $this->Auth->identify();

                if($user)
                {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('Vous êtes maintenant connecté.'));
                    return $this->redirect($this->Auth->redirectUrl());
                }

                $this->Flash->error(__('Identifiant et / ou mot de passe incorrect(s).'));
          }
    }

    public function logout()
    {
        $this->Flash->warning("Vous êtes maintenant déconnecté.");
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Articles', 'Crisis', 'Infos']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('L\'utilisateur a bien été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas pu être sauvegardé.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('L\'utilisateur a bien été sauvegardé'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas pu être sauvegardé'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('L\'utilisateur a bien été sauvegardé.'));
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a pas pu être sauvegardé.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
