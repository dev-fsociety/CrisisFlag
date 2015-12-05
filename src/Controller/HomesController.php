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
    public $categories = ['Accidents trains/avions', 'Attentat', 'Braquage', 'Chute de météorite', 'Danger chimique', 'Danger nucléaire', 'Danger industriel (explosion)', 'Épidémie', 'Éruption volcanique', 'Inondations', 'Incendie (majeur)', 'Ouragan', 'Séisme', 'Tempête de sable', 'Tornade', 'Tsunami'];

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index']);
	}

	public function index()
	{
		$this->loadModel('Crisis');
		$this->loadModel('Articles');

		$spottedCrises = $this->Crisis->find()
		->contain('Infos')
		->where(['state' => 'spotted']);

		$home_type = 'none';

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

		$newCrisis = $this->Crisis->newEntity();
		$newCrisis->state = 'spotted';
		$newCrisis->severity = 1;
		$newCrisis->user_id = 1;

		$this->set('categories', $this->categories);
		$articles = $this->Articles->find('all')->limit(8)->order(["Articles.`created`" => 'desc']);
		$this->set(compact('spottedCrises', 'verifiedCrises', 'articles',
		'home_type', 'newCrisis'));
	}
}

?>
