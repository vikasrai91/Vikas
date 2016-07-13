<header class="header">
			<div class="container">
				<nav class="navbar navbar-default navbar-custom">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">
						<?php 
                                    echo $this->Html->image('logo.png', array('alt' => 'logo', 'class' => 'img-responsive logo'));
                        ?>
							<!-- <img class="logo img-responsive" src="img/logo.png" alt="logo"> -->
						</a>
					</div>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php 
                                    	echo $this->Html->image('user-image.png', array('alt' => 'logo', 'class' => 'user-image'));
                        			?>
									<!-- <img src="img/user-image.png" class="user-image" alt="User Image"> -->
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
							</li>
						</ul>
					</div>
				</nav>
			</div>
</header>