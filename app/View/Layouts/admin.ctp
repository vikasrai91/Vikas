<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php echo $this->Html->meta('favicon.ico','/favicon.ico',array('type' => 'icon')); ?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php 
		echo $this->Html->meta('icon');

		echo $this->Html->css('admin/admin');
		echo ((($this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_edit') && $this->params['controller'] == 'news')?$this->Html->css('admin/jquery.ui'):'');
		echo $this->Html->script('jquery.1.8.2'); 
		echo $this->Html->script('ckeditor/ckeditor'); 
		echo ((($this->params['action'] == 'admin_add' || $this->params['action'] == 'admin_edit') && $this->params['controller'] == 'news')?$this->Html->script('jquery.ui'):'');
		echo $scripts_for_layout;
	?>
	<script type="text/javascript">
		var SITE_LINK = "<?php echo SITE_LINK; ?>";
		var BASE_URL = "<?php echo SITE_LINK; ?>";
		var DEFAULT_LINK = "<?php echo $this->webroot; ?>";
</script>

</head>
<body>
		<?php 
		
		if($this->params['action'] != 'forgotpassword' && $this->params['action'] != 'login') { ?>
			<div id="header">
				<?php echo $this->element("adminheader"); ?>
			</div>
		<?php } ?>
		<div id="container">
			<div id="content">
				<?php 
				
				// -- to set the design on login page
				if($this->params['action']== 'forgotpassword' || $this->params['action'] == 'login') 
					$ContentId = ''; 
				  else
					$ContentId = 'content-for-layout'; 
				?>
				
				<?php 
				
				echo (empty($ContentId)?'':$this->element('adminleft')); ?>
				<div id="<?=$ContentId;?>">
				<?php //echo $this->element("admin_bread_crumb"); ?>
				<?php echo $content_for_layout; ?>
				</div>

			</div>
		</div>
		<div id="footer">
		<?php
			echo $this->Html->script('jquery.validate');
			echo $this->Html->script('validationmessages'); 
			echo $this->Html->script('common_functions'); 
			echo $this->Html->script('admin/validate'); 
			
		?>
		</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
