<?php
namespace CakeEmailSender\Shell;

use Cake\Console\Shell;
use Cake\Network\Email\Email;

/**
 * EmailSender shell command.
 */
class EmailSenderShell extends Shell
{

	public function initialize(){
		parent::initialize();
		$this->loadModel('CakeEmailSender.Emails');
	}
	
	
    public function main() {
    	$emails_to_send = $this->Emails->find('all')->where(['sent'=>false]);
    	foreach($emails_to_send as $item){
    		$email = new Email($item->profile);
    		$email->subject($item->subject);
    		$email->to(unserialize($item->email_to));
    		$email->cc(unserialize($item->cc));
    		$email->bcc(unserialize($item->bcc));
    		$email->send("");
    		unset($email);
    		$this->Emails->markAsSent($item);
    	}
    }
}