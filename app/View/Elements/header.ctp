<!-- Header section start here -->
      <header class="header">
         <div class="container">
            <nav class="navbar navbar-default navbar-custom">
               <div class="navbar-header">
                   <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button> -->
            <!-- <img class="logo img-responsive" src="img/logo.png" alt="logo"> -->
         <?php echo $this->Html->link(
            $this->Html->image('logo.png', array('alt' => 'Shipthestuff', 'class' => 'logo img-responsive')),
               '/',
               array('target' => '_self', 'escape' => false, 'class' => 'navbar-brand')
            );
         ?>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav navbar-right">
                  <?php if($this->params['action'] == 'shipmentRequest'){ ?>
                        <li class="text-blue">
                             <?php
                                   echo $this->Html->link(
                                         'Help',
                                         '#',
                                         array('class' => 'button primary siteNav-button siteNav-item', 'target' => '_self')
                                      );
                                ?>
                           
                        </li>

                  <?php } else{ ?>
                  <li>
                          <?php
                                echo $this->Html->link(
                                      'New Delivery',
                                      '/ships/shipmentRequest',
                                      array('class' => 'button primary siteNav-button siteNav-item delivery-button', 'target' => '_self')
                                   );
                             ?>
                        
                  </li>
                 
          <?php if($this->Session->read('Auth.User') != ''){ ?>
                     <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php 
                  if($this->Session->read('Auth.User.facebook_id') != ''){
                    $profile_picture = 'https://graph.facebook.com/'.$this->Session->read('Auth.User.facebook_id').'/picture?type=large';
                  }
                  elseif($this->Session->read('Auth.User.UserDetail.profile_picture') != ''){
                    $profile_picture = $this->Session->read('Auth.User.UserDetail.profile_picture');
                  }
                  else{
                    $profile_picture = 'user-image.png';
                  }
                        echo $this->Html->image($profile_picture, array(
                          'alt' => 'logo', 
                          'class' => 'user-image img-circle',
                          'style' => 'height: 45px;width: 50px;'
                          ));
                  ?>

                  <span> <?php echo ($this->Session->read('Auth.User.UserDetail.f_name') != '') ? $this->Session->read('Auth.User.UserDetail.f_name').' '.$this->Session->read('Auth.User.UserDetail.l_name') : $this->Session->read('Auth.UserDetail.f_name').' '.$this->Session->read('Auth.UserDetail.l_name'); ?> <span class="caret"></span></span>
                </a>
                <ul aria-labelledby="drop3" class="dropdown-menu">
                  <li>
                    <?php
                           echo $this->Html->link(
                                 'My Account',
                                 '/users/myAccount',
                                 array('class' => 'button', 'target' => '_self')
                              );
                    ?>
                  </li>
                  <li>
              
                    <?php
                           echo $this->Html->link(
                                 'Settings',
                                 '/users/settings',
                                 array('class' => 'button', 'target' => '_self')
                              );
                    ?>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <?php
                           echo $this->Html->link(
                                 'Logout',
                                 '/users/logout',
                                 array('class' => 'button', 'target' => '_self')
                              );
                    ?>
                  </li>
                </ul>
              </li>
              <?php } else{ ?>
                  <li class="text-red">
                        <?php
                           echo $this->Html->link(
                                 'SignUp',
                                 '/users/signup',
                                 array('class' => 'button delivery-button', 'target' => '_self')
                              );
                        ?>
                        <!-- <a class="" href="#">SignUp</a> -->
                  </li>
                     <li class="text-blue">
         <?php
            echo $this->Html->link(
                  'Log In',
                  '/users/login',
                  array('class' => 'button delivery-button', 'target' => '_self')
               );
         ?>

                     </li>

                     <?php } } ?>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!-- Header section End here -->