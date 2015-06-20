<?php
namespace CakeEmailSender\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use CakeEmailSender\Model\Entity\Email;

/**
 * Emails Model
 *
 */
class EmailsTable extends Table
{

    public function initialize(array $config)
    {
        $this->table('email_sender_emails');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('email_to', 'create')
            ->notEmpty('email_to');
            
        $validator
            ->requirePresence('cc', 'create')
            ->notEmpty('cc');
            
        $validator
            ->requirePresence('bcc', 'create')
            ->notEmpty('bcc');
            
        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');
            
        $validator
            ->requirePresence('serial', 'create')
            ->notEmpty('serial');
            
        $validator
            ->add('sent', 'valid', ['rule' => 'boolean'])
            ->requirePresence('sent', 'create')
            ->notEmpty('sent');
            
        $validator
            ->add('sent_at', 'valid', ['rule' => 'datetime'])
            ->requirePresence('sent_at', 'create')
            ->notEmpty('sent_at');

        return $validator;
    }
    
    public function markAsSent($email){
    	$email->sent = true;
    	$email->sent_at = date('Y-m-d H:i:s');
    	$this->save($email);
    }
}
