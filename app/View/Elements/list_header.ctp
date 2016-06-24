<header class="header">
			<div class="container">
				<nav class="navbar navbar-default navbar-custom">
					<div class="navbar-header">
						<!-- <a class="navbar-brand" href="#">
							<img class="logo img-responsive" src="img/logo.png" alt="logo">
						</a> -->
						<?php echo $this->Html->link(
				            $this->Html->image('logo.png', array('alt' => 'Shipthestuff')),
				               '/',
				               array('target' => '_self', 'escape' => false, 'class' => 'navbar-brand')
				            );
				         ?>
					</div>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- <img src="img/user-image.png" class="user-image" alt="User Image"> -->
									<?php 
						               echo $this->Html->image('user-image.png', array('alt' => 'User Image', 'class' => 'user-image '));
						               ?>
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
										<!-- <a href="#">Logout</a> -->
										<?php
									        echo $this->Html->link(
									                'Logout',
									                '/users/logout',
									                array('target' => '_self')
									               );
									      ?>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>