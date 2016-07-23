<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
	<!-- Raised button with ripple -->
<?php if(isset($message)):?>
	<h4><?php echo $message; ?></h4>
<?php endif; ?>
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id = "btnNewowner">
  Agregar dueño	
</button>
</main>
<?php  $this->load->view('includes/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("body").on("click","#btnNewowner",function(){
			window.location = '<?php echo base_url("index.php/owner/new_owner"); ?>'
		})
	});
</script>