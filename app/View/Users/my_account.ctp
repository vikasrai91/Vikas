
        <div class="container page-bottom-margin">
            <div class="col-sm-12">
                <div class="header-page-top clearfix">
                    <div class=" col-sm-8">
                        <h3><div class="dashboard-heading"><span>My Account</span></div></h3>
                    </div>
                    <div class="col-sm-4 text-right right-top-section padding-right"><button class="btn btn-blue" data-target="#change-password" data-toggle="modal">Change Password</button></div>
                </div>
            </div>
            <div class="col-sm-8">

            <?php echo $this->Form->create('User', array('novalidate' => true, 'class' => 'form-horizontal my-account', 'type' => 'file','action' => 'editMyAccount','userId' => $row_user['UserDetail']['id'])); ?>

                <form class="form-horizontal my-account">
               <?php foreach ($user_details as  $row_user) {
               //echo  $row_user['UserDetail']['id']
               ?> 

                  <?php echo $this->Form->input('userId', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => $row_user['UserDetail']['id']
                                 )); ?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            <?php 
                                    echo $this->Form->input('f_name', array(
                                                    'div' => false, 
                                                    'label' => false,
                                                    'value'=> $row_user['UserDetail']['f_name'], 
                                                    'class' => 'form-control',
                                                    'default' => ''
                                                    ));
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php 
                                    echo $this->Form->input('l_name', array(
                                                    'div' => false, 
                                                    'label' => false,
                                                    'value'=> $row_user['UserDetail']['l_name'],
                                                    'class' => 'form-control',
                                                    'default' => ''
                                                    ));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mobile Number </label>
                        <div class="col-sm-8">
                            <?php 
                                    echo $this->Form->input('phone_number', array(
                                                    'div' => false, 
                                                    'label' => false,
                                                    'value'=> $row_user['UserDetail']['phone_number'],
                                                    'class' => 'form-control',
                                                    'default' => ''
                                                    ));
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Profile Picture</label>
                        <div class="col-sm-1">
                        <?php echo $this->Form->input('profile_picture', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => $row_user['UserDetail']['profile_picture']
                                 )); ?>
                            <?php
                           //echo  $row_user['UserDetail']['profile_picture'];
                           echo $this->Html->image($row_user['UserDetail']['profile_picture'], array('alt' => 'Shipthestuff','name'=>'profile_picture', 'class' => 'logo img-responsive'))
                            ?>
                        </div>
                        <div class="col-sm-3 change-picture"><a data-target="#editProfilePictureModal" data-toggle="modal" href="#">Change Picture</a></div>
                    </div>
                    <div class="form-group">
                        <div class="works-in-ie-myaccount">
                            <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-8 col-sm-offset-1">
                                <label class="radio-inline">
                                <input type="radio" name="gender"  <?php if($row_user['UserDetail']['gender']==1){ ?>

                                checked="checked"  value="1" <?php } ?>>
                                <i class="fa-radio fa-checked  checked"></i>
                                <i class="fa-radio fa-unchecked unchecked"></i>
                                Male
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="gender"  <?php if($row_user['UserDetail']['gender']==2){ ?>checked="checked" value="2" <?php } ?>>
                                <i class="fa-radio fa-checked  checked"></i>
                                <i class="fa-radio fa-unchecked unchecked"></i>
                                Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Notification</label>
                        <div class="col-sm-8">
                            <ul class="switch-toggle">
                                <li>
                                    <p>By Email</p>
                                    <input id="test" name="notification_by_email" type="checkbox" hidden="hidden" <?php if($row_user['UserDetail']['notification_by_email']==1){ ?>checked="checked" value="1" <?php } ?>/>
                                    <label for="test" class="switch"></label>
                                </li>
                                <li>
                                    <p>By Sms</p>
                                    <input id="test1" name="notification_by_sms" type="checkbox" hidden="hidden" <?php if($row_user['UserDetail']['notification_by_sms']==1){ ?>checked="checked" value="1" <?php } ?>/>
                                    <label for="test1" class="switch"></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group delete-account">
                        <div class=" col-sm-offset-3 col-sm-8 text-red"><a href="#">Delete Account Permanently</a></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                                <?php 
                                          echo $this->Form->button('Cancel', array('onclick' => 'window.history.back();', 'class'=>'btn btn-default margin-right-btn'));
                                 ?>
                                 <?php
                                          echo $this->Form->button('Save Changes', array('type'=>'submit','class'=>'btn btn-blue'));
                                ?>
                        </div>
                    </div>
                    <?php } ?>
                </form>
                <?php echo $this->Form->end(); ?>
            </div>
                    <?php //echo $this->Html->script('frontend/editMyAccount'); ?>
        </div>

<style type="text/css">
  body{
    background: #fff;
  }
</style>