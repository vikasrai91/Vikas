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
						'username' => 'username',
						//'username' => 'email',
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
		
		// if ($this->Cookie->read('Auth.User') && !$this->Session->read("Auth.User.id")) {
		// 		$this->redirect("/users/login");
		// 	}
	}

/*
 * @function name	: get_mail_template
 * @purpose			: getting email data for various purposes
 * @arguments		: Following are the arguments to be passed:
	 * template_for		: template_for of email templates from email_templates table
 * @created by		: Mahavir singh
 * @created on		: 14 june 2016
 * @description		: function will assign value to global variables like mailbody,from, subject which will be used while sending email
*/
	public function get_mail_template($template_for = null){
		$this->loadModel('EmailTemplate');
		$mail_data = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.template_for' => $template_for)));
		if(!empty($mail_data)){
			$this->mailBody = $mail_data['EmailTemplate']['mail_body'];
			$this->from = $mail_data['EmailTemplate']['mail_from'];
			$this->subject = $mail_data['EmailTemplate']['mail_subject'];
		}
	}
//End get_mail_template

/*
 * @function name	: sendmail
 * @purpose			: sending email for various actions
 * @arguments		: Following are the arguments to be passed:
	 * to			: contain email address from which email is sending 
 * @return			: true if email sending successfull else return false.
 * @created by		: Mahavir singh
 * @created on		: 14 june 2016
 * @description		: NA
*/
	public function sendmail($to = null) {
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
//End sendmail

}


