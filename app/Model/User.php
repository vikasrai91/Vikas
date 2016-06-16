<?php 
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {

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
		'username'=>array(
			'notempty'=>array(
				'rule'=>'notBlank',
				'message'=>'Please enter username.'
			),
			'isUnique'=>array(
				'rule'=>'isUnique',
				'message'=>'This username is already registered.'
			)
		),
		'password'=>array(
			'notempty'=>array(
				'rule'=>'notBlank',
				'message'=>'Please enter password.'
			),
			'minlength'=>array(
				'rule'=>array('minlength',6),
				'message'=>'Password size min 5 chracters.'
			),
			'maxlength'=>array(
				'rule'=>array('maxlength',50),
				'message'=>'Password size max 15 chracters.'
			)
		)
	);


public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
}

}
?>
