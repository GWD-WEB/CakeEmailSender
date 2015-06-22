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
	
	
    public function main($domain) {
    	$emails_to_send = $this->Emails->find('all')->where(['sent'=>false]);
    	foreach($emails_to_send as $item){
			$email = new Email($item->profile);
			$email->domain($domain);
			$email->subject($item->subject);
			if(!empty($item->template) && !empty($item->layout))
				$email->template($item->template, $item->layout);
			if(!empty($item->view_vars))
				$email->viewVars(unserialize($item->view_vars));
			if(!empty($item->email_to))
				$email->to(unserialize($item->email_to));
			if(!empty($item->cc))
				$email->cc(unserialize($item->cc));
			if(!empty($item->bcc))
				$email->bcc(unserialize($item->bcc));
			$email->send("");
			unset($email);
			$this->Emails->markAsSent($item);
    		
    	}
    }
}

