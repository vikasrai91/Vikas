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
         <div class="col-sm-12 my-account-settings">
               <div class="panel panel-info">
                  <div class="panel-heading">Account Information</div>
                  <div class="panel-body">
                     <ul>        
                        <li>
                          
                          <?php
                           echo $this->Html->link(
                                 'Update Email Addresses',
                                 '/update-email',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>
                          <?php
                           echo $this->Html->link(
                                 'Update Street Addresses',
                                 '/update-address',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>
                          <?php
                           echo $this->Html->link(
                                 'Update Phone Numbers',
                                 '/update-phone',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>

                          <?php
                           echo $this->Html->link(
                                 'Change Password',
                                 '/change-password',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                    </ul>
                  </div>
               </div>

               <div class="panel panel-info">
                  <div class="panel-heading">Billing &amp; Payments</div>
                  <div class="panel-body">
                     <ul>        
                        <li>
                          <a href="profile_email">View Account Summary</a>
                        </li>
                        <li>
                          <a href="profile_addresses">Update Payment Methods</a>
                        </li>
                    </ul>
                  </div>
               </div>

               <div class="panel panel-info">
                  <div class="panel-heading">Account Settings</div>
                  <div class="panel-body">
                     <ul>        
                        <li>
                          <?php
                           echo $this->Html->link(
                                 'Regional Settings',
                                 '/regional-setting',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>
                          <?php
                           echo $this->Html->link(
                                 'Edit Profile',
                                 '/edit-profile',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>
                          <a href="profile_addresses">Update Communication Preferences</a>
                        </li>
                        <li>
                          <a href="profile_addresses">Manage Linked Applications</a>
                        </li>
                        <li>
                          <a href="profile_addresses">Close Account</a>
                        </li>
                    </ul>
                  </div>
               </div>
      </div>
</div>
<style type="text/css">
  body{
    background: #fff;
  }
</style>