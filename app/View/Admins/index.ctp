<div class="admins index">
<?php echo $this->Form->create("Admin",array("div"=>false)); ?>
	<?php echo $this->element("admins/common",array("place"=>'Search by username,domain',"flag"=>false,"pageheader"=>'Admins',"buttontitle"=>'Add Admin',"listflag"=>true,"action"=>'add')); ?>
	
	
	<table id="userlist" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php //echo $this->Paginator->sort('id');?>Sr No</th>
			<th><?php echo $this->Paginator->sort('username',"Username/Email");?></th>
			<th><?php echo $this->Paginator->sort('usertype',"User Type");?></th>
			<th><?php echo $this->Paginator->sort('acctype',"Account Type");?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	$loggedUser = $this->Session->read("admin");
	foreach ($userDashbord as $user): 
		$class = null;
		
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $this->Form->input("id.".$user['User']['id'],array("class"=>'chk',"value"=>$user['User']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$user['User']['id'],array("type"=>'hidden',"value"=>($user['User']['status'] == 1?0:1))); ?></td>
				<td><?php echo h(empty($user['User']['id'])?'':$i); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo ($user['User']['user_type']==1?'Shipping Customer':'Carrier'); ?>&nbsp;</td>
				<td><?php echo ($user['User']['account_type']==1?'Personal':'Business'); ?>&nbsp;</td>
				<td><?php echo ($user['User']['status']==1?'Active':'Inactive'); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
				</td>
			</tr>
<?php	
	endforeach; ?>
	</table>
	
	
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>-->
</div>

<?php echo $this->Form->end(); ?>

 <script src="code.jquery.com/jquery-1.12.3.js"></script>
  <script src="cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
   <script src="cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">


 <script type="text/javascript">
$(document).ready(function() {
    $('#userlist').DataTable();
} );
</script>
