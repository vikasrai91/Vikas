<style> #accordion ul { display: block !important;} </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".unlinkit").click(function(e){
			alert("The page is under Construction!");
			e.preventDefault();
		});
	});
</script>
<div id="adminMenu" class="ddsmoothmenu actions">
	<a class="side-bar" onclick="hidepanel();" id="btn" href="javascript:void(0);" title="Click to hide panel" >Click to hide panel</a>
	<ul>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Dashboard</a></li>
		</ul>
		<ul class="sublist-menu <?php echo ((($this->params['controller']=='admins' && ($this->params['action'] =='dashboard' ||  $this->params['action'] =='newsletter' ||  $this->params['action'] =='changepassword' ||  $this->params['action'] =='configurations' ||  $this->params['action'] =='editprofile'))  || $this->params['controller']=='backupdbs')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link("Change Password","/admin/changepassword"); ?></li>
			<!--<li><?php echo $this->Html->link("Database Backups","/admin/backupdbs"); ?></li>-->
			<li><?php //echo $this->Html->link("Configuration","/admin/configurations"); ?></li>
			<li><?php //echo $this->Html->link("Newsletter","/admin/newsletter"); ?></li>
			<li><?php //echo $this->Html->link("Transactions","/admin/orders"); ?></li>
		</ul>
		<?php $admin = $this->Session->read("admin");?>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Users</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='users')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Users', true), '/admins/user');?></li>
			<li><?php //echo $this->Html->link(__('Add User', true), '/admin/users/addstaffmember');?></li>
			<li><?php //echo $this->Html->link(__('Requested Users', true), '/admin/users/requestedUser'); ?></li> 
			<li><?php //echo $this->Html->link(__('Approval Request', true), '/admin/approval_request'); ?></li> 
			<li><?php //echo $this->Html->link(__('Banner images', true), '/admin/users/bannerImage'); ?></li>
		</ul>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Shipments</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='orders' && $this->params['action'] !='admin_payments' && $this->params['action'] !='admin_transaction' && $this->params['action'] !='admin_transactionlab' && $this->params['action']!='admin_mark_paid'  && $this->params['action']!='admin_view')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Users', true), '/admins/ship');?></li>
			<li><?php //echo $this->Html->link(__('Doctors not paid payment', true), '/admin/orders/');?></li>
			<li><?php //echo $this->Html->link(__('Lab waiting for payment', true), '/admin/orders/');?></li>

		</ul>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins"> List </a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='orders' && ($this->params['action']=='admin_payments' || $this->params['action']=='admin_mark_paid' || $this->params['action']=='admin_transaction' || $this->params['action']=='admin_transactionlab' || $this->params['action']=='admin_view') )?'hide1':'hide'); ?>">
			<li><?php //echo $this->Html->link(__('Payments to Labs', true), '/admin/orders/payments/2');?></li>
			<li><?php //echo $this->Html->link(__('Payments from Doctors', true), '/admin/orders/payments/1');?></li>
		</ul>
		<!--<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Services</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='services')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Manage services', true), '/admin/services/index');?></li>
		</ul>	
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Email Templates</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='cmsemails')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Email Templates', true), '/admin/cmsemails/index');?></li>
		</ul>	
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Static Pages</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='cmspages')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Static Pages', true), '/admin/cmspages/index');?></li>
		</ul>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">Country Management</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='countries')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('Countries', true), '/admin/countries/index');?></li>
		</ul>
		<ul class="admintoggel">
			<li><a href="javascript:void(0);" class="Admins">State Management</a></li>
		</ul>
		<ul class="sublist-menu <?php echo (($this->params['controller']=='states')?'hide1':'hide'); ?>">
			<li><?php echo $this->Html->link(__('States', true), '/admin/states/index');?></li>
		</ul>-->
		<br style="clear: left" />
	</ul>
</div>
