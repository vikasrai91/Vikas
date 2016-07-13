<div class="container page-bottom-margin">
        <div class="col-sm-12">
          <div class="header-page-top clearfix">
            <div class=" col-sm-8">
              <h3>
                <div class="dashboard-heading">
                  <span>My Account</span>
                </div>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
      <?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'class' => 'form-horizontal complete-profile')); ?>
          <form class="form-horizontal complete-profile">
            <div class="panel panel-info">
              <div class="panel-heading">Account Information</div>
              <div class="panel-body">
              <h5>Update Email Addresses:-</h5>
                <div class="col-sm-5">
                <div class="form-group">
                  <label>Primary Email Address</label><br>
                  <!-- <input type="email" class="form-control"  placeholder="rajinder@yopmail.com"> -->
                  <?php echo $this->Session->read('Auth.User.email'); ?>
                </div>
                <div class="form-group">
                  <label>Alternate Email Address</label>
                  <?php 
                    echo $this->Form->input('alt_email', array(
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['alt_email']
                                    ));
                  ?>
                </div>
                </div>
              </div>
            </div>
            <?php
                      echo $this->Form->button('Update Your Email Addresses', array('type' => 'submit','class'=>'btn btn-primary'));
            ?>
            <?php 
                      echo $this->Form->button('Cancel', array('onclick' => 'window.history.back();', 'class'=>'btn btn-default'));
             ?>
            <?php echo $this->Form->end(); ?>
            
        
             
          </form>
      
        </div>
      </div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>