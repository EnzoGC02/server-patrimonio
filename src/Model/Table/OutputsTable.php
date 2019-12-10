<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Outputs Model
 *
 * @property \App\Model\Table\AvailabilitiesTable&\Cake\ORM\Association\BelongsTo $Availabilities
 *
 * @method \App\Model\Entity\Output get($primaryKey, $options = [])
 * @method \App\Model\Entity\Output newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Output[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Output|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Output saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Output patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Output[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Output findOrCreate($search, callable $callback = null, $options = [])
 */
class OutputsTable extends Table
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

        $this->setTable('outputs');
        $this->setDisplayField('id_output');
        $this->setPrimaryKey('id_output');

        $this->belongsTo('Elements')->setForeignKey('element_id');
        $this->belongsTo('Offices')->setForeignKey('office_id');
        $this->belongsTo('Availability')->setForeignKey('availability_id'); 
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
            ->integer('id_output')
            ->allowEmptyString('id_output', null, 'create');

        $validator
            ->dateTime('date_output')
            ->notEmptyDateTime('date_output');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
