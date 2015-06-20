<?php
namespace CakeEmailSender\Controller;

use CakeEmailSender\Controller\AppController;
use Cake\ORM\TableRegistry;
use CakeEmailSender\Model\Entity\EmailEntity;

/**
 * Files Controller
 *
 */
class EmailsController extends AppController{
	
	public function add(){
		$this->autoRender = false;
		$email = new EmailEntity();
		$email->subject = 'E-mail test';
		$email->profile = 'default';
		$email->email_to = (serialize(['example@example.com'=>'John Smith']));
		$email->cc = serialize(['example@example.com'=>'John Smith']);
		$email->bcc =serialize(['example@example.com'=>'John Smith']);
		$this->Emails->save($email);
	}
	
}
