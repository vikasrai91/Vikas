<div class="container shippment-information">
      <ul class="nav nav-tabs">
      <div class="all-error" style="display:none;color: red;">
         <i class="fa fa-info-circle" aria-hidden="true"></i> Error
      </div>
         <li class="active">
            <a id="shipinfo_button" data-toggle="tab" href="#shippment-info" >Shipment Informatioin</a>
         </li>
         <li>
            <a id="pickup_button" data-toggle="tab" href="#pickup-delivery" <?php if($this->Session->read('Shipform.f1') == '') { echo 'class="not-active"';}  ?>>Pickup & Delivery</a>
         </li>
         <li>
            <a id="listing_option" data-toggle="tab" href="#listing-option" class="not-active">Listing Options</a>
         </li>
         <li>
            <a data-toggle="tab" href="#complete-listing" class="not-active">Complete Listing</a>
         </li>
      </ul>
      <div class="tab-content">

        <!-- Shipment Info -->
         <div id="shippment-info" class=" shipment-info tab-pane fade in active">
            <div class="headertop-shipmentsection">
               <h4>Input shipping details</h4>
               <div><small>*required</small></div>
            </div>
            <?php echo $this->Form->create('Shipment', array('novalidate' => true,'class' => 'form-horizontal clearfix', 'id' => 'shipment_form1', 'type' => 'file')); ?>
                  <section class="clearfix top-section-ship">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Number of Items</label>
                           <div class="col-sm-2">
                               <?php 
                                   $options = array('1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11');
                                                $class = array('class' => 'form-control numberofitems','empty' => false);
                                                echo $this->Form->select('no_of_items', $options,$class);
                               ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Brief Description</label>
                           <div class="col-sm-4">
                             <?php 
                                echo $this->Form->text('brief_description', array('class' => 'form-control','placeholder'=>'3 large Boxes'));
                             ?>
                           </div>
                           <div class="col-sm-4">
                           <div class="help-block">
                           <small>
                                (e.g., 3 Large Boxes)
                           </small>
                           </div>
                           </div>
                        </div>
                     </div>
                  </section>

                  <div id="item-info">
                     <div class="item-information-box">
                        <section class="item-information clearfix" id="item_info_0">
                           <div class="col-sm-12">
                              <div class="text-blue">
                                 <h4 class="item-info-heading">Item 1 Information</h4>
                              </div>
                           </div>
                           <div class="col-sm-7">
                           <div>
                                 <section class="choose-number clearfix">
                                    <div class="text-blue">* Is this an online listing?</div>
                                    <div class="form-group clearfix">
                                       <div class="works-in-ie-myaccount">
                                          <div class="col-sm-8 col-sm-offset-2">
                                            <div class="radio">
                                                <label>
                                                    <input class="is_online" id="online_no" type="radio" name="data[Shipment][item_infomation][0][option]" value="0" checked="checked">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    No this is not an online listing.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input class="is_online" id="online_yes" type="radio" name="data[Shipment][item_infomation][0][option]" value="1">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    Yes, this item can be found at
                                                </label>
                                            </div>
                                        </div>
                                       </div>
                                    </div>
                                    <div class="form-group clearfix">
                                       <div class="col-sm-4 col-sm-offset-2">
                                          <?php 
                                            $options2 = array('eBay' => 'eBay','Proxibid' => 'Proxibid', 'Artfact' => 'Artfact', 'AuctionZip' => 'AuctionZip', 'Craigslist' => 'Craigslist', 'GovDeals.com' => 'GovDeals.com', 'GovLiquidation.com' => 'GovLiquidation.com', 'Gumtree' => 'Gumtree', 'Invaluable' => 'Invaluable', 'Liquidation.com' => 'Liquidation.com', 'LiveAuctioneers' => 'LiveAuctioneers', 'markt.de' => 'markt.de', 'Public Surplus' => 'Public Surplus', 'Other' => 'Other');
                                            $class = array('class' => 'form-control found-select','empty' => false);
                                            echo $this->Form->select('Shipment.item_infomation.0.online_type', $options2,$class);
                                          ?>
                                       </div>
                                    </div>
                                    <div class="form-group url-input found-check" style="display: none;">
                                       <div class="col-sm-8 col-sm-offset-2">
                                          <label for="exampleInputEmail1">Copy website URL here:</label>
                                            <?php 
                                                echo $this->Form->text('Shipment.item_infomation.0.online_url', array('class' => 'form-control'));
                                            ?>
                                             <!-- <input type="text" class="form-control"> -->
                                          <div class="help-block">
                                                <small>
                                                   NOTICE: This URL is for internal purposes only so we can serve you better in the future. It will not appear on your  listing.
                                                </small>
                                          </div>
                                       </div>
                                    </div>
                                 </section>

                              <div class="form-group">
                                 <div class="works-in-ie-myaccount">
                                    <div class="col-sm-8 col-sm-offset-3">
                                       <label class="radio-inline">
                                          <input type="radio" id="imperial_rad" name="data[Shipment][item_infomation][0][measure_type]"  class="metric" value="1" checked="checked">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Imperial
                                       </label>
                                       <label class="radio-inline">
                                          <input type="radio" id="metric_rad" name="data[Shipment][item_infomation][0][measure_type]" class="metric" value="2">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Metric
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group length">
                                 <label class="col-sm-3 control-label">Length</label>
                                    <div class="col-sm-3 ">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.length.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                      ?>
                                    </div>
                                    <div class="col-sm-3 length">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.length.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                      ?>
                                    </div>
                              </div>
                              <div class="form-group ">
                                  <label class="col-sm-3 control-label">Width</label>
                                      <div class="col-sm-3 width">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.width.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                        ?>
                                      </div>
                                      <div class="col-sm-3 width">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.width.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group ">
                                  <label class="col-sm-3 control-label">Height</label>
                                      <div class="col-sm-3 height">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.height.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                        ?>
                                      </div>
                                      <div class="col-sm-3 height">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.height.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group ">
                                  <label class="col-sm-3 control-label">Weight</label>
                                      <div class="col-sm-3 weight">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.weight',array('class' => 'form-control weight','placeholder'=>'lbs'));
                                      ?>
                                      </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Quantity</label>
                                      <div class="col-sm-3 weight">
                                        <?php 
                                            echo $this->Form->input('Shipment.item_infomation.0.quantity', array(
                                                'options' => $options,
                                                'class' => 'form-control',
                                                'label' => false,
                                                'div' => false
                                            ));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group item-description">
                                  <label class="col-sm-3 control-label">Item Description</label>
                                      <div class="col-sm-6">
                                      <?php
                                        echo $this->Form->textarea(
                                            'Shipment.item_infomation.0.item_description',
                                            array('rows' => '4', 'cols' => '4','class'=>'form-control')
                                        );
                                      ?>
                                        
                                      </div>
                              </div>
                              </div>
                           </div>
                               <div class="col-sm-5 item-img">
                                <?php 
                                    echo $this->Html->image('2.png', array('alt' => '', 'class' => 'img-responsive'));
                                ?>
                               </div>
                        </section>
                     </div>
                     
                  </div>
                  <div class="form-group url-input ">
                                       <div class="col-sm-8 col-sm-offset-2">
                                         
                                            <?php 
                                                echo $this->Form->checkbox('assisted_purchase', array('hiddenField' => false));
                                              ?>
                                              Assisted Purchase
                                          <div class="help-block">
                                                <small>
                                                   NOTICE: pay service provider and
                                                      they purchase what you need.
                                                </small>
                                          </div>
                                       </div>
                      </div>
                      
                      <section class="clearfix shipment-info-bottom">
                         <div class="col-sm-12">
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Palletized *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio" value="1" name="data[Shipment][item_palletized]">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" value="0" name="data[Shipment][item_palletized]" checked="checked">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(No Item is on a wooden or plastic pallet and can be moved by forklift)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Crated *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio"  value="1" name="data[Shipment][item_crated]">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" checked="0" value="0" name="data[Shipment][item_crated]">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(item is boxed in wooden or plastic crat)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="works-in-ie-myaccount">
                                  <label class="col-sm-2 control-label">Item(s) Stackable *</label>
                                  <div class="col-sm-8">
                                     <label class="radio-inline">
                                     <input type="radio"  value="1" name="data[Shipment][item_stackable]">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     Yes
                                     </label>
                                     <label class="radio-inline">
                                     <input type="radio" checked="0" value="0" name="data[Shipment][item_stackable]">
                                     <i class="fa-radio fa-checked  checked"></i>
                                     <i class="fa-radio fa-unchecked unchecked"></i>
                                     No <small>(item has flat surfaces and can sustain the weight of another object)</small>
                                     </label>
                                  </div>
                               </div>
                            </div>
                              <div class="form-group">
                             <label class="col-sm-2 control-label">Upload Pictures</label>
                             <div class="col-sm-5">
                             <?php
                             //echo $this->Form->input('form', array('name' => 'form','type' => 'hidden','div'=>false, 'value' => '1'));
                             ?>
                             <?php 
                                echo $this->Form->input('upload_picture', array('type' => 'hidden','label'=>false));
                             ?>
                             <?php 
                                echo $this->Form->input('choose_picture', array('type' => 'file','class'=>'form-control','label'=>false));
                             ?>
                             </div>
                             <br>
                             <div class="col-sm-10 col-md-offset-2 show_image"></div>
                             <div class="help-block col-sm-10 col-sm-offset-2">
                                <small>
                                TIP: Listings with pictures get 63% more bids than listings without pictures! 
                                You can add an image now or do it later from your dashboard.
                                </small>
                             </div>
                              <div id="fine-uploader-gallery"></div>
                          </div>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Additional Details</label>
                             <div class="col-sm-5">
                                <?php
                                        echo $this->Form->textarea(
                                            'additional_detail',
                                            array('rows' => '4', 'cols' => '4','class'=>'form-control')
                                        );
                                ?>
                             </div>
                             <div class="help-block col-sm-10 col-sm-offset-2">
                                <small>
                                IMPORTANT: Do not include your contact information here. For your security, your contact information will be exchanged only after you book a shipment with your Service Provider
                                </small>
                             </div>
                          </div>                       
                         </div>
                      </section>
                           <div class="footer-btn">
                             <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <?php 
                                  echo $this->Form->button('Back', array('onclick' => 'window.history.back();','class'=>'btn btn-default margin-right-btn'));
                                ?>
                                <?php 
                                  echo $this->Form->button('Continue', array('type' => 'submit','class'=>'btn btn-blue'));
                                ?>

                                </div>
                             </div>
                          </div>
                    <?php echo $this->Form->end(); ?>
                </div>

            <!-- Pickup Delivery Section-->
            <div id="pickup-delivery" class=" pickup-delivery tab-pane fade">
               <div class="headertop-shipmentsection">
                  <h4>Choose Pickup & Delivery</h4>
                  <div><small>*required</small></div>
               </div>
               <?php echo $this->Form->create('PickupDelivery', array('novalidate' => true,'class' => 'form-horizontal learfixc' , 'id' => 'shipment_form2')); ?>
                  <section class="clearfix">

                     <div class="col-sm-4">
                        <div class="form-group clearfix">
                           <label class="control-label padding-left">Shipping Port location</label>
                           <div class="">

                              <?php 
                                        echo $this->Form->text('pickup_location',array('class' => 'form-control','placeholder'=>'City Or Zip'));
                              ?>
                              
                              <!-- <input type="text" class="form-control" placeholder="City Or Zip"> -->
                           </div>
                           <!-- <div class="current_location hide">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Use current location</div> -->
                        </div>
                        <?php
                             //echo $this->Form->input('form', array('name' => 'form','type' => 'hidden','div'=>false, 'value' => '2'));
                             ?>
                        <div class="form-group">
                           <label>When will the shipment be at the port?</label>
                           <div class="input-group" >
                              <?php 
                                        echo $this->Form->text('pickup_date',array('class' => 'form-control datepicker'));
                              ?>
                              <div class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="clearfix whatdo-youneed">
                  <div class="col-sm-12">
                    <div class="col-sm-4 padding-left">
                       <div class="form-group clearfix">
                           <label class="control-label padding-left">Delivery location</label>
                           <div class="">

                              <?php 
                                        echo $this->Form->text('delivery_location',array('class' => 'form-control','placeholder'=>'City Or Zip'));
                              ?>
                              
                              <!-- <input type="text" class="form-control" placeholder="City Or Zip"> -->
                           </div>
                           <!-- <div class="current_location hide">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i> Use current location</div> -->
                          </div>
                     </div>
                  </div>
                     <div class="col-sm-12">
                           
                           <div class="col-sm-4 padding-left">
                           <div class="form-group clearfix">
                           <label class="control-label">When do you need your shipment delivered?</label>
                              <div class="input-group" >

                                  <?php 
                                        echo $this->Form->text('deliver_date',array('class' => 'form-control datepicker'));
                                  ?>
                                 <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                              </div>
                           </div>
                           <div class="col-sm-4 padding-left between_date" style="display: none;">
                           <div class=" padding-left " >
                           <label class="control-label">&nbsp;</label>
                              <div class="input-group" >
                                  <?php 
                                        echo $this->Form->text('deliver_date2',array('class' => 'form-control datepicker'));
                                  ?>
                                 <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                 </div>
                              </div>
                           </div>
                           </div>
                      </div>
                  <div class="col-sm-12">
                           
                           <div class="col-sm-2 form-group padding-left">
                           <label class="control-label">&nbsp;</label>
                           <?php
                           $class=array('class'=>'form-control','empty' => false);
                              echo $this->Form->select('deliver_on_type', array(
                                    'ASAP' => 'ASAP',
                                    'Before' => 'Before',
                                    'Between' => 'Between',
                                    'ON' => 'ON'
                                ),$class
                              
                              );

                           ?>
                             <!--  <select class="form-control">
                                 <option>ASAP</option>
                                 <option>Before</option>
                                 <option>Between</option>
                                 <option>ON</option>
                              </select> -->
                           </div>
                           <div class="help-block col-sm-12 padding-left">
                              <small>
                              TIP: Remember to confirm the terms of shipment with your chosen Service Provider, including additional services or insurance.
                              </small>
                           </div>
                       
                        <div class="footer-btn">
                           <div class="form-group">
                              <div class=" col-sm-10">
                              <?php 
                                        echo $this->Form->button('Back', array('onclick' => 'backButton();', 'class'=>'btn btn-default margin-right-btn'));
                              ?>
                              <?php 
                                echo $this->Form->button('Continue', array('type' => 'submit','class'=>'btn btn-blue'));
                              ?>
                                 <!-- <button type="submit" class="btn btn-default margin-right-btn">Back</button>
                                 <button type="submit" class="btn btn-blue">Continue</button> -->
                              </div>
                           </div>
                      </div>
                     </div>
                  </section>
                  
               <?php echo $this->Form->end(); ?>
            </div>


            <!-- Listing Option -->
            <div id="listing-option" class="tab-pane fade listing-option">
               <div class="headertop-shipmentsection">
                  <h4>Create an Account</h4>
               </div>
               <?php echo $this->Form->create('User', array('novalidate' => true, 'class' => 'clearfix', 'url' => array('controller' => 'users', 'action' => 'signup'))); ?>
                                 <?php echo $this->Form->input('user_type', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => 1
                                 )); ?>
                  <div class="col-sm-6">
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <!-- <button class="btn btn-fb btn-block"><i aria-hidden="true" class="fa fa-facebook"> </i> Sign in with Facebook</button> -->
                          <?php
                                echo $this->Form->button('<i class="fa fa-facebook" aria-hidden="true"> </i> Sign in with Facebook', array('type' => 'button', 'onclick' => 'checkLoginState(1);', 'class' => 'btn btn-fb btn-block'));
                          ?>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <div class="border-top">
                              <div class="or-text">Or</div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-6">
                           <label>First Name</label>
                           <?php 
                                 echo $this->Form->input('UserDetail.f_name', array(
                                    'placeholder' => 'First Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                        </div>
                        <div class="col-sm-6">
                           <label>Last Name</label>
                           <?php 
                                 echo $this->Form->input('UserDetail.l_name', array(
                                    'placeholder' => 'Last Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Email</label>
                           <?php 
                                 echo $this->Form->input('email', array(
                                    'type' => 'email', 
                                    'placeholder' => 'Email Address', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Phone</label>
                           <?php 
                                 echo $this->Form->input('UserDetail.phone_number', array(
                                    'placeholder' => 'Phone Number', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                        </div>
                     </div>
                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           
                           <?php 
                            $types = array('1' => 'Personal', '2' => 'Business');
                              echo $this->Form->input(
                                  'account_type',
                                  array('options' => $types, 'default' => '1', 'class' => 'form-control')
                              );
                           ?>
                        </div>
                     </div>
                     <div class="form-group clearfix company_name" style="display: none;">
                        <div class="col-sm-12">
                           <?php 
                                 echo $this->Form->input('UserDetail.company_name', array(
                                    'placeholder' => 'Company name', 
                                    'div' => false, 
                                    'label' => 'Company name', 
                                    'class' => 'form-control'));
                            ?>
                        </div>
                     </div>

                     <div class="form-group clearfix">
                        <div class="col-sm-12">
                           <label>Create Password</label>
                           <?php 
                                 echo $this->Form->input('password', array(
                                    'type' => 'password', 
                                    'placeholder' => 'Password', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 list-right-background">
                     <h2>Have an Account?</h2>
                     <!-- <button class="btn btn-blue sign-in">Sign In</button> -->
                     <?php
                                echo $this->Html->link(
                                      'Sign In',
                                      '/users/login',
                                      array('class' => 'btn btn-blue sign-in', 'target' => '_self')
                                   );
                             ?>
                  </div>
                  <div class="col-sm-12">
                     <div class="footer-btn clearfix">
                        <div class="form-group">
                           <div class=" col-sm-10">
                              <button type="submit" class="btn btn-default margin-right-btn">Back</button>
                              <!-- <button type="submit" class="btn btn-blue">Continue</button> -->
                              <?php 
                                  echo $this->Form->button('Continue', array('type' => 'submit','class'=>'btn btn-blue'));
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
                <?php echo $this->Form->end(); ?>
              </div>


            <!-- Complete Listing-->
            <div id="complete-listing" class="complete-listing tab-pane fade">
              
            </div>
         </div>
      </div>

       <div id="info-hide" class="hide">
            <div class="item-information-box-hide">
                <section class="item-information clearfix">
                    <div class="col-sm-12">
                        <div class="text-blue">
                            <h4 class="item-info-heading">Item 1 Information</h4>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <section class="choose-number clearfix">
                                    <div class="text-blue">* Is this an online listing?</div>
                                    <div class="form-group clearfix">
                                       <div class="works-in-ie-myaccount">
                                          <div class="col-sm-8 col-sm-offset-2">
                                            <div class="radio">
                                                <label>
                                                    <input class="is_online" type="radio" name="data[Shipment][item_infomation][0][option]" value="0" checked="checked">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    No this is not an online listing.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input class="is_online" type="radio" name="data[Shipment][item_infomation][0][option]" value="1">
                                                    <i class="fa-radio fa-checked  checked"></i>
                                                    <i class="fa-radio fa-unchecked unchecked"></i>
                                                    Yes, this item can be found at
                                                </label>
                                            </div>
                                        </div>
                                       </div>
                                    </div>
                                    <div class="form-group clearfix">
                                       <div class="col-sm-4 col-sm-offset-2">
                                          <?php 
                                            $options2 = array('eBay' => 'eBay','Proxibid' => 'Proxibid', 'Artfact' => 'Artfact', 'AuctionZip' => 'AuctionZip', 'Craigslist' => 'Craigslist', 'GovDeals.com' => 'GovDeals.com', 'GovLiquidation.com' => 'GovLiquidation.com', 'Gumtree' => 'Gumtree', 'Invaluable' => 'Invaluable', 'Liquidation.com' => 'Liquidation.com', 'LiveAuctioneers' => 'LiveAuctioneers', 'markt.de' => 'markt.de', 'Public Surplus' => 'Public Surplus', 'Other' => 'Other');
                                            $class = array('class' => 'form-control found-select','empty' => false);
                                            echo $this->Form->select('Shipment.item_infomation.0.online_type', $options2,$class);
                                          ?>
                                       </div>
                                    </div>
                                    <div class="form-group url-input found-check" style="display: none;">
                                       <div class="col-sm-8 col-sm-offset-2">
                                          <label for="exampleInputEmail1">Copy website URL here:</label>
                                            <?php 
                                                echo $this->Form->text('Shipment.item_infomation.0.online_url', array('class' => 'form-control'));
                                            ?>
                                             <!-- <input type="text" class="form-control"> -->
                                          <div class="help-block">
                                                <small>
                                                   NOTICE: This URL is for internal purposes only so we can serve you better in the future. It will not appear on your  listing.
                                                </small>
                                          </div>
                                       </div>
                                    </div>
                                 </section>

                              <div class="form-group">
                                 <div class="works-in-ie-myaccount">
                                    <div class="col-sm-8 col-sm-offset-3">
                                       <label class="radio-inline">
                                          <input type="radio" name="data[Shipment][item_infomation][0][measure_type]"  class="metric" value="1" checked="checked">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Imperial
                                       </label>
                                       <label class="radio-inline">
                                          <input type="radio" name="data[Shipment][item_infomation][0][measure_type]" class="metric" value="2">
                                          <i class="fa-radio fa-checked  checked"></i>
                                          <i class="fa-radio fa-unchecked unchecked"></i>
                                          Metric
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group length">
                                 <label class="col-sm-3 control-label">Length</label>
                                    <div class="col-sm-3 ">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.length.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                      ?>
                                    </div>
                                    <div class="col-sm-3 ">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.length.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                      ?>
                                    </div>
                              </div>
                              <div class="form-group width">
                                  <label class="col-sm-3 control-label">Width</label>
                                      <div class="col-sm-3 ">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.width.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                        ?>
                                      </div>
                                      <div class="col-sm-3 ">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.width.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group height">
                                  <label class="col-sm-3 control-label">Height</label>
                                      <div class="col-sm-3 ">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.height.0',array('class' => 'form-control imperial-attr','placeholder'=>'ft.'));
                                        ?>
                                      </div>
                                      <div class="col-sm-3 ">
                                        <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.height.1',array('class' => 'form-control imperial-attr-next','placeholder'=>'In.'));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group weight">
                                  <label class="col-sm-3 control-label">Weight</label>
                                      <div class="col-sm-3 ">
                                      <?php 
                                        echo $this->Form->text('Shipment.item_infomation.0.weight',array('class' => 'form-control weight','placeholder'=>'lbs'));
                                      ?>
                                      </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-3 control-label">Quantity</label>
                                      <div class="col-sm-3 ">
                                        <?php 
                                            echo $this->Form->input('Shipment.item_infomation.0.quantity', array(
                                                'options' => $options,
                                                'class' => 'form-control',
                                                'label' => false,
                                                'div' => false
                                            ));
                                        ?>
                                      </div>
                              </div>
                              <div class="form-group item-description">
                                  <label class="col-sm-3 control-label">Item Description</label>
                                      <div class="col-sm-6">
                                      <?php
                                        echo $this->Form->textarea(
                                            'Shipment.item_infomation.0.item_description',
                                            array('rows' => '4', 'cols' => '4','class'=>'form-control')
                                        );
                                      ?>
                                        
                                      </div>
                              </div>
                    </div>

                        <div class="col-sm-5 item-img">
                            <!-- <img  class="img-responsive" src="img/dimensions.png"> -->
                            <?php 
                                    echo $this->Html->image('2.png', array('alt' => '', 'class' => 'img-responsive'));
                            ?>
                        </div>
                </section>
                  
            </div>

        </div>
<?php echo $this->Html->script('frontend/shipment-request'); ?>
<center>
<?php 
      echo $this->Html->image('loading.gif', array('style' => 'display:none;position: fixed;top: 100px;width: 100px;margin-left: 40%;', 'alt' => '', 'class' => 'img-responsive', 'id' => 'loader'));
?>
</center>

<style type="text/css">
  .not-active {
   pointer-events: none;
   cursor: default;
}
.current_location{
  background:#ccc;
  padding: 2px
}
.show_image{
  padding: 10px;
}
</style>

