<?php
App::uses('AppController', 'Controller');

class ShipsController extends AppController {
	//public $uses = array();
	public $layout = "frontend";

	public function beforefilter() {
	parent::beforefilter();
		$this->Auth->allow("shipmentRequest");
	}

/*
 * @function name	: shipmentRequest
 * @purpose			: to Store Shipment information in session
 * @created by		: mahavir singh
 * @created on		: 16 june 2016
 * @description		: NA
 */
	public function shipmentRequest(){
		if (isset($this->request->data) && !empty($this->request->data)) {
			if($this->request->data['form'] == 1){
				if($this->Session->read('Shipform.f1') != '')
				{ $this->Session->delete('Shipform.f1'); }
				$this->Session->write('Shipform.f1', $this->request->data);
			}
			elseif($this->request->data['form'] == 2){
				if($this->Session->read('Shipform.f2') != '')
				{ $this->Session->delete('Shipform.f2'); }
				$this->Session->write('Shipform.f2', $this->request->data);
						if($this->Session->read('Auth.User') != '' && $this->Session->read('Shipform.f1') != '' && $this->Session->read('Shipform.f2') != ''){
							echo 'true';
							}
			}
		}
		
	}
/*
 * @function name	: listingRequest
 * @purpose			: to save the request data from session
 * @created by		: mahavir singh
 * @created on		: 24 june 2016
 * @description		: NA
 */
	public function listingRequest($requestSave = null) {
		$this->loadModel('Shipment');
		$this->loadModel('PickupDelivery');
		if($requestSave == 'save'){
			$shipmentData = $this->Session->read('Shipform.f1');
			$pickupData = $this->Session->read('Shipform.f2');
			$shipmentData['Shipment']['item_infomation'] = serialize($shipmentData['Shipment']['item_infomation']);
			$shipmentData['Shipment']['user_id'] = $this->Session->read('Auth.User.id');
			if($this->Shipment->save($shipmentData)){
				$pickupData['PickupDelivery']['shipment_id'] = $this->Shipment->getLastInsertId();
				if($this->PickupDelivery->save($pickupData)){
					$this->Session->delete("Shipform");
					$this->Session->setFlash('Thanks for your request!',
											  'default',
											  array('class' => 'success')
											);
					$this->redirect("/");
				}
			}
		}
	}


}