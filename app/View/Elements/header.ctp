<!-- Header section start here -->
      <header class="header">
         <div class="container">
            <nav class="navbar navbar-default navbar-custom">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">
            <!-- <img class="logo img-responsive" src="img/logo.png" alt="logo"> -->
         <?php echo $this->Html->link(
            $this->Html->image('logo.png', array('alt' => 'Shipthestuff')),
               '/',
               array('target' => '_self', 'escape' => false)
            );
         ?>
                  </a>
               </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                     <li class="text-red">
         <?php
            echo $this->Html->link(
                  'SignUp',
                  '/users/signup',
                  array('class' => 'button', 'target' => '_self')
               );
         ?>
                        <!-- <a class="" href="#">SignUp</a> -->
                     </li>
                     <li class="text-blue">
         <?php
            echo $this->Html->link(
                  'Log In',
                  '/users/login',
                  array('class' => 'button', 'target' => '_self')
               );
         ?>
                        <!-- <a href="#">Log In</a> -->
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!-- Header section End here -->