<?php  //print_r($shiplist); exit; ?>
<div class="admins index">
<?php echo $this->Form->create("Admin",array("div"=>false)); ?>
	<?php echo $this->element("admins/common",array("place"=>'Searchusername,domain',"flag"=>false,"pageheader"=>'Admins',"buttontitle"=>'Add User',"listflag"=>true,"action"=>'add')); ?>
	
	
	<table id="shiplist" cellpadding="0" cellspacing="0">
	
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php //echo $this->Paginator->sort('id');?>Sr No</th>
			<th><?php echo $this->Paginator->sort('itmename',"Item");?></th>
			<th><?php echo $this->Paginator->sort('no_of_items',"Number Of Items");?></th>
			<th><?php echo $this->Paginator->sort('price',"Item  Price");?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	$loggedUser = $this->Session->read("admin");
	foreach ($shiplist as $shiplist): 
		$class = null;
		
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $this->Form->input("id.".$shiplist['Shipment']['id'],array("class"=>'chk',"value"=>$shiplist['Shipment']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$shiplist['Shipment']['id'],array("type"=>'hidden',"value"=>($shiplist['Shipment']['status'] == 1?0:1))); ?></td>
				<td><?php echo h(empty($shiplist['Shipment']['id'])?'':$i); ?>&nbsp;</td>
				<td><?php echo h($shiplist['Shipment']['brief_description']); ?>&nbsp;</td>
				<td><?php echo ($shiplist['Shipment']['no_of_items']); ?>&nbsp;</td>
				<td><?php echo ($shiplist['Shipment']['price']); ?>&nbsp;</td>
				<td><?php echo ($shiplist['Shipment']['status']==1?'Active':'Inactive'); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'editShipment', $shiplist['Shipment']['id'])); ?>
					<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $shiplist['Shipment']['id']), null, __('Are you sure you want to delete user ?', $shiplist['Shipment']['id'])); ?>
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


