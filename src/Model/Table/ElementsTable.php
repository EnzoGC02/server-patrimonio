<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Elements Model
 *
 * @property \App\Model\Table\CategorysOfElementTable&\Cake\ORM\Association\BelongsTo $CategorysOfElement
 *
 * @method \App\Model\Entity\Element get($primaryKey, $options = [])
 * @method \App\Model\Entity\Element newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Element[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Element|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Element saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Element patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Element[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Element findOrCreate($search, callable $callback = null, $options = [])
 */
class ElementsTable extends Table
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

        $this->setTable('elements');
        $this->setDisplayField('id_element');
        $this->setPrimaryKey('id_element');

        $this->belongsTo('CategorysOfElement',[
            'foreignKey'=>'category_id',
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
            ->integer('id_element')
            ->allowEmptyString('id_element', null, 'create');

        $validator
            ->scalar('name_element')
            ->maxLength('name_element', 100)
            ->requirePresence('name_element', 'create')
            ->notEmptyString('name_element');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['category_id'], 'CategorysOfElement'));

        return $rules;
    }
}
