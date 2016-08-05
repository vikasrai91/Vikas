<!-- Update Street Address -->
        <div class="modal fade update-address" id="update-address" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Update Street Addresses</h3>
                    </div>
                            <?php 
                                echo $this->Form->create('PickupDelivery', array('novalidate' => true, 'class' => 'form-horizontal clearfix')); 
                            ?>
                <div class="modal-body clearfix">
                   
                                
                        <div class="col-sm-6">
                                <div class="col-sm-12">
                                    <h4>Collection</h4>
                                </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Contact Name</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="Nicky C Kennedy"> -->
                            <?php 
                                 echo $this->Form->input('pickup_contact_name', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pickup_contact_name']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Phone</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="908-368-1229"> -->
                            <?php 
                                 echo $this->Form->input('pickup_mobile', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pickup_mobile']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Address</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="3525 Stonepot Road"> -->
                            <?php 
                                 echo $this->Form->input('pickup_location', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pickup_location']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">City</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="Newark"> -->
                            <?php 
                                 echo $this->Form->input('pick_city', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pick_city']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">State</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="New Jersey"> -->
                            <?php 
                                 echo $this->Form->input('pick_state', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pick_state']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Zip Code</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="07102"> -->
                            <?php 
                                 echo $this->Form->input('pick_zip', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['pick_zip']
                                    ));
                            ?>
                                </div>
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <h4>Delivery</h4>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Contact Name</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="Nicky C Kennedy"> -->
                            <?php 
                                 echo $this->Form->input('delivery_contact_name', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['delivery_contact_name']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Phone</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="908-368-1229"> -->
                            <?php 
                                 echo $this->Form->input('delivery_mobile', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['delivery_mobile']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Address</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="3525 Stonepot Road"> -->
                            <?php 
                                 echo $this->Form->input('delivery_location', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['delivery_location']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">City</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="Newark"> -->
                            <?php 
                                 echo $this->Form->input('deliver_city', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['deliver_city']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">State</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="New Jersey"> -->
                            <?php 
                                 echo $this->Form->input('deliver_state', array( 
                                    //'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['deliver_state']
                                    ));
                            ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Zip Code</label>
                                <div class="col-sm-8">
                                    <!-- <input type="text" class="form-control" placeholder="07102"> -->
                            <?php 
                                 echo $this->Form->input('deliver_zip', array( 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default'=>$completeListing[0]['PickupDelivery']['deliver_zip']
                                    ));
                            ?>
                                </div>
                            </div>
                        </div>
                   
                </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                       <!--  <button type="button" class="btn btn-primary">Confirm</button> -->
                        <?php echo $this->Form->button('Cancel',array('data-dismiss' =>'modal','class' => 'btn btn-default', 'onclick' => 'window.location.reload()')); ?>
                        <?php echo $this->Form->button('Confirm',array('type' => 'submit','class' => 'btn btn-primary')); ?>
                    </div>
                <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>