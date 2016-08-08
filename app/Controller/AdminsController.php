<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 */
class AdminsController extends AppController {

	public $components	= array("Session","Cookie","Email","RequestHandler");
	var $helpers		= array("Js");
	public $value		= array();
	public $mailBody	= '';
	public $template	= '';
	public $content		= '';
	public $conditions	= array();
	public $delarr		= array();
	public $updatearr	= array();
	
	function beforefilter() {
		parent::beforefilter();
		$this->Auth->allow();
		$allowed = array("login","logout","forgotpassword","confirmation","getcountrystatecity","userData");
		$this->checklogin($allowed);
		//$this->adminbreadcrumb();
	}
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function login() {
		$this->set('title_for_layout',"Admin Login");
		if($this->Session->read('admin')) {
			$this->response->disableCache();
			$this->redirect("/admin/dashboard");
		}
		if (isset($this->data) && !empty($this->data)) {
			$admin = $this->__login($this->data['Admin']);
			if (!empty($admin)){
				$this->Session->write('admin',$admin);
				if(isset($this->data['Admin']['remember_me']) && $this->data['Admin']['remember_me'] == 1) {
					$cookie = array();
					$cookie['remembertoken']	= $this->encryptpass($this->data['Admin']['username']);
					$this->Cookie->write('Admin', $cookie,false, '+2 weeks');
					$this->Admin->create();
					$this->Admin->id	= $admin['Admin']['id'];
					$admin['Admin']['remembertoken'] = $this->encryptpass($this->data['Admin']['username']);
					$this->Admin->save($admin);
				}
				$this->response->disableCache();
				$this->redirect("/admin/dashboard");
			} else {
				$this->Session->setFlash('Invalid email or password. Please try again', 'default', array("class"=>"success_message"));
			}
		} elseif($this->Cookie->read('Admin')) {
			$cookie	= $this->Cookie->read('Admin');
			if (!empty($cookie)) {
				$admin	= $this->__login($cookie,true);
				if(!empty($admin)){
					$this->Session->write('admin',$admin);
					$this->response->disableCache();
					$this->redirect("/admin/dashboard");
				} else {
					$this->Session->setFlash('Invalid email or password. Please try again', 'default', array("class"=>"success_message"));
				}
			}
		}
		
	}


/*
 * @function name	: login
 * @purpose			: validate an autheticate user
 * @arguments		: none
 * @return			: logged in user details
 * @created by		: shivam sharma
 * @created on		: 26Apr 2013
 * @description		: it is a private function 
*/
	function __login($data,$rememberme = false){
		$this->Admin->recursive	=	0;
		//print_r($data);die;
		if($rememberme){
			$admin = $this->Admin->find("first",array("conditions"=>array("remembertoken"=>$data['remembertoken'],"status"=>1)));
		}else{
			//echo ($this->encryptpass($data['password']));
			$admin = $this->Admin->find("first",array("conditions"=>array("username"=>$data['username'],"password"=>base64_encode($data['password']),"status"=>1)));
		}
		if($admin['Admin']['passwordstatus'] == 1){
			$admin['Admin']['passwordstatus'] = 0;
			$this->Admin->create();
			$this->Admin->id = $admin['Admin']['id'];
			$this->Admin->save($admin);
		}
		if(!empty($admin)){
			
			$date = date('F j, Y');
			$admin['Admin']['lastlogin'] = $date;
		}
		return $admin;
	}
/* end of function */


/*
 * @function name	: logout
 * @purpose			: logout of admin
 * @arguments		: none
 * @return			: none
 * @created by		: shivam sharma
 * @created on		: 26Apr 2013
 * @description		: NA
*/
	function logout() {
		$this->layout = false;
		$this->Session->destroy('admin');
		$this->Session->delete('admin');
		$this->Cookie->destroy();
		$this->response->disableCache();
		$this->redirect("/admin");
	}
/* end of function 	*/
	

/*
 * @function name	: forgotpassword
 * @purpose			: display form of forgot password and also performs password change functionlity
 * @arguments		: none
 * @return			: none
 * @created by		: shivam sharma
 * @created on		: 3rd Jan 2013
 * @description		: this function is to generate a new password and send to admin email
*/
	function forgotpassword(){
		$this->set("title_for_layout","Forgot Password");
		if($this->Session->read('admin')) {
			$this->response->disableCache();
			$this->redirect("/admin/dashboard");
		}
		if(isset($this->data) && !empty($this->data)){
			$arr = $this->Admin->find("first",array("conditions"=>array("username"=>$this->data['Admin']['email'])));
			if(empty($arr)){
				$this->Session->setFlash(INVALID_EMAIL_FORGOT_PASSWORD);
			} else {
				$arr['Admin']['passwordstatus'] = 1;
				$new_password = rand(100000, 999999);
				$arr['Admin']['password'] = $this->base64_encode($new_password);
				/* code to send email confirmation for signup */
				$user	= "Administrator";
				$this->getmaildata(2);
				$this->mailBody = str_replace("{USER}",$user,$this->mailBody);
				$this->mailBody = str_replace("{PASSWORD}",$new_password,$this->mailBody);
				$flag = $this->sendmail($arr['Admin']['username']);
				/* code to send email confirmation for signup */
				if ($flag) {
					$this->Session->setFlash(NEW_SENT_FORGOT_PASSWORD, 'default', array("class"=>"success_message"));
					$this->Admin->save($arr);
				}
				else {
					$this->Session->setFlash(FAIL_SENT_FORGOT_PASSWORD);
				}
				
			}
			$this->redirect("/admins/forgotpassword");
		}
	}
/* end of function 	*/


/*
 * @function name	: dashboard
 * @purpose			: display dashboard of admin
 * @arguments		: none
 * @return			: none
 * @created by		: shivam sharma
 * @created on		: 5th oct 2012
 * @description		: NA
*/
	function dashboard(){
		$this->set("title_for_layout","Admin Dashboard");
	}
/* end of function 	*/


/*
 * @function name	: changepassword
 * @purpose			: display form of change password and also performs password change functionlity
 * @arguments		: none
 * @return			: none
 * @created by		: shivam sharma
 * @created on		: 3rd Jan 2012
 * @description		: NA
*/
	function changepassword() {
		$admin = $this->Session->read("admin");
		$this->set("title_for_layout","Change Password");
		$this->Admin->recursive = 0;
		if (isset($this->data) && !empty($this->data)) {
			$password = base64_encode($this->data['Admin']['currentpassword']);			
			$user = $this->Admin->find("first",array("conditions"=>array("id"=>$this->data['Admin']['id'],"password"=>$password)));
			$new_pass = base64_encode($this->data['Admin']['newpassword']);			
			if (empty($user)) {
				$this->Session->setFlash('Current password is not correct');
			} elseif(empty($this->data['Admin']['newpassword']) || empty($this->data['Admin']['confirmpassword'])) {
				$this->Session->setFlash('New and confirm password do not match');
			} elseif($password == $new_pass){
			  	$this->Session->setFlash('New password can not be same as current password.');
			} elseif($this->data['Admin']['newpassword'] != $this->data['Admin']['confirmpassword']) {
				$this->Session->setFlash('CONFIRM_PASSWORD_ERROR');
			} else {
				$this->Admin->create();
				$this->Admin->id = $user['Admin']['id'];
				$data['Admin']['password'] = base64_encode($this->data['Admin']['newpassword']);
				$this->Admin->save($data);
				$this->Session->setFlash('Password has been updated successfully', 'default', array("class"=>"success_message"));
			}
				$this->redirect("/admin/changepassword");
		}
	}
/* end of function 	*/

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Admin->recursive = 0;
		$this->conditions	= array(array("Admin.account_id"=>$this->Session->read("admin.Admin.account_id")));
		//$this->bulkactions();
	/* code to perform search functionality 
		if(isset($this->data) && !empty($this->data['Admin']['searchval'])){
			$this->Session->write('searchval',$this->data['Admin']['searchval']);
			$this->conditions	= array("OR"=>array("username like"=>"%".$this->data['Admin']['searchval']."%","domain like"=>"%".$this->data['Admin']['searchval']."%","date(created)"=>$this->data['Admin']['searchval']));
		}
		
		if(isset($this->params['named']['page'])){
			
			if($this->Session->read('searchval')){
				$this->conditions	= array("OR"=>array("username like"=>"%".$this->Session->read('searchval')."%","domain like"=>"%".$this->Session->read('searchval')."%"));
				$this->data['Admin']['searchval'] = $this->Session->read('searchval');
			}
		}elseif(empty($this->conditions)){
			$this->Session->delete('searchval');
		}
	/* end of code to perform search functionality 
		$this->set('admins', $this->paginate($this->conditions));
	}*/
	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->set('admin', $this->Admin->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			$data = array();
			$data = $this->request->data;
			$data['Admin']['account_id'] = $this->Session->read("admin.Admin.account_id");
			$data['Admin']['password'] = $this->base64_encode($data['Admin']['password']);
			$data['Admin']['remembertoken'] = $this->encryptpass($data['Admin']['username']);
			$data['Admin']['confirm password'] = $this->encryptpass($data['Admin']['confirm password']);
			$data['Admin']['admintype'] = 'Sub';
			
			if ($this->Admin->save($data)) {
				$this->Admindetail->create();
				$detaildata['Admindetail']['admin_id'] = $this->Admin->getLastInsertId();
				$this->Admindetail->save($detaildata);
			/* code to send email */
				$link			= "<a href='http://".$_SERVER['SERVER_NAME']."/checkrope/admin/confirmation/".$this->encryptpass($data['Admin']['username'])."'>Click Here</a>";
				$mail			= $this->Cmsemail->find("first",array("conditions"=>array("mailsubject"=>'Creation of Admin Account')));
				$from			= (isset($mail['Cmsemail']['mailfrom']) && !empty($mail['Cmsemail']['mailfrom']))?$mail['Cmsemail']['mailfrom']:FORGFOTEMAILFROM;
				$subject		= (isset($mail['Cmsemail']['mailsubject']) && !empty($mail['Cmsemail']['mailsubject']))?$mail['Cmsemail']['mailsubject']:FORGOTEMAILSUBJECT;
				$this->content	= (isset($mail['Cmsemail']['mailcontent']) && !empty($mail['Cmsemail']['mailcontent']))?$mail['Cmsemail']['mailcontent']:'';
				if (!empty($this->content)) {
					$this->mailBody	=  str_replace('{USER}',$data['Admin']['username'],$this->content);
					$this->mailBody	=  str_replace('{EMAIL}',$data['Admin']['username'],$this->mailBody);
					$this->mailBody	=  str_replace('{LINK}',$link,$this->mailBody);
				} else {
					$this->value["user"]		= $data['Admin']['username'];
					$this->value["link"]		= $link;
					$this->template	= 'confirmadmin';
				}
				$to			=  $data['Admin']['username'];
				$flag		=  false;
				$flag		=  $this->sendmail($from,$subject,$to,$this->mailBody,$this->template,$this->value);
			/* end of code to send email */
				$this->Session->setFlash(__('The admin has been saved.'), 'default', array("class"=>"success_message"));
				$this->redirect(array('controller'=>'admins','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		}
	}

	function confirmation($token = null){
		$this->Admin->recursive = 0;
		$validateAdmin = $this->Admin->find("first",array("conditions"=>array("remembertoken"=>$token,"activationtoken"=>'')));
		if (!empty($validateAdmin)) {
			$this->Admin->create();
			$this->Admin->id = $validateAdmin['Admin']['id'];
			$admin['Admin']['status'] 			= 1;
			$admin['Admin']['activationtoken']	= $token;
			$this->Admin->save($admin);
			$this->Session->setFlash(__('Your account has been activated.'), 'default', array("class"=>"success_message"));
		} else {
			$this->Session->setFlash(__('You have already activate your account.'));
		}
		$this->redirect("/admin/");
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		//echo "edit";die;
		$this->loadModel("User");
		$this->loadModel("UserDetail");
		$this->loadModel("Country");
		$this->loadModel("Equip");
		$this->loadModel("Transport");
		$this->loadModel("Currency");
		$this->loadModel("Timezone");
		$allCountry= $this->Country->find('all');
		$this->set('allCountry',$allCountry);
		$allEquip= $this->Equip->find('all');
		$this->set('allEquip',$allEquip);
		$allTransport= $this->Transport->find('all');
		$this->set('allTransport',$allTransport);
		$allCurrency= $this->Currency->find('all');
		$this->set('allCurrency',$allCurrency);
		$allTimezone= $this->Timezone->find('all');
		$this->set('allTimezone',$allTimezone);
		//echo "edit";die;
		$this->User->recursive = 0;
	
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		/*else{
			$users = $this->User->find('all',array('conditions'=>array(
           'id'=>$this->User->id)
           ));
			$this->set('user',$users);
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
	     $this->UserDetail->id=$id;
			if ($this->User->save($this->request->data) && $this->UserDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array("class"=>"success_message"));
				$this->redirect(array('action' => 'user'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}
	
	public function editShipment($id = null) {
		//echo "edit";die;
		$this->loadModel("Shipment");
		$this->loadModel("PickupDelivery");
		$this->Shipment->recursive = 0;	
		$this->Shipment->id = $id;
		if (!$this->Shipment->exists()) {
			throw new NotFoundException(__('Invalid Shipment'));
		}
		/*else{
			$users = $this->User->find('all',array('conditions'=>array(
           'id'=>$this->User->id)
           ));
			$this->set('user',$users);
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
	     $this->UserDetail->id=$id;
			if ($this->User->save($this->request->data) && $this->UserDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'), 'default', array("class"=>"success_message"));
				$this->redirect(array('action' => 'user'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shipment->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->loadModel("User");
		$this->loadModel("UserDetail");
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->UserDetail->id = $id;
		if ($this->User->delete() && $this->UserDetail->delete()) {
			$this->Session->setFlash(__('User deleted.'), 'default', array("class"=>"success_message"));
			$this->redirect(array('action'=>'user'));
		}
		$this->Session->setFlash(__('User was not deleted.'));
		$this->redirect(array('action' => 'user'));
	}
	
	
	public function editprofile($id = null) {
		$admin = $this->Session->read("admin");
		if (isset($this->data) && !empty($this->data)) {
			$data = $this->data;
			if (isset($this->data['Admindetail']['company_logo']['name']) && !empty($this->data['Admindetail']['company_logo']['name'])) {
				$data['Admindetail']['company_logo'] = $this->data['Admindetail']['company_logo']['name'];
				$data['Admindetail']['company_logo'] = ($this->uploadimage($this->data['Admindetail']['company_logo'],$admin['Admin']['id'],NULL,NULL,'admin','logo'))?$this->uploaddir.$this->imagename:'';
			} else {
				unset($data['Admindetail']['company_logo']);
			}
			if(isset($this->data['Admindetail']['image']['name']) && !empty($this->data['Admindetail']['image']['name'])) {
				$data['Admindetail']['image'] = $this->data['Admindetail']['image']['name'];
				$data['Admindetail']['image'] = ($this->uploadimage($this->data['Admindetail']['image'],$admin['Admin']['id'],NULL,NULL,'admin','profilepic'))?$this->uploaddir.$this->imagename:'';
			} else {
				unset($data['Admindetail']['image']);
			}
			$this->uploaddir = $this->imagename = '';
			$this->Admindetail->create();
			if (isset($this->data['Admindetail']['id']) && !empty($this->data['Admindetail']['id'])) {
				$this->Admindetail->id = $this->data['Admindetail']['id'];
			} else {
				$data['Admindetail']['admin_id'] = $admin['Admin']['id'];
			}
			if ($this->Admindetail->save($data)) {
				$_SESSION['admin']['Admindetail'] = $data['Admindetail'];
			}
			$this->Session->setFlash("Profile has been saved successfully.", 'default', array("class"=>"success_message"));
			$this->redirect("/admin/editprofile");
		} else {
			$this->Admin->recursive = 1;
			$admindetail = $this->Admin->Admindetail->find("all",array("conditions"=>array("Admin.id"=>$admin['Admin']['id'])));
			if(isset($admindetail[0]) && !empty($admindetail[0])){
				$this->data = $admindetail[0];
			}
			
		}
		$this->set("addressdata",$this->getcountrystatecity());
	}
	
	public function getcountrystatecity($id = '',$opt='') {
		$result = array();
		if ($this->RequestHandler->isAjax()) {
			if (strtolower($_REQUEST['opt']) == 'country') {
				$result = $this->State->find("list",array("conditions"=>array("State.status"=>1,"State.country_id"=>$_REQUEST['id']),"order"=> "State.name asc"));
			} else {
				$result = $this->City->find("list",array("conditions"=>array("City.status"=>1,"City.state_id"=>$_REQUEST['id']),"order"=> "City.name asc"));
			}
			$this->set("result",$result);
			$this->set("option",(strtolower($_REQUEST['opt']) == 'country'?'Please select state':'Please select city'));
			$this->render("countrystatecity");
		}elseif(empty($id)){
			$result["Countries"]	= $this->Country->find("list",array("conditions"=>array("status"=>1),"order"=> "name asc"));
			$result["States"]		= $this->State->find("list",array("conditions"=>array("status"=>1),"order"=> "State.name asc"));
			$result["Cities"]		= $this->City->find("list",array("conditions"=>array("status"=>1),"order"=> "City.name asc"));
			return $result;
		}
		
		
	}
	
	public function configurations() {
		$this->loadModel("Configuration");
		if (isset($this->data) && !empty($this->data)) {
			foreach ($this->data['Configuration'] as $key=>$val) {
				if(is_array($val) && !empty($val['name'])){
					$val = ($this->uploadimage($val, NULL,NULL,"banners",NULL,NULL,"bannerimage".$key,1600, 268))?($this->uploaddir.$this->imagename):'';
					$config[$key] = array("id"=>$key,"value"=>$val);
				} elseif(is_array($val)){
					unset($config[$key]);
				} else{
					$config[$key] = array("id"=>$key,"value"=>$val);
				}
			}
			$this->Configuration->create();
			if ($this->Configuration->saveAll($config) ){
				$file = WWW_ROOT."custom/config.php";
				if(file_exists($file)) {
					//unlink($file);
				}
				//$this->configurations();
			}
			$this->Session->setFlash("Configuration has been updated.", 'default', array("class"=>"success_message"));
			$this->redirect("/admin/configurations");
		}
		$configuration = $this->Configuration->find("all");
		$this->set("configurations",$configuration);
		$this->render("configuration");
		//die;
	}
	
	function newsletter() {
		$this->loadModel("User");
		if($this->request->is("post")){
			$this->mailBody = !empty($this->request->data['Newsletter']['content'])?$this->request->data['Newsletter']['content']:'Hello';
			$this->subject = (isset($this->request->data['Newsletter']['subject']) && !empty($this->request->data['Newsletter']['subject']))?$this->request->data['Newsletter']['subject']:'Newsletter';
			$this->from = (isset($this->request->data['Newsletter']['from']) && !empty($this->request->data['Newsletter']['from']))?$this->request->data['Newsletter']['from']:'contact@1337institute.com';
			$users = explode(",",$this->request->data['Newsletter']['sentusers']);
			foreach($users as $user) {
				if($this->sendmail($user)) {
					//echo("<br/>".$user." <-----> sent<br/>");
				}
			}
			$this->Session->setFlash("Email has been sent to the users.", 'default', array("class"=>"success_message"));			
			$this->redirect(array("action"=>"newsletter"));
		}
		$this->User->recursive = 0;
		$users = $this->User->find("all",array("fields"=>array("Userdetail.first_name","Userdetail.last_name","User.username","Userdetail.image","Userdetail.email")));
		$this->set(compact("users"));
	}
	
	public function user() {
		//echo "userData";die;
		 $this->loadModel('User');
          
	$users = $this->User->find('all',array('conditions'=>array(
           'status'=>'1')
           ));
		$this->set('userDashbord',$users);
		$this->render('index');

	}
	
	
	/* end of function */
	/*
	 * @function name	: ship
	 * @purpose			: shipment show the all record
	 * @arguments		: NA
	 * @return			: none
	 * @created by		: nitish kumar
	 * @created on		: 5 aug 2016
	 * @description		: NA
	 */
	
	public function ship(){
		
		 $this->loadModel('Shipment');
          
	$Shipment = $this->Shipment->find('all',array('conditions'=>array(
           'status'=>'1')
           ));
          // print_r($Shipment); exit;
		$this->set('shiplist',$Shipment);
		$this->render('shiplist');
	}
	
	
}
