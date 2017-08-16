<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StandarsSteps Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $StandarsLists
 *
 * @method \App\Model\Entity\StandarsStep get($primaryKey, $options = [])
 * @method \App\Model\Entity\StandarsStep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StandarsStep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StandarsStep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StandarsStep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StandarsStep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StandarsStep findOrCreate($search, callable $callback = null, $options = [])
 */
class StandarsStepsTable extends Table
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

        $this->setTable('standars_steps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        /*
        $this->belongsTo('StandarsLists', [
            'foreignKey' => 'standar_list_id',
            'joinType' => 'INNER'
        ]);
        */
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('standar_list_id', 'create')
            ->notEmpty('standar_list_id');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['standar_list_id'], 'StandarsLists'));

        return $rules;
    }*/
}
