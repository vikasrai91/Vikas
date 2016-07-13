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

          <div class="panel panel-info">
            <div class="panel-heading">Account Information</div>
            <div class="panel-body">
            <h5>Update Phone Numbers:-</h5>
              <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('phone_number', array(
                                    'div' => false, 
                                    'label' => 'Primary Phone Number', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['phone_number']
                                    ));
                  ?>
                </div>
              </div>
               <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('secondary_mobile', array(
                                    'div' => false, 
                                    'label' => 'Secondary Phone Number', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['secondary_mobile']
                                    ));
                  ?>
                </div>
              </div>
                  <div class="form-group">
                <div class="col-sm-5">
                  <?php 
                    echo $this->Form->input('fax', array(
                                    'div' => false, 
                                    'label' => 'Fax', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['fax']
                                    ));
                  ?>
                </div>
              </div>
            </div>
          </div>
        <?php
                      echo $this->Form->button('Update Phone Numbers', array('type' => 'submit','class'=>'btn btn-primary'));
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