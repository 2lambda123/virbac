<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobsOrders Model
 *
 * @property \App\Model\Table\StandarsListsTable|\Cake\ORM\Association\BelongsTo $StandarsLists
 *
 * @method \App\Model\Entity\JobsOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobsOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobsOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobsOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobsOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobsOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobsOrder findOrCreate($search, callable $callback = null, $options = [])
 */
class JobsOrdersTable extends Table
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

        $this->setTable('jobs_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('StandarsLists', [
            'foreignKey' => 'standar_list_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['standar_list_id'], 'StandarsLists'));

        return $rules;
    }
}
