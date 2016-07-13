<div class="nav-full-width">
         <div class="container">
            <nav class="navbar navbar-inverse">
               <div class="container-fluid">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>                        
                     </button>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                     <ul class="nav navbar-nav">
                     
                        <li class="active">
                        <?php
                           echo $this->Html->link(
                                 'Dashboard',
                                 '/users/dashboard',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li>
                        <?php
                           echo $this->Html->link(
                                 'Inbox',
                                 '/users/myInbox',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>

                        </li>
                        <li>
                        <?php
                           echo $this->Html->link(
                                 'My Deliveries',
                                 '/users/myDeliveries',
                                 array('class' => 'button', 'target' => '_self')
                              );
                          ?>
                        </li>
                        <li><a href="#">Payments</a></li>
                        <li><a href="#">Invitation</a></li>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>