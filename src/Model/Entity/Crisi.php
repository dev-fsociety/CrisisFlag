<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crisi Entity.
 *
 * @property int $id
 * @property string $abstract
 * @property int $severity
 * @property float $longitude
 * @property float $latitude
 * @property string $state
 * @property string $address
 * @property string $type
 * @property string $hashtags
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class Crisi extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /*protected function _setHashtags($hastags)
    {
    }*/
}
