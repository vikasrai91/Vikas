<div class="admins form">
<?php echo $this->element("admins/common",array("place"=>'Search by username,domain',"flag"=>false,"pageheader"=>'Admins',"buttontitle"=>'Add Admin',"listflag"=>false,"action"=>'add')); ?>
<?php echo $this->Form->create('Admin');?>
	<fieldset>
		<legend><?php echo __('Add Admin'); ?></legend>
	<?php
		echo $this->Form->input('username',array("maxlength"=>'200',"label"=>"Username/Email"));
		echo $this->Form->input('password',array("maxlength"=>'20'));
		echo $this->Form->input('confirm password',array('type'=>'password',"maxlength"=>'20'));
		echo $this->Form->input('status',array("type"=>"checkbox","label"=>'Active'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<!--div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('List Admins'), array('action' => 'index'));?></li>
		<li><?php //echo $this->Html->link(__('List Admindetails'), array('controller' => 'admindetails', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Admindetail'), array('controller' => 'admindetails', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div-->
