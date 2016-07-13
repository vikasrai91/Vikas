<div class="container page-bottom-margin">
         <div class="col-sm-12">
            <div class="header-page-top clearfix">
               <div class=" col-sm-8">
                  <h3>
                     <div class="dashboard-heading">
                        <span><?php echo __('Complete Profile'); ?></span>
                     </div>
                  </h3>
               </div>
            </div>
         </div>
         <div class="col-sm-12">

            <?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'class' => 'form-horizontal complete-profile', 'type' => 'file')); ?>

               <div class="panel panel-info">
                  <div class="panel-heading">Account Type</div>
                  <div class="panel-body">
                     <div class="works-in-ie-myaccount row">
                         <div class="col-sm-8">
                             <label class="radio-inline">
                             <input type="radio" name="data[User][account_type]" value="1" <?php echo ($this->Session->read('Auth.User.account_type') == 1) ? 'checked' : ''; ?>>
                             <i class="fa-radio fa-checked  checked"></i>
                             <i class="fa-radio fa-unchecked unchecked"></i>
                             Personal
                             </label>
                             <label class="radio-inline">
                             <input type="radio" name="data[User][account_type]" value="2" <?php echo ($this->Session->read('Auth.User.account_type') == 2) ? 'checked' : ''; ?>>
                             <i class="fa-radio fa-checked  checked"></i>
                             <i class="fa-radio fa-unchecked unchecked"></i>
                             Business
                             </label>
                         </div>
                     </div>
                  </div>
               </div>

               <div class="panel panel-info">
                  <div class="panel-heading">Tell us more about yourself</div>
                  <div class="panel-body">
                     <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                     </p>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Profile description:</label>
                        <div class="col-sm-8">
                           <?php
                                        echo $this->Form->textarea(
                                            'profile_description',
                                            array('rows' => '6', 'label' => 'Profile description:', 
                                              'class'=>'form-control',
                                              'value' => $userdetailData['UserDetail']['profile_description'])
                                        );
                            ?>

                           <div class="help-block">
                              <span class="fa fa-info-circle fa-fw text-info"></span>
                              <span class="text-info">Do not include contact info here.</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="panel panel-info">
                  <div class="panel-heading">Upload some pictures</div>
                  <div class="panel-body">
                     <p>
                        Customers with pictures are 38% more likely to be bid on, so include photos of yourself in your profile. 
                        <strong>Your pictures cannot contain direct contact information.</strong>
                     </p>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Upload Pictures:</label>
                        <div class="col-sm-8">

                           <?php
                             
                              echo $this->Form->input('profile_picture', array(
                                               'class' => 'form-control', 
                                               'div' => false, 
                                               'label' => false,
                                               'type' => 'file'

                                           ));
                              ?>
                        </div>
                     </div>
                  </div>
               </div>

              
            <?php
                      echo $this->Form->button('Save Your Profile', array('type' => 'submit','class'=>'btn btn-primary'));
            ?>
          <?php echo $this->Form->end(); ?>
         </div>
      </div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>