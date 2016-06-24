<header class="header">
         <div class="container">
            <nav class="navbar navbar-default navbar-custom">
               <div class="navbar-header">
                  <a class="navbar-brand" href="#">
                  <!-- <img class="logo img-responsive" src="img/logo.png" alt="logo"> -->
                  <?php echo $this->Html->link(
            $this->Html->image('logo.png', array('alt' => 'Shipthestuff')),
               '/',
               array('target' => '_self', 'escape' => false, 'class' => '')
            );
         ?>
                  </a>
               </div>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav navbar-right">

                    <!-- After Login Design Here -->

                     <!--  <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/user-image.png" class="user-image" alt="User Image">
                            <span> Rahul Roy <span class="caret"></span></span>
                        </a>
                        <ul aria-labelledby="drop3" class="dropdown-menu">
                            <li>
                                <a href="#"> My Account</a>
                            </li>
                            <li>
                                <a href="#">Settings</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Logout</a>
                            </li>
                        </ul>
                        </li>-->
                      <li class="text-blue">
                        <?php
                              echo $this->Html->link(
                                    'New Delivery',
                                    '/ships/shipmentRequest',
                                    array('class' => 'button', 'target' => '_self')
                                 );
                           ?>
                        
                     </li>
                     <li class="text-red">
                        <?php
                              echo $this->Html->link(
                                    'SignUp',
                                    '/users/signup',
                                    array('class' => 'button', 'target' => '_self')
                                 );
                           ?>
                        
                     </li>
                     <li class="text-blue">
                        <?php
                              echo $this->Html->link(
                                    'Log In',
                                    '/users/login',
                                    array('class' => 'button', 'target' => '_self')
                                 );
                           ?>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>

      <!-- Navigation Start Here-->    
      <div class="nav-full-width">
         <div class="container">
            <nav class="navbar navbar-inverse">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                  </button>
               </div>
               <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav">
                     <li class="">
                        <a href="#">Home</a>
                     </li>
                     <!-- <li>
                        <a href="#">Track</a>
                     </li> -->
                     <li>
                        <a href="#">Register</a>
                     </li>
                     <li>
                        <a href="#">About Us</a>
                     </li>
                     <li>
                        <a href="#">Our Services</a>
                     </li>
                     <li>
                        <a href="#">Contact</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!-- Navigation End Here--> 