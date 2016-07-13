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
            <h5>Update Street Addresses:-</h5>
              <div class="form-group">
                <div class="col-sm-8">
                  <label></label>
                  <?php 
                    echo $this->Form->input('street_address', array(
                                    'div' => false, 
                                    'label' => 'Address 1', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['street_address']
                                    ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-8">
                  <?php 
                    echo $this->Form->input('address2', array(
                                    'div' => false, 
                                    'label' => 'Address 2', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['address2']
                                    ));
                  ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <?php 
                    echo $this->Form->input('city', array(
                                    'div' => false, 
                                    'label' => 'City', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['city']
                                    ));
                  ?>
                </div>
                <div class="col-sm-4">
                  <?php
                             
                    echo $this->Form->input('country_id', array(
                                     'options' => $countries,
                                     'empty' => 'Select a Country',
                                     'class' => 'form-control', 
                                     'div' => false, 
                                     'label' => 'Country',
                                     'default' => $userdetailData['UserDetail']['country_id']
                                 ));
                    ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4">
                  <?php 
                    echo $this->Form->input('pincode', array(
                                    'div' => false, 
                                    'label' => 'Postcode', 
                                    'class' => 'form-control',
                                    'default' => $userdetailData['UserDetail']['pincode']
                                    ));
                  ?>
                </div>
              </div>
            </div>
          </div>
            <?php
                      echo $this->Form->button('Save', array('type' => 'submit','class'=>'btn btn-primary'));
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