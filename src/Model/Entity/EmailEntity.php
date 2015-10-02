<?php
namespace CakeEmailSender\Model\Entity;

use Cake\ORM\Entity;
use Cake\Network\Email\Email;

/**
 * Email Entity.
 */
class EmailEntity extends Entity
{

    protected $_accessible = [
        'email_to' => true,
        'cc' => true,
        'bcc' => true,
        'subject' => true,
        'serial' => true,
        'sent' => true,
        'sent_at' => true,
        'email_format'=>true
    ];
    
}
