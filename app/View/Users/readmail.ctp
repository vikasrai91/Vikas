<div class="container page-bottom-margin">
         <div class="col-sm-12">
            <div class="header-page-top clearfix">
               <div class=" col-sm-8">
                  <h3>
                     <div class="dashboard-heading">
                        <span>Read Mail</span>
                     </div>
                  </h3>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <!--      <h3 class="box-title">Read Mail</h3> -->
               </div>
               <!-- /.box-header -->
               <?php foreach ($messagedetails as  $value) {
                
              ?>
               <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                     <h3><?php echo $value['Message']['subject']; ?></h3>
                     <h5>
                    From: <?php  echo $useremaildetails['User']['email'];
                       ?> <span class="mailbox-read-time pull-right"><?php echo $value['Message']['created_on']; ?></span></h5>
                  </div>
                  <!-- /.mailbox-read-info -->
                  <div class="mailbox-read-message">
                     <?php echo $value['Message']['message']; ?>
                  </div>
                  <!-- /.mailbox-read-message -->
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                  <div class="pull-right">
                     <i class="reply">
                        <?php
                        if($value['Message']['reply_id']!='1'){
                           echo $this->Html->link(
                              'Reply',
                              '/users/replyCompose/'.base64_encode($value['Message']['id']),
                                 array('class' => 'btn btn-default fa fa-reply', 'target' => '_self')
                              );
                        }
                    ?>

                     </i> 
                  </div>
               </div>
               <?php  } ?>
               <!-- /.box-footer -->
            </div>
            <!-- /. box -->
         </div>
      </div>
      <style type="text/css">
  body{
    background: #fff;
  }
</style>