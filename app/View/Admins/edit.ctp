<div class="admins form">
<?php echo $this->element("admins/common",array("place"=>'Search by username,domain',"flag"=>false,"pageheader"=>'Admins',"buttontitle"=>'Add Admin',"listflag"=>false,"action"=>'add')); ?>
<?php echo $this->Form->create('Admin');?>
	<fieldset>
		<legend><?php echo __('Edit Admin'); ?></legend>
	<?php
	 $modifiedon=date("Y-m-d h:i:s");
	/*$cid=array();
	$cname=array();	
	foreach ($allCountry as $allCountry)
	{
		array_push($cid,$allCountry['Country']['id']);
		array_push($cname,$allCountry['Country']['country_name']);
	}*/
	//print_r($cid);	
	//print_r($cname);
	//print_r($allCountry['Country']['id']); die;
		echo $this->Form->input('User.id');
		echo $this->Form->input('UserDetail.f_name',array("maxlength"=>'200',"label"=>"First Name"));
		echo $this->Form->input('UserDetail.l_name',array("maxlength"=>'200',"label"=>"Last Name"));
		echo $this->Form->input('User.email',array("maxlength"=>'200',"label"=>"User Email"));
		echo $this->Form->input('UserDetail.alt_email',array("maxlength"=>'200',"label"=>"Alternate Email"));
		echo $this->Form->input('UserDetail.company_name',array("maxlength"=>'200',"label"=>"Company Name"));
		echo $this->Form->input('UserDetail.phone_number',array("maxlength"=>'200',"label"=>"Phone Number"));
		echo $this->Form->input('UserDetail.secondary_mobile',array("maxlength"=>'200',"label"=>"Secondary Mobile"));
		echo $this->Form->input('UserDetail.fax',array("maxlength"=>'200',"label"=>"Fax"));
		echo $this->Form->input('UserDetail.street_address',array("maxlength"=>'200',"label"=>"Street Address"));
		echo $this->Form->input('UserDetail.address2',array("maxlength"=>'200',"label"=>" Address 2"));
		echo $this->Form->input('UserDetail.city',array("maxlength"=>'200',"label"=>"City "));
		echo $this->Form->input('UserDetail.pincode',array("maxlength"=>'200',"label"=>"Pincode"));
		?>
		<label for="UserCountry">Country</label>
			<select name="data[UserDetail][country_id]" id="UserCountry" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<?php
				foreach ($allCountry as $allCountry)
					{
					?>
					<option value="<?php echo $allCountry['Country']['id'];?>" <?php  if($allCountry['Country']['id']==$this->request->data['UserDetail']['country_id']) {echo 'selected="selected"';} ?>><?php echo $allCountry['Country']['country_name'];?></option>
					<?php
					}
					?>
			</select>
		<label for="UserEquip">Equip</label>
			<select name="data[UserDetail][equip_id]" id="UserEquip" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<?php
				foreach ($allEquip as $allEquip)
					{
					?>
					<option value="<?php echo $allEquip['Equip']['id'];?>" <?php  if($allEquip['Equip']['id']==$this->request->data['UserDetail']['equip_id']) {echo 'selected="selected"';} ?>><?php echo $allEquip['Equip']['name'];?></option>
					<?php
					}
					?>
			</select>
			<label for="UserTransport">Transport</label>
			<select name="data[UserDetail][transport_id]" id="UserTransport" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<?php
				foreach ($allTransport as $allTransport)
					{
					?>
					<option value="<?php echo $allTransport['Transport']['id'];?>" <?php  if($allTransport['Transport']['id']==$this->request->data['UserDetail']['transport_id']) {echo 'selected="selected"';} ?>><?php echo $allTransport['Transport']['name'];?></option>
					<?php
					}
					?>
			</select>
			<label for="UserCurrency">Currency</label>
			<select name="data[UserDetail][currency_id]" id="UserCurrency" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<?php
				foreach ($allCurrency as $allCurrency)
					{
					?>
					<option value="<?php echo $allCurrency['Currency']['id'];?>" <?php  if($allCurrency['Currency']['id']==$this->request->data['UserDetail']['currency_id']) {echo 'selected="selected"';} ?>><?php echo $allCurrency['Currency']['iso'];?></option>
					<?php
					}
					?>
			</select>
			<label for="UserTimezone">Timezone</label>
			<select name="data[UserDetail][timezone_id] id="UserTimezone" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<?php
				foreach ($allTimezone as $allTimezone)
					{
					?>
					<option value="<?php echo $allTimezone['Timezone']['id'];?>" <?php  if($allTimezone['Timezone']['id']==$this->request->data['UserDetail']['timezone_id']) {echo 'selected="selected"';} ?>><?php echo $allTimezone['Timezone']['zone'];?></option>
					<?php
					}
					?>
			</select>
			<label for="UserGender">Gender</label>
			<select  name="data[UserDetail][gender]" id="UserGender" style="maxlength='200';" >
				<option value="0">(choose one)</option>
				<option value="1" <?php  if($this->request->data['UserDetail']['gender']=="1") {echo 'selected="selected"';} ?>>Male</option>
				<option value="2" <?php  if($this->request->data['UserDetail']['gender']=="2") {echo 'selected="selected"';} ?>>Female</option>
			</select>
    <?php
		//echo $this->Form->input('field', array('options' => array($cname),'value' => UserDetail.country_id,'empty' => '(choose one)'));
		//echo $this->Form->input('UserDetail.country_id',array("maxlength"=>'200',"label"=>"Country"));
		//echo $this->Form->input('UserDetail.equip_id',array("maxlength"=>'200',"label"=>"Equip"));
		//echo $this->Form->input('UserDetail.transport_id',array("maxlength"=>'200',"label"=>"Transport"));
		//echo $this->Form->input('UserDetail.currency_id',array("maxlength"=>'200',"label"=>"Currency"));
		//echo $this->Form->input('UserDetail.timezone_id',array("maxlength"=>'200',"label"=>"Timezone"));
		//echo $this->Form->input('UserDetail.profile_description',array("maxlength"=>'200',"label"=>"Profile Description"));
		//echo $this->Form->input('UserDetail.gender',array("maxlength"=>'200',"label"=>"Gender"));
		echo $this->Form->input('UserDetail.modified_on',array("maxlength"=>'200',"label"=>"Modified On",value=>$modifiedon,'type' => 'hidden'));
		echo $this->Form->input('UserDetail.id',array("maxlength"=>'200',"label"=>"Modified On",'type' => 'hidden'));
		echo $this->Form->input('User.status',array("type"=>'checkbox',"label"=>"Active"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<!--div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Admin.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Admin.id'))); ?></li>
		<li><?php //echo $this->Html->link(__('List Admins'), array('action' => 'index'));?></li>
		<li><?php //echo $this->Html->link(__('List Admindetails'), array('controller' => 'admindetails', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Admindetail'), array('controller' => 'admindetails', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div-->
