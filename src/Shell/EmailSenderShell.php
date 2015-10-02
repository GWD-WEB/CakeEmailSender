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
			if(!empty($item->email_format))
				$email->emailFormat($item->email_format);
			$email->send("");
			unset($email);
			$this->Emails->markAsSent($item);
    		
    	}
    }
    
    public function send($id, $domain) {
    	$email_to_send = $this->Emails->get($id);
    	if($email_to_send->sent){
    		$this->out(__('This E-mail was already sent. Use the future resend function instead'));
    		return;
    	}
    		$email = new Email($email_to_send->profile);
    		$email->domain($domain);
    		$email->subject($email_to_send->subject);
    		if(!empty($email_to_send->template) && !empty($email_to_send->layout))
    			$email->template($email_to_send->template, $email_to_send->layout);
    		if(!empty($email_to_send->view_vars))
    			$email->viewVars(unserialize($email_to_send->view_vars));
    		if(!empty($email_to_send->email_to))
    			$email->to(unserialize($email_to_send->email_to));
    		if(!empty($email_to_send->cc))
    			$email->cc(unserialize($email_to_send->cc));
    		if(!empty($email_to_send->bcc))
    			$email->bcc(unserialize($email_to_send->bcc));
    		if(!empty($item->email_format))
    			$email->emailFormat($item->email_format);
    		$email->send("");
    		unset($email);
    		$this->Emails->markAsSent($email_to_send);
    
    }
}

