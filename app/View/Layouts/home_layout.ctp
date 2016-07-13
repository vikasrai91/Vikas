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
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap.min', 'style', 'font-awesome', 'sticky-footer'));
	?>
	<?php echo $this->Html->script(array('jQuery-2.1.4.min', 'bootstrap.min')); ?>
</head>
<body>
	 <?php echo $this->element("home_header"); ?>

			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>

	<?php echo $this->element("home_footer"); ?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
