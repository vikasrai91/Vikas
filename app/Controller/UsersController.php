<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $uses = array();
	public $layout = "frontend";


public function beforefilter() {
	parent::beforefilter();
		if ($this->params['action'] == 'login') {
			if ($this->Cookie->read('Auth.User') && !$this->Session->read("Auth.User.id")) {
				$this->login();
			}
		}
		$this->Auth->allow("login", "logout", "signup","carrierRegistration", "uniqueUsername", "uniqueMail");
	}

/*
 * @function name	: login
 * @purpose			: to show login page for users
 * @created by		: mahavir singh
 * @created on		: 15 june 2016
 * @description		: NA
 */
	function login() {
		$this->set("title_for_layout", "User Login");
		if ($this->Session->read('Auth.User.id')) {
			$this->response->disableCache();
			$this->redirect("/");
		}
		if ((isset($this->request->data) && !empty($this->request->data))) {
			$this->__Login();
		} elseif ($this->Cookie->read('Auth.User')) {
			$user = $this->Session->read("Auth.User.id");
			if (empty($user)) {
				$this->__Login();
			}
		}
	}
/* end of function */


/*
 * @function name	: __Login
 * @purpose			: to check user authentication
 * @created by		: mahavir singh
 * @created on		: 15 june 2016
 * @description		: it is a private function
 */
	private function __Login() {

		if (isset($this->request->data) && !empty($this->request->data)) {
			if ($this->Auth->login()) {
				$loginedUserInfo = $this->Auth->user();				
			} else {
				$this->Session->setFlash('Invalid Email or Password.',
										'default', array('class' => 'danger')
											);
				$this->Auth->logout();
				$this->redirect(array("action" => "/login"));
			}
		}

		/* code to perform remeber me functinality " remember_login " */
		//condition to check if remember me checkbox is checked or not, if checked a cookie Auth.Member will be written
		if (isset($this->request->data['User']['remember_me']) && !empty($this->request->data['User']['remember_me']) && !empty($loginedUserInfo)) {
			$cookie = array();
			$cookie['remeber_token'] = md5($this->request->data['User']['username']) . "^" . base64_encode($this->request->data['User']['password']);
			$data['User']['remeber_token'] = md5($this->request->data['User']['username']);
			$this->User->create();
			$this->User->id = $loginedUserInfo['id'];
			$this->User->save($data);
			$this->Cookie->write('Auth.User', $cookie, false, '+2 weeks');
		}
		//condition to check if cookie Auth.Member is set or not if set then automatically logged in
		if (empty($this->request->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
				$cookie = explode("^", $cookie['remeber_token']);
				$this->User->recursive = 0;
				$user = $this->User->find("first", array("conditions" => array("User.remeber_token" => $cookie[0]), "fields" => array("User.username", "User.password")));
				$user['User']['password'] = base64_decode($cookie[1]);
				unset($user['User']['id']);
				$this->request->data = $user;

				if ($this->Auth->login()) {
					$loginedUserInfo = $this->Auth->user();
					//  Clear auth message, just in case we use it.
					$this->Session->delete('Message.auth');
				}
				//die("here");
			}
		}
		/* end of code */
		if($this->loginedUserInfo['user_type'] == 1){
			$this->Session->setFlash('You are log in successfully.',
									'default',array('class' => 'success'));
			$this->Auth->logout();
			$this->redirect(array("action" => "/login"));
			
		} elseif($this->loginedUserInfo['user_type'] == 2){
			$this->Session->setFlash('You are log in successfully.',
									'default',array('class' => 'success'));
			$this->Auth->logout();
			$this->redirect(array("action" => "/login"));
			
		}
		
		
	}

	/* end of function */

