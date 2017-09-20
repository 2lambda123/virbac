<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StandarsLists Model
 *
 * @method \App\Model\Entity\StandarsList get($primaryKey, $options = [])
 * @method \App\Model\Entity\StandarsList newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StandarsList[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StandarsList|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StandarsList patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StandarsList[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StandarsList findOrCreate($search, callable $callback = null, $options = [])
 */
class StandarsListsTable extends Table
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

        $this->setTable('standars_lists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

}
