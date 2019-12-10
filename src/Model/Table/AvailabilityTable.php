<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Availability Model
 *
 * @property \App\Model\Table\ElementsTable&\Cake\ORM\Association\BelongsToMany $Elements
 *
 * @method \App\Model\Entity\Availability get($primaryKey, $options = [])
 * @method \App\Model\Entity\Availability newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Availability[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Availability|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Availability saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Availability patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Availability[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Availability findOrCreate($search, callable $callback = null, $options = [])
 */
class AvailabilityTable extends Table
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

        $this->setTable('availability');
        $this->setDisplayField('id_availability');
        $this->setPrimaryKey('id_availability');

        $this->belongsToMany('Elements', [
            'foreignKey' => 'availability_id',
            'targetForeignKey' => 'element_id',
            'joinTable' => 'elements_availability'
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
            ->integer('id_availability')
            ->allowEmptyString('id_availability', null, 'create');

        $validator
            ->scalar('name_availability')
            ->maxLength('name_availability', 100)
            ->requirePresence('name_availability', 'create')
            ->notEmptyString('name_availability');

        return $validator;
    }
}
