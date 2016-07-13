<div class="col-sm-10 col-lg-6 col-sm-offset-1 col-lg-offset-3 step-1 login-top-margin">
            
            <!-- Shipping customer Signup Start here -->
            <h3 class="text-center">
               CREATE AN ACCOUNT
               <div class=" text-center sub-heading-login">I am a ...</div>
            </h3>
            <div class="login-wraper clearfix">
               <div class="col-sm-12 signup-padding">
                  <ul class="nav nav-tabs">

                     <li class="active">

                     <a id="customer_button" data-toggle="tab" href="#shipping-customer"><div class="text-center"><i class="fa fa-user fa-custom-user" aria-hidden="true"></i></div>Shipping Customer</a></li>
                     <li><a id="carrier_button" data-toggle="tab" href="#carrier"><div class="text-center"><i class="fa fa-truck fa-custom-user" aria-hidden="true"></i></div>Carrier</a></li>
                  </ul>
                  <div class="tab-content">
                     <div id="shipping-customer" class=" shipping-customer tab-pane fade in active">
                  <!-- <form> -->
            

                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php
                                 echo $this->Form->button('<i class="fa fa-facebook" aria-hidden="true"> </i> Sign in with Facebook', array('type' => 'button', 'onclick' => 'checkLoginState(1);', 'class' => 'btn btn-fb btn-block'));
                                 ?>
                           </div>
                        </div>
                  <?php echo $this->Form->create('User', array('novalidate' => true)); ?>
                                 <?php echo $this->Form->input('user_type', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => 1
                                 )); ?>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r ">
                              <div class="border-top">
                                 <div class="or-text">Or</div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-12 padding-l-r">  
                              <label>Account Type</label>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                         <div class="works-in-ie-myaccount">
                           <div class="col-sm-12 padding-l-r">
                              <label class="radio-inline" id="radio_personal">
                              <input type="radio" checked="checked" name="data[User][account_type]" value="1">

                               <i class="fa-radio fa-checked  checked"></i>
                              <i class="fa-radio fa-unchecked unchecked"></i>
                              Personal
                              </label>
                              <label class="radio-inline" id="radio_business">
                              <input type="radio" name="data[User][account_type]" value="2">
                               <i class="fa-radio fa-checked  checked"></i>
                              <i class="fa-radio fa-unchecked unchecked"></i>
                              Business
                              </label>
                           </div>
                        </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-6 padding-left">

                              <?php 
                                 echo $this->Form->input('UserDetail.f_name', array(
                                    'placeholder' => 'First Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                           <div class="col-sm-6 padding-right">

                              <?php 
                                 echo $this->Form->input('UserDetail.l_name', array(
                                    'placeholder' => 'Last Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>
                        <div style="display: none;" class="form-group clearfix company-name">
                           <div class="col-sm-12 padding-l-r">

                              <?php 
                                 echo $this->Form->input('UserDetail.company_name', array(
                                    'placeholder' => 'Company Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
  
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
                           <div class="col-sm-12 padding-l-r">
                              <?php 
                                 echo $this->Form->input('password', array(
                                    'type' => 'password', 
                                    'placeholder' => 'Password', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                           <div class="col-sm-12 padding-l-r">
                              <div class="help-block">
                                 <small>Case sensitive. At least 6 characters.</small>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r text-center">
                              
                              <?php echo $this->Form->submit('JOIN',array('class' => 'btn btn-blue-login')); ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <p class="text-center signup-text-bottom">By Clicking Join. you accept the terms and conditions of the <span class="text-blue"><a href="#">User Agrement</a></span> and <span class="text-blue"><a href="#">Privacy Policy</a></span></p>
                        </div>
                        <?php echo $this->Form->end(); ?>
                     </div>

                      <!-- Shipping customer Signup End here -->

                      <!-- Shipping Carrier Signup Start here -->
                     <div id="carrier" class=" carrier tab-pane fade">
               
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php
                                 echo $this->Form->button('<i class="fa fa-facebook" aria-hidden="true"> </i> Sign in with Facebook', array('type' => 'button', 'onclick' => 'checkLoginState(3);', 'class' => 'btn btn-fb btn-block', 'id' => 'facebookbutton1'));
                              ?>
                           </div>
                        </div>
                        <?php echo $this->Form->create('User', array('novalidate' => true, 'id' => 'carrier_form1')); ?>
                                 <?php echo $this->Form->input('user_type', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => 2
                                 )); ?>
                                 <?php echo $this->Form->input('facebook_id', array(
                                             'type' => 'hidden',
                                             'div' => false
                                 )); ?>
                                 <?php echo $this->Form->input('UserDetail.profile_picture', array(
                                             'type' => 'hidden',
                                             'div' => false
                                 )); ?>
                        <div class="form-group clearfix ddivider">
                           <div class="col-sm-12 padding-l-r ">
                              <div class="border-top">
                                 <div class="or-text">Or</div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-6 padding-left">
                              <?php 
                                 echo $this->Form->input('UserDetail.f_name', array(
                                    'placeholder' => 'First Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'id' => 'UserDetailFName1'
                                    ));
                              ?>
                           </div>
                           <div class="col-sm-6 padding-right">
                              <?php 
                                 echo $this->Form->input('UserDetail.l_name', array(
                                    'placeholder' => 'Last Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'id' => 'UserDetailLName1'));
                              ?>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php 
                                 echo $this->Form->input('email', array(
                                    'type' => 'email', 
                                    'placeholder' => 'Email Address', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'id' => 'UserEmail1'));
                              ?>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php 
                                 echo $this->Form->input('UserDetail.phone_number', array(
                                    'placeholder' => 'Phone Number', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                           <div class="col-sm-12">
                           </div>
                        </div>
                        <div class="form-group clearfix carrier-signup">
                           <div class="col-sm-12 text-center">
                             <!--  <a href="tell-your-business.html" class="btn btn-blue-login">CONTINUE</a> -->
                              <?php echo $this->Form->submit('CONTINUE',array('class' => 'btn btn-blue-login')); ?>
                           </div>
                        </div>
                        <div class="form-group">
                           <p class="text-center signup-text-bottom">By Clicking Continue. you accept the terms and conditions of the <span class="text-blue"><a href="#">User Agrement</a></span> and <span class="text-blue"><a href="#">Privacy Policy</a></span></p>
                        </div>
                        <?php echo $this->Form->end(); ?>
                     </div>
                     <!-- Shipping Carrier Signup End here -->
                  </div>
               </div>
            </div>
         </div>
<div style="display: none;" class="col-sm-10 col-lg-6 col-sm-offset-1 col-lg-offset-3 tell-us login-top-margin">
            
<?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'id' => 'carrier_form2')); ?>
            <!-- Shipping customer Signup Start here -->
            <h3 class="text-center">
               Tell us about your business
             <!--   <div class=" text-center sub-heading-login">I am a ...</div> -->
            </h3>
            <div class="login-wraper clearfix">
               <div class="col-sm-12 signup-padding">
               
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php 
                                 echo $this->Form->input('company_name', array(
                                    'placeholder' => 'Company Name', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                             
                              <?php 
                                 echo $this->Form->input('street_address', array(
                                    'placeholder' => 'Street Address', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>
                         <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              
                              <?php 
                                 echo $this->Form->input('city', array(
                                    'placeholder' => 'City', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>

                         <div class="form-group clearfix">
                           <div class="col-sm-6 padding-left">
                              
                              <?php 
                                 echo $this->Form->input('pincode', array(
                                    'placeholder' => 'Pincode', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                           <div class="col-sm-6 padding-right">
                              
                              <?php
                             
                                 echo $this->Form->input('country_id', array(
                                     'options' => $countries,
                                     'empty' => 'Select a Country',
                                     'class' => 'form-control', 
                                     'div' => false, 
                                     'label' => false
                                 ));
                              ?>
                           </div>
                        </div>

                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r text-center">
                              <!-- <a href="equipment.html" class="btn btn-blue-login">Continue</a> -->
                              <?php echo $this->Form->submit('CONTINUE',array('class' => 'btn btn-blue-login')); ?>
                           </div>
                        </div>
                
                      <!-- Shipping customer Signup End here -->


               </div>
            </div>
            <?php echo $this->Form->end(); ?>
         </div>

<div style="display: none;" class="col-sm-10 col-lg-6 col-sm-offset-1 col-lg-offset-3 tell-us2 login-top-margin">
                  <div class="text-center top-small-heading">Hi, <?php echo $this->Session->read('Form.f1.UserDetail.f_name'); ?>, just a few more things...</div>
                  <h3 class="text-center">
                     What equipment will you use?
                  </h3>
                  <div class="login-wraper clearfix">
            <?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'id' => 'carrier_form3')); ?>
                     <div class="col-sm-12 signup-padding">
                        <div class="list-group">
                           <a href="javascript:void();" class="list-group-item ">
                              <div class="checkbox">
                                 <label>
                                    <input class="main-checkbox" type="checkbox" value="">
                                    <strong>All Equipment Types</strong>
                                 </label>
                              </div>
                           </a>
                        </div>
                        <div class="list-group  mailbox-messages">
                     <?php foreach($equipments as $key=>$equipment) {?>
                      <a href="javascript:void();" class="list-group-item ">
                      <div class="checkbox">
                      <label>
                              <?php
                                    echo $this->Form->input(
                                        'equip_id.', 
                                        array(
                                            'hiddenField' => false,
                                            'type' => 'checkbox', 
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'row-checkbox',
                                            'value' => $key
                                        ));
                                    echo $equipment;
                              ?>
                        </label>
                        </div>
                        </a>
                     <?php } ?>

                        </div>
                         <div class="errorTxt error"></div>
                        <div class="col-sm-12 padding-l-r text-center">
                           <!-- <a href="all-categories.html" class="btn btn-blue-login">Continue</a> -->
                           <?php echo $this->Form->submit('CONTINUE',array('class' => 'btn btn-blue-login')); ?>
                        </div>
                     </div>
               <?php echo $this->Form->end(); ?>
                  </div>
            </div>
<div style="display: none;" class="col-sm-10 col-lg-6 col-sm-offset-1 col-lg-offset-3 tell-us3 login-top-margin">
                  <h3 class="text-center">
                     What will you be transporting?
                  </h3>
                  <div class="login-wraper clearfix">
                    <?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'id' => 'carrier_form4')); ?>
                     <div class="col-sm-12 signup-padding">
                        <div class="list-group">
                           <?php foreach($transports as $key=>$transport) {?>
                      <a href="javascript:void();" class="list-group-item ">
                      <div class="checkbox">
                      <label>
                              <?php
                                    echo $this->Form->input(
                                        'transport_id.', 
                                        array(
                                            'hiddenField' => false,
                                            'type' => 'checkbox', 
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'row-checkbox1',
                                            'value' => $key
                                        ));
                                    echo $transport;
                              ?>
                        </label>
                        </div>
                        </a>
                     <?php } ?>
                        </div>
                        <div class="errorTxt error"></div>
                        <div class="col-sm-12 padding-l-r text-center">
                           <!-- <a href="accountinfo.html" class="btn btn-blue-login">Continue</a> -->
                           <?php echo $this->Form->submit('CONTINUE',array('class' => 'btn btn-blue-login')); ?>
                        </div>
                     </div>
                      
                 <?php echo $this->Form->end(); ?>
                  </div>
            </div>
<div style="display: none;" class="col-sm-10 col-lg-6 col-sm-offset-1 col-lg-offset-3 tell-us4 login-top-margin">
               <?php echo $this->Form->create('User', array('novalidate' => true, 'id' => 'carrier_form5')); ?>
                  <h3 class="text-center">
                     Account Information
                  </h3>
                  <div class="login-wraper clearfix">
                     <div class="col-sm-12 signup-padding">
                       
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r">
                              <?php 
                                 echo $this->Form->input('password', array(
                                    'type' => 'password', 
                                    'placeholder' => 'Create a Password', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                           </div>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 padding-l-r text-center">
                              <?php echo $this->Form->submit('Join',array('class' => 'btn btn-blue-login')); ?>
                           </div>
                        </div>
                     </div>
                  </div>
                   <?php echo $this->Form->end(); ?>
            </div>
<?php echo $this->Html->script('frontend/signup'); ?>