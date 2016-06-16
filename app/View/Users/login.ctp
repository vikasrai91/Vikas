<div class="col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-3 login-top-margin">
            <h3 class="text-center">Log In</h3>
            <div class="login-wraper">
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <button class="btn btn-fb btn-block"><i class="fa fa-facebook" aria-hidden="true"> </i> Sign in with Facebook</button>
                  </div>
               </div>
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <div class="border-top">
                        <div class="or-text">Or</div>
                     </div>
                  </div>
               </div>
               <?php echo $this->Form->create('User', array('novalidate' => true)); ?>
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <?php 
                                 echo $this->Form->input('username', array(
                                    'placeholder' => 'Email Address or Username', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                     ?>
                  </div>
               </div>
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <?php 
                                 echo $this->Form->input('password', array(
                                    'placeholder' => 'Shipthestuff Password', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                     ?>
                  </div>
               </div>
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <div class="works-in-ie-login">
                        <div class="checkbox">
                           <label>
                           <input type="checkbox" value="">
                           <?php 
               echo $this->Form->checkbox('remember_me', array('hiddenField' => false));
                           ?>
                           <i class="faa fa-unchecked unchecked"></i>
                           <i class="faa fa-checked  checked"></i>
                           </label>
                           <span>Keep me logged in</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group clearfix">
                  <div class="col-sm-12 text-center">
                     <!-- <button class="btn btn-blue-login">Log In</button> -->
                     <?php echo $this->Form->submit('Log In',array('class' => 'btn btn-blue-login')); ?>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>
               <div class="form-group clearfix">
                  <div class="col-sm-12 text-center ">
                     <p class="forget-pass text-blue"><a  data-target="#forget-password" data-toggle="modal" href="#">Forgot Password ?</a></p>
                  </div>
               </div>
               <div class="form-group clearfix dont-have">
                  <div class="col-sm-12 text-center ">
                     <p class="text-blue">Dont’t have account ?  
                     <?php
                           echo $this->Html->link(
                                 'JOIN SHIPTHESTUFF',
                                 '/users/signup',
                                 array('target' => '_self')
                              );
                        ?></p>
                  </div>
               </div>
               
            </div>
         </div>
<?php echo $this->Html->script('frontend/login'); ?>