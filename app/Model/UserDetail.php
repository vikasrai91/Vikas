<?php 
App::uses('AppModel', 'Model');

class UserDetail extends AppModel {
	var $validate = array(
			'profile_picture'=>array(
			        'rule' => 'validateImageExtension',
			        'message' => 'Upload jpg, jpeg, gif, png file only',
   			 )
		);

	public function validateImageExtension() { 
		$file = $this->data[$this->alias]['profile_picture'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arrExt = array('jpg', 'jpeg', 'gif','png');
            $fileName = time().'_'.$file['name'];
            if (in_array($ext, $arrExt)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/profiles/' . $fileName);
                $this->data[$this->alias]['profile_picture'] = 'profiles/' . $fileName;
                return true;
            }else{
            	return false;
            }
	}
}
?>
