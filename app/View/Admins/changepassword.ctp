<?php echo $this->element("admins/common",array("place"=>'Search by state name or country name',"flag"=>false,"pageheader"=>'',"buttontitle"=>'Add State',"listflag"=>false)); ?>
<div class="categories form">
<?php 
echo $this->Session->flash();
echo $this->Form->create("Admin");
?>
<fieldset>
 		<legend><?php __('Change Password'); ?></legend>
<?php
echo $this->Form->input("currentpassword",array("type"=>'password','label'=>'Current Password'));
echo $this->Form->input("newpassword",array("type"=>'password','label'=>'New Password'));
echo $this->Form->input("confirmpassword",array("type"=>'password','label'=>'Confirm Password'));
echo $this->Form->input("id",array("type"=>'hidden','label'=>false,"value"=>$_SESSION['admin']['Admin']['id']));
?></fieldset>
<a class="btn btn-grey" onclick="history.go(-1);">Cancel</a>
<?php echo $this->Form->Submit("Submit"); ?>

<?php echo $this->Form->end();
?>
</div>
