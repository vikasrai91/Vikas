<!-- <div class="nav-full-width">
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
							<li class="active"><a href="#">Dashboard</a></li>
							<li><a href="#">Inbox</a></li>
							<li><a href="#">My Deliveries</a></li>
							<li><a href="#">Payments</a></li>
							<li><a href="#">Invitation</a></li>
						</ul>
					</div> 
					</div>
				</nav>
			</div>
		</div> -->

		<div class="container page-bottom-margin thanku-message">
			<div class="col-sm-12">
			<?php if($this->Session->read('Shipform.f1.Shipment.id') != '' ) {  } elseif($this->Session->read('Shipform') != ''){ ?>
				<div class="text-center top-header-thanks">
					<div class="text-blue">
						<h3>Thanks for your request!</h3>
					</div>
						<p>There are two easy ways to get quotes for your shipment.</p>

                        <?php
                           echo $this->Html->link(
                                 'Save Shipment',
                                 '/ships/listingRequest/save',
                                 array('class' => 'btn btn-blue', 'target' => '_self')
                              );
                        ?>
						<!-- <button class="btn btn-blue">Save Shipment</button> -->
						<h3 class="text-center">Not ready to book?</h3>
				</div>
			<?php } ?>
					
				<div class=" col-sm-10 col-sm-offset-1 thanku-box">
					<div class="col-sm-12 col-lg-6 box-padding">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Get Quotes Now!</h3>
								<p>Shippers bid to win your business</p>
							</div>
							<div class="panel-body">
								<div class="heading-big">CARRIERS WILL GET <br>
									BACK TO YOU SOON
								</div>
								<ul class="list-inline">
									<li>
										<span class="circle">1</span>  
										Receive quotes within hours or even minutes.
									</li>
									<li>
										<span class="circle">2</span>
										Compare quotes, delivery timeframes and customer reviews.
									</li>
									<li>
										<span class="circle">3</span> 
										Choose your winning quote at any time.
									</li>
								</ul>
									<div class="text-center">
										<button class="btn btn-yellow">Request Quotes</button>
									</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 box-padding">
						<?php echo $this->Form->create('Shipment', array('novalidate' => true, 'class' => 'form-horizontal')); ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Set Your Own Price</h3>
								<p>Make an offer to shippers with available space</p>
							</div>
							<div class="panel-body">
								<div class="heading-big">CARRIERS WILL GET <br>
									BACK TO YOU SOON
								</div>
								<div class="name-your-price clearfix">
								<div class="col-sm-5">
									<label class="control-label">NAME YOUR PRICE</label>
								</div>
									
										<div class="col-sm-5 padding-left">
									<?php 
									if(isset($this->params['pass'][0])){
									if($this->params['pass'][0] != ''){
										echo $this->Form->input('id', array(
	                                    'type' => 'hidden',
	                                    'div' => false, 
	                                    'label' => false,
	                                    'value' => base64_decode($this->params['pass'][0])
	                                    ));
									}}
	                                 echo $this->Form->input('status', array(
	                                    'type' => 'hidden',
	                                    'div' => false, 
	                                    'label' => false,
	                                    'value' => '1'
	                                    ));
                     				?>
									<?php 
									if(isset($this->params['pass'][1])) 
										{  $f_value = $this->params['pass'][1]; }else{ $f_value = ''; } 
	                                 echo $this->Form->input('price', array(
	                                    'placeholder' => '$', 
	                                    'type' => 'text',
	                                    'div' => false, 
	                                    'label' => false, 
	                                    'class' => 'form-control',
	                                    'default' => base64_decode($f_value)
	                                    ));
                     				?>
										</div>
								</div>
								<div class="text-center">
									<?php echo $this->Form->submit('Submit My Offer',array('class' => 'btn btn-yellow')); ?>
								</div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
<?php echo $this->Html->script('frontend/listing-request'); ?>