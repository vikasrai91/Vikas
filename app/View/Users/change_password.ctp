      <div class="container page-bottom-margin">
        <div class="col-sm-12">
          <div class="header-page-top clearfix">
            <div class=" col-sm-8">
              <h3>
                <div class="dashboard-heading">
                  <span><?php echo __('My Account'); ?></span>
                </div>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
        <?php echo $this->Form->create('User', array('novalidate' => true, 'class' => 'form-horizontal complete-profile')); ?>

          <div class="panel panel-info">
            <div class="panel-heading">Account Information</div>
            <div class="panel-body">
            <h5>Change Password:-</h5>
              <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('current_password', array(
                                    'div' => false, 
                                    'label' => 'Current Password', 
                                    'class' => 'form-control',
                                    'type' => 'password'
                                    ));
                  ?>
                </div>
              </div>
               <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('password', array(
                                    'div' => false, 
                                    'label' => 'New Password', 
                                    'class' => 'form-control',
                                    'type' => 'password'
                                    ));
                  ?>
                </div>
              </div>
                  <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('confirm_password', array(
                                    'div' => false, 
                                    'label' => 'Re-Enter New Password', 
                                    'class' => 'form-control',
                                    'type' => 'password'
                                    ));
                  ?>
                </div>
              </div>
            </div>
          </div>
            <?php
                      echo $this->Form->button('Update Password', array('type' => 'submit','class'=>'btn btn-primary'));
            ?>
            <?php 
                      echo $this->Form->button('Cancel', array('onclick' => 'window.history.back();', 'class'=>'btn btn-default'));
             ?>
          <?php echo $this->Form->end(); ?>
        </div>
      </div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>