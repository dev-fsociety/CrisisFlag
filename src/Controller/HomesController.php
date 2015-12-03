<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Homes Controller
 *
 */

class HomesController extends AppController
{
	public function beforeFilter(Event $event)
	{
			parent::beforeFilter($event);
			$this->Auth->allow(['logout','add','view','index','edit']);
	}

	public function index()
	{
		$this->loadModel('Crisis');
		$this->loadModel('Articles');

		$spottedCrises = $this->Crisis->find()
		->contain('Infos')
		->where(['state' => 'spotted']);
		if($spottedCrises->count() != 0)
		{
			$home_type = 'spotted';
		}

		$verifiedCrises = $this->Crisis->find()
		->contain('Infos')
		->where(['state' => 'verified']);
		if($verifiedCrises->count() != 0)
		{
			$home_type = 'active';

		}
		else
		{
			$home_type = 'none';
		}

		$articles = $this->Articles->find('all')->limit(5)->order('created');

		$this->set(compact('spottedCrises', 'verifiedCrises', 'articles'));

	}
}

?>
