<?php
App::uses('Controller', 'Controller');


class AppController extends Controller {
	public $helpers		= array("Form","Html","Session");
	public $components	= array("Session","Cookie","Email","RequestHandler","Auth" => array(
			'loginAction' => array(
						'controller' => 'users',
						'action' => 'login'
					),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'User',
					'fields' => array(
						'username' => 'email',
						'password' => 'password'
					)
				)
			),		
			//'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
		));

/* Public variable used for email functionality */
	public $mailBody	= '';
	public $from		= '';
	public $subject		= '';
/*
 * @function name	: beforefilter
 * @purpose			: used to check if user is logged in
 * @created by		: mahavir singh
 * @created on		: 15 june 2016
*/
	function beforefilter(){
		if ($this->Cookie->read('Auth.User') && !$this->Session->read("Auth.User.id")) {
				$this->redirect("/users/login");
			}
	}

/*
 * @function name	: getMaildata
 * @purpose			: getting email data for various purposes
 * @arguments		: Following are the arguments to be passed:
	 * template_for		: template_for of email templates from email_templates table
 * @created by		: Mahavir singh
 * @created on		: 14 june 2016
 * @description		: function will assign value to global variables like mailbody,from, subject which will be used while sending email
*/
	public function getMaildata($template_for = null){
		$this->loadModel('EmailTemplate');
		$mail_data = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.template_for' => $template_for)));
		if(!empty($mail_data)){
			$this->mailBody = $mail_data['EmailTemplate']['mail_body'];
			$this->from = $mail_data['EmailTemplate']['mail_from'];
			$this->subject = $mail_data['EmailTemplate']['mail_subject'];
		}
	}
//End getMaildata

/*
 * @function name	: sendMail
 * @purpose			: sending email for various actions
 * @arguments		: Following are the arguments to be passed:
	 * to			: contain email address from which email is sending 
 * @return			: true if email sending successfull else return false.
 * @created by		: Mahavir singh
 * @created on		: 14 june 2016
 * @description		: NA
*/
	public function sendMail($to = null) {
		$fromname = 'Shipthestuff';
		App::uses('CakeEmail', 'Network/Email');
      	$email = new CakeEmail();
      	$email->emailFormat('both');
      	$email->from(array($this->from => $fromname));
      	$email->sender($this->from);
      	$email->to($to);
      	$email->subject($this->subject);

      	if ($email->send($this->mailBody)) {
			return true;
		}
		return false;
	}
//End sendMail

/*
 * @function name	: getFormateUserData
 * @purpose			: getting user data like auth components 
 * @arguments		: Following are the arguments to be passed:
 * @created by		: Mahavir singh
 * @created on		: 14 june 2016
*/
	public function getFormateUserData($userData = null){
		$newData['User'] = $userData['User'];
		$newData['User']['UserDetail'] = $userData['UserDetail'];
		$this->Session->write('Auth', $newData);
	}
//End getFormateUserData

}


