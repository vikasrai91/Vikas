<div class="container page-bottom-margin">
        <div class="col-sm-12">
          <div class="header-page-top clearfix">
            <div class=" col-sm-8">
              <h3>
                <div class="dashboard-heading">
                  <span>Reply Message</span>
                </div>
              </h3>
            </div>
          </div>
        </div>
         <div class="col-md-12">
              <div class="box box-primary">  
               <?php echo $this->Form->create('User', array('novalidate' => true, 'class' => 'new-message', 'type' => 'file','action' => 'addReplyCompose')); ?>
<?php foreach ($replydetails as $compose) { 

  } ?>



                
              <div class="form-group clearfix ">
                <!--  <label class="col-sm-1">To </label> -->
                 <div class="col-sm-6">

                  <?php echo $this->Form->input('Message.shipment_id', array(
                                             'type' => 'hidden',
                                             'div' => false,
                                             'value' => $compose['Message']['shipment_id']
                                 )); ?>

                  <?php 
                        echo $this->Form->input('Message.message_to', array(
                            'type' => 'hidden', 
                            'div' => false, 
                            'label' => false, 
                            'value' => $compose['Message']['message_from'],
                            'class' => 'form-control'));
                              ?>

                  <?php 
                        echo $this->Form->input('Message.message_from', array(
                            'type'=>'hidden',
                            'div' => false, 
                            'label' => false,
                            'value' => $compose['Message']['message_to'],
                            
                            'class' => 'form-control'));
                              ?>
                    <?php
                      $date=date("m/d/Y h:i:s");
                              echo $this->Form->input('Message.created_on', array(
                            'type' => 'hidden', 
                            'div' => false, 
                            'label' => false, 
                            'value' =>  $date,
                            'class' => 'form-control'));
                              ?>

                                  <?php 
                                 echo $this->Form->input('Message.subject', array(
                                   'type' => 'hidden', 
                                    'div' => false, 
                                    'label' => false, 
                                    'value' => $compose['Message']['subject'],
                                    'class' => 'form-control'));
                              ?>


                  </div>
              </div>
                  <!--  <div class="form-group clearfix ">
                 <label class="col-sm-1">Subject </label>
                 <div class="col-sm-6">
                 <?php 
                                 echo $this->Form->input('Message.subject', array(
                                    'placeholder' => 'Subject', 
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                  </div>
              </div> -->
              <div class="form-group clearfix ">
                 <label class="col-sm-1">Message </label>
                 <div class="col-sm-6">
                  <?php 
                                 echo $this->Form->input('Message.message', array(
                                    'placeholder' => 'Message', 
                                    'type' => 'textarea',
                                    'row'=>'6',
                                    'div' => false, 
                                    'label' => false, 
                                    'class' => 'form-control'));
                              ?>
                       <?php 
                        echo $this->Form->input('Message.reply_id', array(
                            'type' => 'hidden', 
                            'div' => false, 
                            'label' => false, 
                            'value' =>  '1',
                            'class' => 'form-control'));
                              ?>

                  <!--<textarea class="form-control" rows="6"></textarea>-->
                  </div>
              </div>       
                <div class="form-group clearfix">
                <div class="col-sm-8  col-sm-offset-1">
                   <button type="submit" class="btn btn-blue"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                  
                </div><!-- /.box-footer -->
                <?php //} ?>
               <?php echo $this->Form->end(); ?>
                    </div><!-- /.box-body -->           
            </div>
      </div>
       <style type="text/css">
  body{
    background: #fff;
  }
</style>