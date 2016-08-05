<?php 
App::uses('AppModel', 'Model');

class Message extends AppModel {
    var $name = 'Message';


         public $belongsTo = array(
        'UserDetail' => array(
            'className' => 'UserDetail',
            'foreignKey' => 'message_from'
        )
    );





} 

?>
