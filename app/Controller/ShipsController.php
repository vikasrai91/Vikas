<?php
App::uses('AppController', 'Controller');

class ShipsController extends AppController {
	//public $uses = array();
	public $layout = "frontend";

	public function beforefilter() {
	parent::beforefilter();
		$this->Auth->allow("shipmentRequest", "uploadMulti");
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
			}
		}
		if($this->Session->read('Auth.User.id') != ''){
			$this->redirect('/ships/listingRequest');
		}
		
	}
/*
 * @function name	: listingRequest
 * @purpose			: to list the request
 * @created by		: mahavir singh
 * @created on		: 24 june 2016
 * @description		: NA
 */
	public function listingRequest() {

	}


}