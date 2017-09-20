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

}
