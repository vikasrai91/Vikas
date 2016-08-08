<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		<?php echo $title_for_layout ?>
	</title>
	<!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Font-->
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap.min', 'font-awesome', 'sticky-footer', 'custom', 'custom-switch', 'custom-checkbox', 'custom-font'));
	if($this->params['controller'] == 'users'){
		echo $this->Html->css(array('login', 'custom-checkbox-login', 'custom-font-login', 'style2'));
		}
	elseif($this->params['controller'] == 'ships'){
		echo $this->Html->css(array('bootstrap-datepicker', 'style2'));
	}
	?>
	<?php echo $this->Html->script(array('jQuery-2.1.4.min', 'bootstrap.min', 'jquery.validate.min', 'bootstrap-datepicker')); 
		echo $this->Html->script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places');
	?>
</head>
<body>
	 <?php 
		echo $this->element("header");
		if($this->Session->read('Auth.User') != ''){
			echo $this->element("list_header");
		}
	 ?>
     <div class="wrapper">
      <div class="container">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element("footer"); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
