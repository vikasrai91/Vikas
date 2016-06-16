<?php $class = $params['class']; ?>
<div class="alert alert-<?php echo $class; ?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php //echo $class; ?></strong> <?php echo $message; ?>
</div>
<script type="text/javascript">
	$(function() {
    setTimeout(function() {
        $(".alert").hide('fast');
    }, 5000);
});
</script>