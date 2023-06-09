<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubSteps Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Steps
 *
 * @method \App\Model\Entity\SubStep get($primaryKey, $options = [])
 * @method \App\Model\Entity\SubStep newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SubStep[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SubStep|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SubStep patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SubStep[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SubStep findOrCreate($search, callable $callback = null, $options = [])
 */
class SubStepsTable extends Table
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

        $this->setTable('substeps');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Steps', [
            'foreignKey' => 'step_id',
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
        $rules->add($rules->existsIn(['step_id'], 'Steps'));

        return $rules;
    }
}
