<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Qoute Model
 *
 * @property \App\Model\Table\ProductTable&\Cake\ORM\Association\BelongsTo $Product
 * @property \App\Model\Table\AddressStateTable&\Cake\ORM\Association\BelongsTo $AddressState
 * @property \App\Model\Table\DeliveryTable&\Cake\ORM\Association\BelongsTo $Delivery
 *
 * @method \App\Model\Entity\Qoute newEmptyEntity()
 * @method \App\Model\Entity\Qoute newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Qoute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Qoute get($primaryKey, $options = [])
 * @method \App\Model\Entity\Qoute findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Qoute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Qoute[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Qoute|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qoute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Qoute[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qoute[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qoute[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Qoute[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QouteTable extends Table
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

        $this->setTable('qoute');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Product', [
            'foreignKey' => 'prod_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AddressState', [
            'foreignKey' => 'area_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Delivery', [
            'foreignKey' => 'delivery_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'qoute_id',
        ]);
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
            ->integer('prod_id')
            ->requirePresence('prod_id', 'create')
            ->notEmptyString('prod_id');

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        $validator
            ->integer('height')
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->integer('width')
            ->requirePresence('width', 'create')
            ->notEmptyString('width');

        $validator
            ->integer('length')
            ->requirePresence('length', 'create')
            ->notEmptyString('length');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->integer('area_id')
            ->requirePresence('area_id', 'create')
            ->notEmptyString('area_id');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->integer('delivery_id')
            ->requirePresence('delivery_id', 'create')
            ->notEmptyString('delivery_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('prod_id', 'Product'), ['errorField' => 'prod_id']);
        $rules->add($rules->existsIn('area_id', 'AddressState'), ['errorField' => 'area_id']);
        $rules->add($rules->existsIn('delivery_id', 'Delivery'), ['errorField' => 'delivery_id']);

        return $rules;
    }
}
