<?php 
App::uses('AppModel', 'Model');

class Shipment extends AppModel {
	public $hasOne = 'PickupDelivery';


    //      public $belongsTo = array(
    //     'Message' => array(
    //         'className' => 'Message',
    //         'foreignKey' => 'id'
    //     )
    // );

	
}
?> 