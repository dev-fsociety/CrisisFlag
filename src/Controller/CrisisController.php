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

    public $state_t = ['spotted' => 'Signalée', 'verified' => 'Vérifiée', 'over' => 'Terminée'];

    public $categories = ['Accidents trains/avions', 'Attentat', 'Braquage', 'Chute de météorite', 'Danger chimique', 'Danger nucléaire', 'Danger industriel (explosion)', 'Épidémie', 'Éruption volcanique', 'Inondations', 'Incendie (majeur)', 'Ouragan', 'Séisme', 'Tempête de sable', 'Tornade', 'Tsunami'];

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['add', 'edit', 'view', 'index', 'test', 'severityIncrement', 'severityDecrement']);
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $crisis = $this->Crisis->find()->order(['created' => 'desc']);
        $this->set('crisis', $this->paginate($crisis));
        $this->set('state_t', $this->state_t);
        $this->set('_serialize', ['crisis']);
    }

    public function validate($id_crise)
    {
        $crisis = $this->Crisis->get($id_crise);
        $crisis->state = 'verified';
        if($this->Crisis->save($crisis))
        {
            $this->Flash->success(__('Crise validée !'));
        }
        else
        {
            $this->Flash->error(__('Impossible de valider la crise.'));
        }

        return $this->redirect(['action' => 'view', $id_crise]);
    }

    public function terminate($id_crise)
    {
        $crisis = $this->Crisis->get($id_crise);
        $crisis->state = 'over';
        if($this->Crisis->save($crisis))
        {
            $this->Flash->success(__('Crise terminée !'));
        }
        else
        {
            $this->Flash->error(__('Impossible de terminer la crise.'));
        }

        return $this->redirect(['action' => 'view', $id_crise]);
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
        $crisi = $this->Crisis->get($id);

        $user = 0;
        if($crisi->user_id != 0)
            $user = $this->Crisis->Users->get($crisi->user_id);

        $infos = $this->Crisis->Infos->find()
        ->where(['crisis_id' => $id])
        ->order(['created' => 'DESC']);

        $this->set('crisi', $crisi);
        $this->set('user', $user);
        $this->set('infos', $infos);
        $this->set('_serialize', ['crisi']);

        $this->set("categories", $this->categories);
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
            $crisis = $this->Crisis->find('all');
            $delta_search = 0.5;
            foreach ($crisis as $crisi_db){
             if (abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search
                && abs($crisi_db['latitude'] - $crisi['latitude'] ) < $delta_search && $crisi_db->state != 'over') {   //1° lat/long-> 111 km
                  $crisi_db->severity += 1;
                  if($this->Crisis->save($crisi_db))
                  {
                    $this->Flash->success('Cette crise a déjà été signalée, nous incrémentons sa gravité.');
                  }
                  else
                  {
                    $this->Flash->error('La crise n\'a pas pu être enregistrée.');
                  }

                  return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
                }
            }

            if($this->Crisis->save($crisi))
            {
                $this->Flash->success(__('La crise a bien été enregistrée.'));
            }
            else
            {
                $this->Flash->error(__('La crise n\'a pas pu être enregistrée.'));
            }

            return $this->redirect(['controller' => 'Homes', 'action' => 'index']);
        }
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
                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('La crise n\'a pas pu être enregistrée.'));
            }
        }
        $users = $this->Crisis->Users->find('list', ['limit' => 200]);
        $this->set("categories", $this->categories);
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

    /**
     * Increment method
     *
     * @param string|null $id Crisi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function severityIncrement($id = null)
    {
      $crisi = $this->Crisis->get($id);
      $crisi->severity += 1;
      if ($this->Crisis->save($crisi)) {
              $this->Flash->success(__('Merci pour l\'information.'));
        } else {
              $this->Flash->error(__('Désolé, nous avons rencontré une erreur...'));
        }
        return $this->redirect(['action' => 'view',$crisi->id]);
    }

    /**
     * Decrement method
     *
     * @param string|null $id Crisi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function severityDecrement($id = null)
    {
      $crisi = $this->Crisis->get($id);
      $crisi->severity -= 1;
      if ($this->Crisis->save($crisi)) {
              $this->Flash->success(__('Merci pour l\'information.'));
        } else {
              $this->Flash->error(__('Désolé, nous avons rencontré une erreur...'));
        }
        return $this->redirect(['action' => 'view',$crisi->id]);
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

          elseif($state === 'verified' && isset($user)) //A logged user can edit a verified crisis
          {
              return true;
          }

          else //An over crisis can't be modified
          {
              return false;
          }
      }

      //A logged user can delete, validate or terminate a crisis
      if(isset($user) && ($this->request->action === 'delete' || $this->request->action === 'validate' || $this->request->action === 'terminate'))
      {
        return true;
      }

      return parent::isAuthorized($user);
  }
}
