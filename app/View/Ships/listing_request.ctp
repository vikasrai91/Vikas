<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<!-- link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom-checkbox.css">
	<link rel="stylesheet" href="css/custom-font.css">
	<link rel="stylesheet" href="css/sticky-footer.css"> -->
	<!-- Font-->
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
	<!-- Ionicons -->
	<!--     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
	<!-- iCheck -->   
	<!-- Morris chart -->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
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
		</div>

		<div class="container page-bottom-margin thanku-message">
			<div class="col-sm-12">
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
					<form class="form-horizontal">
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
									<input type="text" class="form-control" placeholder="₹">
										</div>
								</div>
								<div class="text-center">
									<button class="btn btn-yellow">Submit My Offer</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	   <!-- Footer Start here -->
		<!-- <footer class="footer">
			<div class="container">
				<div class="col-sm-7">
					<ul class="footer-links list-unstyled">
					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Soultions</a></li>
					<li><a href="#">Contacts</a></li>
					<li><a href="#">Bookings</a></li>
					</ul>
				</div>
					<div class="col-sm-5 copright-text text-right">
						<p>Copyright @ 2015, SHIPTHESTUFF</p>
					</div>
			</div>
		</footer> -->

	<!-- jQuery 2.1.4 -->
</html>