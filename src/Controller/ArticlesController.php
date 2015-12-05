<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public $categories = ['articlePresse' => 'Article de presse', 'conseil' => 'Conseil', 'edito' => 'Éditorial', 'news' => 'Nouveautés'];

  /**
   * beforeFilter method
   *
   * @return void
   */

   public function beforeFilter(Event $event)
   {
       parent::beforeFilter($event);
       $this->Auth->allow(['view','index']);
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
        $this->set('articles', $this->paginate($this->Articles));
        $this->set('_serialize', ['articles']);
        $this->set('categories', $this->categories);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
        $this->set('categories', $this->categories);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user_id = $this->Auth->user()['id'];
        $article = $this->Articles->newEntity();
        if ($this->request->is('post'))
        {
            $article->user_id = $user_id;
            $article = $this->Articles->patchEntity($article, $this->request->data);
            $article->user_id = $this->Auth->user('id');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('article', 'users'));
        $this->set('_serialize', ['article']);
        $this->set('categories', $this->categories);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users'));
        $this->set('_serialize', ['article']);
        $this->set('categories', $this->categories);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
    * isAuthorized method
    *
    * @param $user
    * @return True or False
    */
    public function isAuthorized($user)
    {
      // All registered users can add articles
      if($this->request->action === 'add')
      {
        return true;
      }

      // The owner of an article can edit and delete it
      if(in_array($this->request->action, ['edit', 'delete']))
      {
        $articleId = (int)$this->request->params['pass'][0];

        if($this->Articles->isOwnedBy($articleId, $user['id']))
        {
          return true;
        }
      }

      return parent::isAuthorized($user);
    }
}
