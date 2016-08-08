<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $uses = array();
	public $layout = "frontend";


public function beforefilter() {
	parent::beforefilter();
		if ($this->params['action'] == 'login') {
			if ($this->Cookie->read('Auth.User') && !$this->Session->read("Auth.User.id")) {
				//$this->login();
			}
		}
		$this->Auth->allow("login", "logout", "signup","carrierRegistration", "uniqueMail", "verifyMail", "forgetPassword", "facebookLogin","editMyAccount");
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

				echo 'test';
				exit;
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
 
  
				if($this->Auth->user('status')){
					$loginedUserInfo = $this->Auth->user();		
					$this->Session->setFlash('Logged in successfully.',
										'default', array('class' => 'success')
											);	
				}else{
					$this->Session->setFlash('Your email is not verified yet.',
										'default', array('class' => 'danger')
											);
				$this->Auth->logout();
				$this->redirect(array("action" => "/login"));
				}
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
			$cookie['remeber_token'] = md5($this->request->data['User']['email']) . "^" . base64_encode($this->request->data['User']['password']);
			$data['User']['remeber_token'] = md5($this->request->data['User']['email']);
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
				$user = $this->User->find("first", array("conditions" => array("User.remeber_token" => $cookie[0]), "fields" => array("User.email", "User.password")));
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
		$this->redirectUser();
	}

	/* end of function */