/*
 * @function name	: signup
 * @purpose			: to register new user account
 * @return			: none
 * @created by		: mahavir singh
 * @created on		: 13 june 2016
 * @description		: This function is responsible to create new user account.
 */
	public function signup() {
		$this->loadModel('UserDetail');
		$this->loadModel('Country');
		$this->loadModel('Equip');
		$this->loadModel('Transport');
		$this->set("title_for_layout", "User Signup");
		$countries = $this->Country->find('list', array('fields' => array('Country.country_name')));
		$equipments = $this->Equip->find('list', array('fields' => array('Equip.name')));
		$transports = $this->Transport->find('list', array('fields' => array('Transport.name')));
		$this->set(compact(array('countries', 'equipments', 'transports')));

		if ($this->request->is('post') && !empty($this->request->data)){

			if($this->Session->read('Form.f4') != '' && !empty($this->request->data['User']['username'])){
				$userName = $this->request->data['User']['username'];
				$passWord = $this->request->data['User']['password'];
				$this->request->data = $this->Session->read('Form.f2');
				$this->request->data['UserDetail']['f_name'] = $this->Session->read('Form.f1.UserDetail.f_name');
				$this->request->data['UserDetail']['l_name'] = $this->Session->read('Form.f1.UserDetail.l_name');
				$this->request->data['User']['email'] = $this->Session->read('Form.f1.User.email');
				$this->request->data['User']['username'] = $userName;
				$this->request->data['User']['password'] = $passWord;
				$this->request->data['User']['user_type'] = 2;
				$this->request->data['UserDetail']['phone_number'] = $this->Session->read('Form.f1.UserDetail.phone_number');
				$this->request->data['UserDetail']['equip_id'] = serialize($this->Session->read('Form.f3.UserDetail.equip_id'));
				$this->request->data['UserDetail']['transport_id'] = serialize($this->Session->read('Form.f4.UserDetail.transport_id'));
				$this->Session->delete('Form');
			}

			$emailToken = md5($this->request->data['User']['email']);
			$this->request->data['User']['email_verify_token'] = $emailToken;
			$link = '<a href="'.BASE_URL.'users/verify_mail/'.$emailToken.'">Verify My Email</a>';
			if($this->User->save($this->request->data)){
					$data = $this->request->data;
					$data['UserDetail']['user_id'] = $this->User->getLastInsertId();
					$this->UserDetail->save($data);
					$this->getMaildata(1);
					$this->mailBody = str_replace("{NAME}", $data['UserDetail']['f_name'], $this->mailBody);
					$this->mailBody = str_replace("{VERIFY}", $link, $this->mailBody);
					if($this->sendMail($data['User']['email'])){
					$this->Session->setFlash('Registration done successfully and please check your mail.',
											  'default',
											  array('class' => 'success')
											);
				}
			}
		}
	}
/*End signup function */

	/*
 * @function name	: uniqueMail
 * @purpose			: to check the unique mail
 * @return			: true/false
 * @using			: ajax
 * @created by		: mahavir singh
 * @created on		: 13 june 2016
 * @description		: This function is responsible for return true and false.
*/
	public function uniqueMail() {
		$this->autoRender = false;
		$userEmail = $this->request->data['User']['email'];
		$userData = $this->User->findAllByEmail($userEmail);
		if(count($userData) >= 1){
			echo 'false';
		}else{
			echo 'true';
		}
	}
/*End uniqueMail function */

	/*
 * @function name	: uniqueUsername
 * @purpose			: to check the unique username
 * @return			: true/false
 * @using			: ajax
 * @created by		: mahavir singh
 * @created on		: 13 june 2016
 * @description		: This function is responsible for return true and false.
*/
	public function uniqueUsername() {
		$this->autoRender = false;
		$userName = $this->request->data['User']['username'];
		$userData = $this->User->findAllByUsername($userName);
		if(count($userData) >= 1){
			echo 'false';
		}else{
			echo 'true';
		}
	}
/*End uniqueUsername function */

	/*
 * @function name	: carrierRegistration
 * @purpose			: to store the form value in session 
 * @return			: true/false
 * @using			: ajax
 * @created by		: mahavir singh
 * @created on		: 13 june 2016
 * @description		: This function is responsible for store all form data of carrier in session.
*/
	public function carrierRegistration() {
		$this->autoRender = false;
		if($this->request->data['form'] == 1){
			if($this->Session->read('Form.f1') != '')
				{ $this->Session->delete('Form.f1'); }

			$this->Session->write('Form.f1', $this->request->data);
		}elseif($this->request->data['form'] == 2){
			if($this->Session->read('Form.f2') != '')
				{ $this->Session->delete('Form.f2'); }
			
			$this->Session->write('Form.f2', $this->request->data);
		}elseif($this->request->data['form'] == 3){
			if($this->Session->read('Form.f3') != '')
				{ $this->Session->delete('Form.f3'); }

			$this->Session->write('Form.f3', $this->request->data);
		}elseif($this->request->data['form'] == 4){
			if($this->Session->read('Form.f4') != '')
				{ $this->Session->delete('Form.f4'); }
			
			$this->Session->write('Form.f4', $this->request->data);
		}

	}
/*End carrierRegistration function */

	/*
	 * @function name	: logout
	 * @purpose			: to logout from user panel
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: mahavir singh
	 * @created on		: 23 june 2016
	 * @description		: NA
	 */

	function logout() {
		$this->Auth->logout();
		if ( $this->Cookie->read("Auth.User") ) {
			$this->Cookie->destroy();
		}
		$this->Session->delete("Auth");
		$this->response->disableCache();
		$this->redirect("/");
	}

	/* end of function */
}