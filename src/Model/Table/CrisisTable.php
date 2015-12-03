<?php
namespace App\Model\Table;

use App\Model\Entity\Crisi;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Crisis Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class CrisisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('crisis');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Infos', [
            'foreignKey' => 'crisis_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('abstract', 'create')
            ->notEmpty('abstract');

        $validator
            ->add('severity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('severity', 'create')
            ->notEmpty('severity');

        $validator
            ->add('longitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('longitude', 'create')
            ->notEmpty('longitude');

        $validator
            ->add('latitude', 'valid', ['rule' => 'numeric'])
            ->requirePresence('latitude', 'create')
            ->notEmpty('latitude');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->requirePresence('hashtags', 'create')
            ->notEmpty('hashtags');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