/*
 * @function name	: redirectUser
 * @purpose			: for handle the redirection for user
 * @return			: none
 * @created by		: mahavir singh
 * @created on		: 13 june 2016
 */
	public function redirectUser() {
		if($this->Session->read('Auth.User.user_type') == 1 && $this->Session->read('Shipform.f1') != '' && $this->Session->read('Shipform.f2') != ''){
			$this->redirect('/ships/listingRequest');
		}
		elseif($this->Session->read('Auth.User.user_type') == 1){

			$this->redirect('/users/dashboard');
			
		} elseif($this->Session->read('Auth.User.user_type') == 2){

			$this->redirect('/');
			
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
		if($this->Session->read('Auth.User.id') != ''){
			$this->redirect('/');
		}
		$countries = $this->Country->find('list', array('fields' => array('Country.country_name')));
		$equipments = $this->Equip->find('list', array('fields' => array('Equip.name')));
		$transports = $this->Transport->find('list', array('fields' => array('Transport.name')));
		$this->set(compact(array('countries', 'equipments', 'transports')));

		if ($this->request->is('post') && !empty($this->request->data)){

			if($this->Session->read('Form.f4') != '' && !empty($this->request->data['User']['password'])){

				$passWord = $this->request->data['User']['password'];
				$this->request->data = $this->Session->read('Form.f2');
				$this->request->data['UserDetail']['f_name'] = $this->Session->read('Form.f1.UserDetail.f_name');
				$this->request->data['UserDetail']['l_name'] = $this->Session->read('Form.f1.UserDetail.l_name');
				$this->request->data['User']['email'] = $this->Session->read('Form.f1.User.email');

				$this->request->data['User']['password'] = $passWord;
				$this->request->data['User']['user_type'] = 2;
				$this->request->data['UserDetail']['phone_number'] = $this->Session->read('Form.f1.UserDetail.phone_number');
				$this->request->data['UserDetail']['equip_id'] = serialize($this->Session->read('Form.f3.UserDetail.equip_id'));
				$this->request->data['UserDetail']['transport_id'] = serialize($this->Session->read('Form.f4.UserDetail.transport_id'));
				$this->Session->delete('Form');
			}

			$emailToken = md5($this->request->data['User']['email']);
			$this->request->data['User']['email_verify_token'] = $emailToken;
			
			if($this->User->save($this->request->data)){
					$data = $this->request->data;
					$data['UserDetail']['user_id'] = $this->User->getLastInsertId();
					$this->UserDetail->save($data);
					$link = '<a href="'.SITE_LINK.'users/verifyMail/'.$data['UserDetail']['user_id'].'/'.$emailToken.'">Verify My Email</a>';
					$this->getMaildata(1);
					$this->mailBody = str_replace("{NAME}", $data['UserDetail']['f_name'], $this->mailBody);
					$this->mailBody = str_replace("{VERIFY}", $link, $this->mailBody);
					if($this->sendMail($data['User']['email'])){

					$this->Session->setFlash('Registration done successfully and please check your mail.',
											  'default',
											  array('class' => 'success')
											);
					$this->redirect(array("action" => "/login"));
					
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
 * @function name	: verifyMail
 * @purpose			: for verify mail
 * @arguments		: token
 * @return			: none
	* @created by		: mahavir singh
 * @created on		: 27 june 2016
 * @description		: NA
 */
	function verifyMail($id = null, $token = null) {
		$checkUser = $this->User->findAllById($id);
		if($token == $checkUser[0]['User']['email_verify_token']){
			$this->User->updateAll(array('User.email_verify_token' => 'null', 'User.status' => '1'), array('User.id' => $id));
			$this->Session->setFlash('Your email has verified successfully.',
											  'default',
											  array('class' => 'success')
											);
		}elseif($checkUser[0]['User']['status'] == '1'){
			$this->Session->setFlash('Your email has already verified successfully.',
											  'default',
											  array('class' => 'info')
											);
		}
		else{
			$this->Session->setFlash('Did you really think you are allowed to see that?',
											  'default',
											  array('class' => 'warning')
											);
		}
		$this->redirect("/users/login");
	}

/* end of function */

	/*
	 * @function name	: forgetPassword
	 * @purpose			: to send the mail with password
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: mahavir singh
	 * @created on		: 28 june 2016
	 * @description		: NA
	 */

	function forgetPassword() {
		$this->autoRender = false;
		if ($this->request->is('post') && !empty($this->request->data)){
			$userData = $this->User->findAllByEmail($this->request->data['User']['email']);
			if(!empty($userData)){

				$newPass = rand(100000, 999999);
				$newPassword = AuthComponent::password($newPass);

				$update = $this->User->updateAll(array('User.password' => "'$newPassword'"), array('User.id' => $userData[0]['User']['id']));
				if($update){
					$this->getMaildata(2);
					$this->mailBody = str_replace("{NAME}", '', $this->mailBody);
					$this->mailBody = str_replace("{PASSWORD}", $newPass, $this->mailBody);
					if($this->sendMail($userData[0]['User']['email'])){
					$this->Session->setFlash('Your new password has been send to your mail.',
											  'default',
											  array('class' => 'success')
											);
					$this->redirect("/users/login");
					}
				}
			}	else{
				$this->Session->setFlash('Your email is not register.',
											  'default',
											  array('class' => 'warning')
											);
					$this->redirect("/users/login");
			}
		}
	}

	/* end of function */
	/*
	 * @function name	: facebookLogin
	 * @purpose			: for handle related to facebook login
	 * @return			: 1 => new user, 2 => already exist and order => 3 for shipping form
	 * @created by		: mahavir singh
	 * @created on		: 05 july 2016
	 */
	function facebookLogin($userType = null) {
		$this->loadModel('UserDetail');
		$this->autoRender = false;
		$existUser = array();
		if ($this->request->is('post') && !empty($this->request->data)){
			if(isset($this->request->data['id'])){
				$facebookId = $this->request->data['id'];
				$existUser = $this->User->find('first', array('conditions' => array('User.facebook_id' => $this->request->data['id'])));
			}
		if($existUser){
			$this->getFormateUserData($existUser);
			if($this->Session->read('Auth.User.user_type') == 1 && $this->Session->read('Shipform.f1') != '' && $this->Session->read('Shipform.f2') != ''){
				$return_data['order'] = 1;
			}
			$return_data['already'] = 1;
			$return_data['user_type'] = $existUser['User']['user_type'];
			return json_encode($return_data);
		}else{
			if($userType == 1){
				$autoPassword = rand(100000, 999999);
				$createpassword = AuthComponent::password($autoPassword);
				$this->request->data['User']['user_type'] = $userType;
				$this->request->data['User']['email'] = $this->request->data['email'];
				$this->request->data['User']['facebook_id'] = $this->request->data['id'];
				$this->request->data['User']['status'] = 1;
				$this->request->data['User']['account_type'] = 1;
				$this->request->data['User']['password'] = $createpassword;
				$this->request->data['UserDetail']['f_name'] = $this->request->data['first_name'];
				$this->request->data['UserDetail']['l_name'] = $this->request->data['last_name'];
				$this->request->data['UserDetail']['profile_picture'] = $this->request->data['picture']['data']['url'];
			$return_data['already'] = 0;
			

			}elseif($userType == 2){
				$passWord = $this->request->data['User']['password'];
				$this->request->data = $this->Session->read('Form.f2');
				$this->request->data['UserDetail']['f_name'] = $this->Session->read('Form.f1.UserDetail.f_name');
				$this->request->data['UserDetail']['l_name'] = $this->Session->read('Form.f1.UserDetail.l_name');
				$this->request->data['User']['email'] = $this->Session->read('Form.f1.User.email');
				$this->request->data['User']['status'] = 1;
				$this->request->data['User']['password'] = $passWord;
				$this->request->data['User']['user_type'] = 2;
				$this->request->data['UserDetail']['phone_number'] = $this->Session->read('Form.f1.UserDetail.phone_number');
				$this->request->data['UserDetail']['equip_id'] = serialize($this->Session->read('Form.f3.UserDetail.equip_id'));
				$this->request->data['UserDetail']['transport_id'] = serialize($this->Session->read('Form.f4.UserDetail.transport_id'));
				$facebookId = $this->Session->read('Form.f1.User.facebook_id');
				$this->request->data['User']['facebook_id'] = $facebookId;
				$this->request->data['UserDetail']['profile_picture'] = $this->Session->read('Form.f1.UserDetail.profile_picture');
				$this->Session->delete('Form');
			}
			if($userType == 1 || $userType == 2){
			$this->User->save($this->request->data);
			$userDetail = $this->request->data;
			$userDetail['UserDetail']['user_id'] = $this->User->getLastInsertId();
			$this->UserDetail->save($userDetail);
			$existUser = $this->User->find('first', array('conditions' => array('User.facebook_id' => $facebookId)));
			$this->getFormateUserData($existUser);
			if($userType == 1){ return json_encode($return_data); }
			else{	$this->redirectUser(); }

		}
		}
	  }
	}

/*
 * @function name	: settings
 * @purpose			: To handle setting request
 * @created by		: mahavir singh
 * @created on		: 06 july 2016
 * @description		: NA
*/
	public function settings($settingType = null){
		$this->loadModel('UserDetail');
		$this->loadModel('Country');
		$this->loadModel('Currency');
		$this->loadModel('Timezone');
		$this->loadModel('User');

		$countries = $this->Country->find('list', array('fields' => array('Country.country_name')));
		
		$this->set('countries', $countries);
		$userdetailData = $this->UserDetail->find('first' ,array('conditions' => array('UserDetail.id' => $this->Session->read('Auth.User.UserDetail.id'))));
		$this->set('userdetailData',$userdetailData);
		if($settingType == 1){

			if($this->request->is('post') && !empty($this->request->data)){
			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');if($this->UserDetail->save($this->request->data)){
			  	$this->redirect('/users/settings');
			  }		
			}
		$this->render('update_email');
		}
		elseif($settingType == 2){

			if($this->request->is('post') && !empty($this->request->data)){
			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');if($this->UserDetail->save($this->request->data)){
			  	$this->redirect('/users/settings');
			  }				
			}

			$this->render('update_address');
		}
		elseif($settingType == 3){

			if($this->request->is('post') && !empty($this->request->data)){
			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');if($this->UserDetail->save($this->request->data)){
			  	$this->redirect('/users/settings');
			  }				
			}

			$this->render('update_phone');
		}

		elseif($settingType == 4){

			if($this->request->is('post') && !empty($this->request->data)){
			  $this->User->create();
			   $this->User->id = $this->Session->read('Auth.User.UserDetail.user_id');
			  if($this->User->save($this->request->data)){
			  	$this->redirect('/users/settings');
			  }		
			}
			$this->render('change_password');
		}
		elseif($settingType == 5){
			if($this->request->is('post') && !empty($this->request->data)){
			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');
			  if($this->UserDetail->save($this->request->data)){
			  	$this->redirect('/users/settings');
			  }				
			}
		$currency = $this->Currency->find('all');
		$timezone = $this->Timezone->find('list');
		$this->set(compact(array('currency', 'timezone')));
		$this->render('regional_setting');
		}
		elseif($settingType == 6){

			if($this->request->is('post') && !empty($this->request->data)){

			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');
			  if($this->UserDetail->save($this->request->data)){
			  	$this->User->create();
			  	$this->User->id = $this->Session->read('Auth.User.id');
			  	$this->User->save($this->request->data);
			  	$currentUserData = $this->User->find('first' ,array('conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
				$this->Session->write('Auth.User.UserDetail.profile_picture', $currentUserData['UserDetail']['profile_picture']);
				$this->Session->write('Auth.User.account_type', $currentUserData['User']['account_type']);
			  	$this->redirect('/users/settings');
			  }				
			}
		$this->render('edit_profile');
		}
		

	}
/*End settings function */

	/*
	 * @function name	: myAccount
	 * @purpose			: to update user profile 
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: mahavir singh
	 * @created on		: 08 july 2016
	 */

	public function myAccount() {
        $this->loadModel('UserDetail');
		$this->loadModel('User');


        $this->loadModel('User');
		$myacountdetails = $this->User->find('all',array('conditions'=>array('UserDetail.id'=>$this->Session->read('Auth.User.UserDetail.id'))));
		$this->set('user_details',$myacountdetails);

	if($this->request->is('post') && !empty($this->request->data)){

			  $this->UserDetail->create();
			  $this->UserDetail->id = $this->Session->read('Auth.User.UserDetail.id');
			  if($this->UserDetail->save($this->request->data)){
			  	$this->User->create();
			  	$this->User->id = $this->Session->read('Auth.User.id');
			  	$this->User->save($this->request->data);
			  	$currentUserData = $this->User->find('first' ,array('conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
				$this->Session->write('Auth.User.UserDetail.profile_picture', $currentUserData['UserDetail']['profile_picture']);
				$this->Session->write('Auth.User.account_type', $currentUserData['User']['account_type']);
			  	$this->redirect('/users/myAccount');
			  }				
			}
		$this->render('my_account');

	}


	/*End editMyAccount function */

	/*
	 * @function name	: editMyAccount
	 * @purpose			: to update the records 
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 13 july 2016
	 */

 public function editMyAccount() {

           $this->loadModel('UserDetail');

  $user_id = $this->request->data['UserDetail']['user_id'];
  $f_name = $this->request->data['UserDetail']['f_name'];
  $l_name = $this->request->data['UserDetail']['l_name'];
  $phone_number = $this->request->data['UserDetail']['phone_number'];
  /*$profile_picture = $this->request->data['UserDetail']['profile_picture'];*/
   $gender = $this->request->data['UserDetail']['gender'];


  $notification_by_email = $this->request->data['UserDetail']['notification_by_email'];

	if($notification_by_email=='on'){
	  $notification_by_email='1';
	}
  $notification_by_sms = $this->request->data['UserDetail']['notification_by_sms'];
	if($notification_by_sms=='on'){
	  $notification_by_sms='1';
	}
  
    if($this->request->is('post') && !empty($this->request->data)){
 $this->UserDetail->create();
$data = array('UserDetail' => array('f_name' => $f_name, 'l_name' => $l_name, 'phone_number' => $phone_number, 'gender' =>$gender, 'notification_by_email'=>$notification_by_email, 'notification_by_sms' =>$notification_by_sms));

$this->UserDetail->id=$user_id;   
if($this->UserDetail->save($data)){
    $this->Session->setFlash('Your user with id: '.$user_id.' has been updated.');
    $this->redirect('/users/MyAccount');

}
						  
}
		 
}

	/*End inbox function */

	/*
	 * @function name	: myInbox
	 * @purpose			: to receive the message 
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 13 july 2016
	 */

	public function myInbox($id=null) {
      $replyId = base64_decode($id);
      //print_r("hello");
      //print_r($replyId);
    $this->loadModel('Message');

	if($id != 'null'){

		$inbox =  $updateAddress['inbox']['id'] = base64_decode($id);
		$inboxdata = $this->Message->find('all',array('conditions'=>array('Message.shipment_id'=>$inbox)));
		$this->set('inboxdetails',$inboxdata);
		  $this->render('my_inbox');

	}


	}


		/*End compose function */

	/*
	 * @function name	: myCompose
	 * @purpose			: to send in message 
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 13 july 2016
	 */

	public function myCompose($id=null) {

	 $this->loadModel('Shipment');
	 $this->loadModel('User');
    if($id != 'null'){

	$composeid =  $updateAddress['messageid']['id'] = base64_decode($id);
	$compisedata = $this->Shipment->find('all',array('conditions'=>array('Shipment.id'=>$composeid)));
		$this->set('composedetails',$compisedata);
        $this->render('my_compose');
  }
  

	}
   
   
		/*End replyCompose function */

	/*
	 * @function name	: replyCompose
	 * @purpose			: to send in reply message 
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 22 july 2016
	 */

	public function replyCompose($id=null) {

    $this->loadModel('Message');
	
    if($id != 'null'){

	$replyId =  $updateAddress['replyid']['id'] = base64_decode($id);
	$replydata = $this->Message->find('all',array('conditions'=>array('Message.id'=>$replyId)));

		$this->set('replydetails',$replydata);
        $this->render('reply_compose');
  }
  

	}


   /*End addcompose function*/
   /*
   * @function name   : addCompose
   * @purpose         : to send a message
   * @arguments       : NA
   * @created by      : nitish kumar
   * @created on      : 21 july 2016
   */
  // addCompose new user data function  (C)

   public function addCompose(){
    
     $this->loadModel('Message');
   

 	$shipment_id = $this->request->data['message']['shipment_id'];
	$message_to = $this->request->data['message']['message_to'];
	$message_from = $this->request->data['message']['message_from'];
	$subject = $this->request->data['message']['subject'];
	$message = $this->request->data['message']['message'];
	$created_on = $this->request->data['message']['created_on'];

 
 $data1 = array('Message' => array('shipment_id' => $shipment_id, 'message_from' => $message_from, 'message_to' => $message_to, 'message' =>$message, 'subject'=>$subject, 'created_on' =>$created_on));

if($this->Message->save($data1)){
		$this->Session->setFlash('Message Is Successfully Send.',
										'default', array('class' => 'success')
											);
    $this->redirect('/users/myCompose/'.base64_encode($shipment_id));
 

}
 
   }


    /*End addReplyCompose function*/
   /*
   * @function name   : addReplyCompose
   * @purpose         : to send a reply message
   * @arguments       : NA
   * @created by      : nitish kumar
   * @created on      : 22 july 2016
   */
  

   public function addReplyCompose(){
    
     $this->loadModel('Message');

      if (!empty($this->data)) {
      
            if ($this->Message->save($this->data)) {
                $this->Session->setFlash('Your user data has been saved.');
               $this->redirect('/users/replyCompose/'.base64_encode($shipment_id));
            }
        }

 }

	
	/*End deliveries function */

	/*
	 * @function name	: myDeliveries
	 * @purpose			: to deliveries  
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 13 july 2016
	 */

	public function myDeliveries() {

		
	}


	/*End readmail function */

	/*
	 * @function name	: readmail
	 * @purpose			: to user read mail  
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 13 july 2016
	 */

	public function readmail($id=null) {

	 $this->loadModel('Message');
	 $this->loadModel('User');



 $this->Message->create();
$data = array('Message' => array('status' =>'1'));

$this->Message->id=base64_decode($id);   
if($this->Message->save($data)){

	if($id != 'null'){

		$mess_id =  $updateAddress['mess']['id'] = base64_decode($id);
		$messagedata = $this->Message->find('all',array('conditions'=>array('Message.id'=>$mess_id)));
		
	$userId = $messagedata[0]['Message']['message_to'];
	
		$this->set('messagedetails',$messagedata);

      $useremaildetails = $this->User
->find('first',array('conditions'=>array(
           'User.id'=>$userId)));

		$this->set('useremaildetails',$useremaildetails);

		$this->render('readmail');
		//   $this->redirect('/users/readmail/'.base64_encode($mess_id));
 
	 
	}
}
		
	}

	/* end of function */

	 /*
	 * @function name	: dashboard
	 * @purpose			: for user dashboard for all detail
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 15 july 2016
	 */

	public function dashboard() {

		 $this->loadModel('Shipment');
		 $this->loadModel('Message');
          
	$dashboardopenjob = $this->Shipment->find('all',array('conditions'=>array(
           'status'=>'1'),
           'limit'=>5, 
           'order'=>array('Shipment.id ASC')));
		$this->set('userDeshbord',$dashboardopenjob);
	    $msgid=array();
		$msgcount=array();	
	foreach ($dashboardopenjob as $key) {
		 $theshimentid = $key['Shipment']['id'];
		$dashboard_new = $this->Message->find('count', array(
        'conditions' => array('Message.shipment_id' => $theshimentid)
    ));

    array_push($msgid,$theshimentid);
    array_push($msgcount,$dashboard_new);
    
		//$dashboard_new = $this->Messages->find('all',array('conditions'=>array('Messages.shipment_id'=>$theshimentid)));
		/*$i=0;
		while($dashboard_new<=$i){

     $testData = $dashboard_new[$i]['Messages']['shipment_id'];
     $i++;
		}*/
		//$dashboard_new['Messages']['shipment_id'];
		//exit;
		//print_r($dashboard_new);
		}
		//print_r($msgid);
		//print_r($msgcount);
			//exit;
	$this->set('msgid',$msgid);
	$this->set('dashboardMessage',$msgcount);
    $dashboardRunningjob = $this->Shipment->find('all',array('conditions'=>array(
           'status'=>'0'),
           'limit'=>5, 
           'order'=>array('Shipment.id ASC')));

		$this->set('userDeshbordRunningjob',$dashboardRunningjob);
		$this->render('dashboard');

	}

	/* end of function */

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
		//$this->Session->delete("Auth");
		$this->Session->destroy();
		$this->response->disableCache();
		$this->redirect("/");
	}

	/* end of function */


	/*
	 * @function name	: delete
	 * @purpose			: to delete from user account
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 18 july 2016
	 * @description		: NA
	 */
	function deleteAccount()
    {
    	$this->loadModel('UserDetail');
		$this->loadModel('User');
		$this->loadModel('Shipment');

    	 $id = $this->Session->read('Auth.User.id');
    	 if($id!=''){
    	 	$this->User->delete($id);
    	 }
      $user_id = $this->Session->read('Auth.User.UserDetail.id');
       // $user_id = $this->Session->read('Auth.User.Shipment.id');
     if($user_id!=''){
     	$this->UserDetail->delete($user_id);
     	//$this->Shipment->delete($user_id);
     }
         $this->Session->setFlash('The user with id: '.$id.' has been deleted.');
         $this->logout();
         exit;
        $this->redirect(array('action' => 'myAccount'));
    }
}
?>
