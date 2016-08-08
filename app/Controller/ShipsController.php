<?php
App::uses('AppController', 'Controller');

class ShipsController extends AppController {
	public $uses = array('Shipment', 'PickupDelivery');
	public $layout = "frontend";

	public function beforefilter() {
	parent::beforefilter();
		$this->Auth->allow("shipmentRequest", "uploadImage", "deleteuploadFile");
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
							exit;
							}else{
							echo 'false';
							exit;	
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
		//Configure::write('debug', 0);
		if($this->Session->read('Shipform') == '' && !isset($this->params['pass'][0])){
			throw new NotFoundException();
		}
		if($requestSave == 'save' || (isset($this->request->data) && !empty($this->request->data))){
			
			$shipmentData = $this->Session->read('Shipform.f1');
			if(!empty($this->request->data)){
				$shipmentData['Shipment']['price'] = $this->request->data['Shipment']['price'];
				$shipmentData['Shipment']['status'] = $this->request->data['Shipment']['status'];
				
				if(isset($this->request->data['Shipment']['id'])){
					$shipmentData['Shipment']['id'] = $this->request->data['Shipment']['id'];
				}
			}
			if(isset($shipmentData['Shipment']['item_infomation'])){
				$shipmentData['Shipment']['item_infomation'] = serialize($shipmentData['Shipment']['item_infomation']);
			}
			$shipmentData['Shipment']['user_id'] = $this->Session->read('Auth.User.id');

			$pickupData = $this->Session->read('Shipform.f2');
			
			if($this->Shipment->save($shipmentData)){
				if($this->Shipment->getLastInsertId() != ''){
					$pickupData['PickupDelivery']['shipment_id'] = $this->Shipment->getLastInsertId();
				}

				if(isset($this->request->data['Shipment']['id'])){
					$this->redirect('/ships/completeListing/'.base64_encode($shipmentData['Shipment']['id']));
				}else{
					if($this->PickupDelivery->save($pickupData)){
					$this->Session->delete("Shipform");
					
					$this->redirect('/ships/completeListing/'.base64_encode($pickupData['PickupDelivery']['shipment_id']));
				}
				}
			}
		}
	}
/*
 * @function name	: completeListing
 * @purpose			: to show complete detail of shipping and update address detail also
 * @created by		: mahavir singh
 * @created on		: 29 june 2016
 * @description		: NA
 */
	public function completeListing($id = null){
			
		if($id != 'null'){
			if(isset($this->request->data) && !empty($this->request->data)){
				$updateAddress = $this->request->data;
				 $updateAddress['PickupDelivery']['id'] = base64_decode($id);
				if(!$this->PickupDelivery->save($updateAddress)){
					throw new NotFoundException();
				}
			}
		 $completeListing = $this->Shipment->findAllById(base64_decode($id));
			if($completeListing){
				$this->set('completeListing', $completeListing);
			}else{ throw new NotFoundException(); }
		}
		else{
			throw new NotFoundException();
		}
	}




/*
 * @function name	: openjobdetail
 * @purpose			: to show complete detail of Open job
 * @created by		: mahavir singh
 * @created on		: 29 june 2016
 * @description		: NA
 */
/*	public function openjobdetail($id = null){
         $this->loadModel('Shipment');
         
		 $completeListing = $this->Shipment->findAllById(base64_decode($id));
			if($completeListing){
				$this->set('completeListing', $completeListing);
			}
		  
             
	}*/






/*
 * @function name	: uploadImage
 * @purpose			: to upload image with ajax
 * @created by		: mahavir singh
 * @created on		: 30 june 2016
 * @description		: NA
 */
	public function uploadImage($id = null){
		$this->autoRender = false;
		if (isset($this->request->data) && !empty($this->request->data['Shipment']['choose_picture']['name'])) {
			$file = $this->request->data['Shipment']['choose_picture'];
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arrExt = array('jpg', 'jpeg', 'gif','png');
            $fileName = time().'_'.$file['name'];
            if (in_array($ext, $arrExt)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/' . $fileName);
                $resData['name'] = $fileName;
                $resData['success'] = 1;
            }else{
            	$resData['msg'] = "Upload jpg, jpeg, gif, png only";
            	$resData['success'] = 0;
            }
		}
		return json_encode($resData);
	}

/*
 * @function name	: deleteuploadFile
 * @purpose			: For delete uploaded file
 * @created by		: mahavir singh
 * @created on		: 4 july 2016
 * @description		: NA
 */
	public function deleteuploadFile(){
		$this->autoRender = false;
		if (isset($this->request->data) && !empty($this->request->data)){
			$file = new File(WWW_ROOT . 'img/uploads/'.$this->request->data['fileName'], false, 0777);
				if($file->delete()) {
				   return true;
				}else{
					return false;
				}
		}
	}
/*
 * @function name	: editShipment
 * @purpose			: For edit shipping request
 * @created by		: mahavir singh
 * @created on		: 1 july 2016
 * @description		: NA
 */
	public function editShipment($id = null){
		if($id != null && isset($id)){
			$editShipment = $this->Shipment->findAllById(base64_decode($id));
			if($editShipment){
				$this->set('editShipment', $editShipment[0]);
			}else{
				throw new NotFoundException();
			}
		}
		else{
			throw new NotFoundException();
		}
	}

/*
 * @function name	: deleteShipment
 * @purpose			: For delete shipping request from database
 * @created by		: mahavir singh
 * @created on		: 4 july 2016
 * @description		: NA
 */
	public function deleteShipment($id = null){
		if($id != null && isset($id)){
			$deleteShip = $this->Shipment->deleteAll(array('Shipment.id' => base64_decode($id)), true);
			$deleteReference = $this->PickupDelivery->deleteAll(array('PickupDelivery.shipment_id' => base64_decode($id)), true);
			$this->redirect('/');
		}
	}

}