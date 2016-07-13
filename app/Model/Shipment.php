<?php 
App::uses('AppModel', 'Model');

class Shipment extends AppModel {
	public $hasOne = 'PickupDelivery';
	
}
?>
