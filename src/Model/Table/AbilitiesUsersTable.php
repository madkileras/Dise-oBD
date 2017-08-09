<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AbilitiesUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Abilities
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\AbilitiesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\AbilitiesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AbilitiesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AbilitiesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AbilitiesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AbilitiesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AbilitiesUser findOrCreate($search, callable $callback = null)
 */
class AbilitiesUsersTable extends Table
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

        $this->table('abilities_users');
        $this->displayField('user_id');
        $this->primaryKey(['user_id', 'ability_id']);

        $this->belongsTo('Abilities', [
            'foreignKey' => 'ability_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
        $rules->add($rules->existsIn(['ability_id'], 'Abilities'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
