<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Steps Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $JobsOrders
 * @property |\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $Substeps
 *
 * @method \App\Model\Entity\Step get($primaryKey, $options = [])
 * @method \App\Model\Entity\Step newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Step[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Step|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Step patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Step[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Step findOrCreate($search, callable $callback = null, $options = [])
 */
class StepsTable extends Table
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

        $this->setTable('steps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('JobsOrders', [
            'foreignKey' => 'list_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Substeps', [
            'foreignKey' => 'step_id'
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
        $rules->add($rules->existsIn(['list_id'], 'JobsOrders'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
