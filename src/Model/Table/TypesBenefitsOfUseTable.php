<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesBenefitsOfUse Model
 *
 * @method \App\Model\Entity\TypesBenefitsOfUse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesBenefitsOfUse findOrCreate($search, callable $callback = null, $options = [])
 */
class TypesBenefitsOfUseTable extends Table
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

        $this->setTable('types_benefits_of_use');
        $this->setDisplayField('id_type_benefit_of_use');
        $this->setPrimaryKey('id_type_benefit_of_use');
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
            ->integer('id_type_benefit_of_use')
            ->allowEmptyString('id_type_benefit_of_use', null, 'create');

        $validator
            ->scalar('name_benefit')
            ->maxLength('name_benefit', 50)
            ->requirePresence('name_benefit', 'create')
            ->notEmptyString('name_benefit');

        return $validator;
    }
}
