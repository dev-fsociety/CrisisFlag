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
	public $categories = [
        'Séisme','Attentat','Braquage','Tsunami','Accidents trains/avions',
        'Épidémie','Inondations','Éruption volcanique','Chute de météorite','Ouragan',
        'Tornade','Tempête de sables dans les pays concernés','Danger chimique','Danger nucléaire',
        'Danger industriel (explosion)','Incendie (majeur)'
    ];

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

		$newCrisis = $this->Crisis->newEntity();
		$newCrisis->state = 'spotted';
		$newCrisis->severity = 1;

		$articles = $this->Articles->find('all')->limit(5)->order('created');

		$this->set("categories", $this->categories);
		$this->set(compact('spottedCrises', 'verifiedCrises', 'articles',
		'home_type', 'newCrisis'));
	}
}

?>
