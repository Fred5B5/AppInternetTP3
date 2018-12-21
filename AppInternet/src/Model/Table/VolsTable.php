<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vols Model
 *
 * @property \App\Model\Table\EmplacementsTable|\Cake\ORM\Association\BelongsTo $Emplacements
 * @property \App\Model\Table\EmplacementsTable|\Cake\ORM\Association\BelongsTo $Emplacements
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Vol get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vol newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vol[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vol|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vol|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vol[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vol findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VolsTable extends Table
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

        $this->setTable('vols');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Emplacements', [
            'foreignKey' => 'emplacementdepart_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Emplacements', [
            'foreignKey' => 'emplacementfin_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'vol_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('heuredepart')
            ->requirePresence('heuredepart', 'create')
            ->notEmpty('heuredepart');

        $validator
            ->scalar('heurearriver')
            ->requirePresence('heurearriver', 'create')
            ->notEmpty('heurearriver');

        $validator
            ->integer('prixeconomique')
            ->allowEmpty('prixeconomique');

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
        $rules->add($rules->existsIn(['emplacementdepart_id'], 'Emplacements'));
        $rules->add($rules->existsIn(['emplacementfin_id'], 'Emplacements'));

        return $rules;
    }
}
