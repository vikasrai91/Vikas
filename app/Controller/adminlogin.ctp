<div class="col-sm-8 col-lg-6 col-sm-offset-2 col-lg-offset-3 login-top-margin">
            <h3 class="text-center">Log In</h3>
            <div class="login-wraper">
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                    <title> Ship The Stuff </title>

                  </div>
               </div>
               <?php echo $this->Form->create('Admin', array('url'=>array('controller'=>'admin','action'=>'adminlogin'),'novalidate' => true)); ?>
               <div class="form-group clearfix">
                  <div class="col-sm-12">
                     <?php 
                                 echo $this->Form->input('name', array(
                                    'placeholder' => 'User Name', 
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
                                    'placeholder' => 'Password', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                     ?>
                  </div>
               </div>
               <!--<div class="form-group clearfix">
                  <div class="col-sm-12">
                     <div class="works-in-ie-login">
                        <div class="checkbox">
                           <label>
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
               </div>-->
               <div class="form-group clearfix">
                  <div class="col-sm-12 text-center">
                     <!-- <button class="btn btn-blue-login">Log In</button> -->
                     <?php echo $this->Form->submit('Log In',array('class' => 'btn btn-blue-login')); ?>
                  </div>
               </div>
               <?php echo $this->Form->end(); ?>            
            </div>
         </div>
<?php 
echo $this->Html->script('frontend/adminlogin');
?>
