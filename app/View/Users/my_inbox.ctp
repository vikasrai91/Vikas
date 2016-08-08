     <div class="container page-bottom-margin">
         <div class="col-sm-12">
            <div class="header-page-top clearfix">
               <div class=" col-sm-8">
                  <h3>
                  <div class="dashboard-heading">
                     <span>Inbox</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <!--    <div class="col-sm-1"><h3 class="box-title">Inbox</h3></div> -->
                  <div class="col-sm-3 col-xs-3 compose-messgae">
                 <!--  <?php
                           echo $this->Html->link(
                                 'Compose',
                                 '/users/myCompose',
                                 array('class' => 'btn btn-primary', 'target' => '_self')
                              );
                    ?> -->
                     <!--<a href="compose-message.html" class="">Compose</a>-->
                  </div>
                  <div class="col-sm-8 pull-right text-right search">
                     <div class="box-tools pull-right">
                        <div class="input-group">
                           <input name="search" class="form-control" placeholder="Search Mail" value="" type="text" id="UserSearch">
                           <div class="input-group-btn">
                              <button class="btn btn-default message-search-button" type="submit"><i class="fa fa-search"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.box-header -->
               <div class="box-body no-padding col-sm-12">
                  <div class="table-responsive mailbox-messages">
                     <table class="table table-hover ">
                        <tbody>
                         <?php foreach ($inboxdetails as $rowinbox) {
                          // print_r($rowinbox);
                          // exit;

                        ?> 
                           <tr class="unread-message">
                              <td class="mailbox-name ">
                               <?php

                           echo $this->Html->link(
                                 $rowinbox['UserDetail']['f_name'].' '. $rowinbox['UserDetail']['l_name'],
                                 '/users/readmail/'.base64_encode($rowinbox['Message']['id']),
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                              </td>
                              <td class="mailbox-subject">
                              <?php if($rowinbox['Message']['status']!='1'){   ?>

                              <b><!-- AdminLTE 2.0 Issue --><?php echo $rowinbox['Message']['subject'] ?></b>
                              <?php }else{

                               echo $rowinbox['Message']['subject'];
                              } ?>


                              </td>
                              <td class="mailbox-date"><?php echo $rowinbox['Message']['created_on'] ?></td>
                           </tr>

                           <?php } ?>
                          <!--  <tr>
                              <td class="mailbox-name"><?php
                           echo $this->Html->link(
                                 'Alexander Pierce',
                                 '/users/readmail',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                           <tr>
                              <td class="mailbox-name"><?php
                           echo $this->Html->link(
                                 'Alexander Pierce',
                                 '/users/readmail',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                           <tr>
                              <td class="mailbox-name"><?php
                           echo $this->Html->link(
                                 'Alexander Pierce',
                                 '/users/readmail',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                           <tr>
                              <td class="mailbox-name"><?php
                           echo $this->Html->link(
                                 'Alexander Pierce',
                                 '/users/readmail',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                           <tr>
                              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                           <tr>
                              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                             <tr>
                              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                             <tr>
                              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr>
                             <tr>
                              <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                              <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...</td>
                              <td class="mailbox-date">5 mins ago</td>
                           </tr> -->
                        </tbody>
                     </table>
                  </div>
               </div>
                 <div class="col-sm-12 clearfix">
               <div class="box-footer no-padding clearfix ">
                
                     <div class="mailbox-controls">
                        <div class="pull-right">
                           1-50/200
                           <div class="btn-group">
                              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                              <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <style type="text/css">
  body{
    background: #fff;
  }
</style>