<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AddressState Model
 *
 * @method \App\Model\Entity\AddressState newEmptyEntity()
 * @method \App\Model\Entity\AddressState newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AddressState[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AddressState get($primaryKey, $options = [])
 * @method \App\Model\Entity\AddressState findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AddressState patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AddressState[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AddressState|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AddressState saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AddressState[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddressState[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddressState[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AddressState[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AddressStateTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('address_state');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('delivery_fee')
            ->requirePresence('delivery_fee', 'create')
            ->notEmptyString('delivery_fee');

        return $validator;
    }
}
