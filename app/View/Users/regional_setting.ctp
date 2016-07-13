
<?php
foreach($currency as $cDate){
  $selectCurrency[$cDate['Currency']['id']] = $cDate['Currency']['name'] .' - '. $cDate['Currency']['iso'];
}

?> 


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
         <?php echo $this->Form->create('UserDetail', array('novalidate' => true, 'class' => 'form-horizontal complete-profile')); ?>
          <div class="panel panel-info">
            <div class="panel-heading"><?php echo __('Account Settings'); ?></div>



            <div class="panel-body">
            <h5><?php echo __('Regional Settings:-'); ?></h5>

            <p>
            <?php echo __('Update these regional settings to change the way that dates, bid amounts, and units of measurement are displayed to you on SHIPTHESTUFF. Whatever you choose for your currency will be the currency we use for your SHIPTHESTUFF transactions.'); ?>
            </p>
              <div class="form-group">
                <div class="col-sm-5">
                   <?php
                             
                    echo $this->Form->input('country_id', array(
                                     'options' => $countries,
                                     'empty' => 'Select a Region',
                                     'class' => 'form-control', 
                                     'div' => false, 
                                     'label' => 'My Region',
                                     'default' => $userdetailData['UserDetail']['country_id']
                                 ));
                    ?>

                  <div class="help-block">
                     <small>(Date – 19/03/2009)</small>
                   </div>
                </div>
              </div>
                <div class="form-group">
                <div class="col-sm-5">
                 <?php
                             
                    echo $this->Form->input('currency_id', array(
                                     'options' => $selectCurrency,
                                     'empty' => 'Select a Region',
                                     'class' => 'form-control', 
                                     'div' => false, 
                                     'label' => 'My Currency',
                                     'default' => $userdetailData['UserDetail']['currency_id']
                                 ));
                    ?>

                  <div class="help-block">
                     <small>$12,345.00</small>
                   </div>
                </div>
              </div>
                  <div class="form-group">
                <div class="col-sm-5">
                  <?php
                             
                    echo $this->Form->input('timezone_id', array(
                                     'options' => $timezone,
                                     'empty' => 'Select a Region',
                                     'class' => 'form-control', 
                                     'div' => false, 
                                     'label' => 'My time zone',
                                     'default' => $userdetailData['UserDetail']['timezone_id']
                                 ));
                    ?>

                  <div class="help-block">
                     <small>Current time: 21:06</small>
                   </div>
                </div>
              </div>
            </div>
          </div>

        <?php
                      echo $this->Form->button('Update Site Settings', array('type' => 'submit','class'=>'btn btn-primary'));
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