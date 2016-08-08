<?php 
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	public $hasOne = 'UserDetail';
	var $validate = array(
		
		'email'=>array(
			'notempty'=>array(
				'rule'=>'notBlank',
				'message'=>'Please enter username.'
			),
			'email'=>array(
				'rule'=>'email',
				'message'=>'Please enter valid email.'
			),
			'isUnique'=>array(
				'rule'=>'isUnique',
				'message'=>'This email is already registered.'
			)
		),
		'password'=>array(
			'notempty'=>array(
				'rule'=>'notBlank',
				'message'=>'Please enter password.'
			),
			'minlength'=>array(
				'rule'=>array('minlength',6),
				'message'=>'Password size min 6 chracters.'
			),
			'maxlength'=>array(
				'rule'=>array('maxlength',50),
				'message'=>'Password size max 15 chracters.'
			)
		),
		'current_password'=>array(
			'notempty'=>array(
				'rule'=>'checkCurrentPassword',
				'message'=>'Current password is not match.'
			)
		),
		'confirm_password'=>array(
			'notempty'=>array(
				'rule'=>'validateConfirmPasswords',
				'message'=>'Password does not match.'
			),
			
		)

	);


	

public function validateConfirmPasswords() { 
    return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
}

public function checkCurrentPassword($data) {
    $this->id = AuthComponent::user('id');
    $password = $this->field('password');
    return(AuthComponent::password($data['current_password']) == $password);
}

public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

}
?>
