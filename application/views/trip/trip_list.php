<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
  	<?php if(isset($message)):?>
		<h4><?php echo $message; ?></h4>
	<?php endif; ?>
  	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id = "btnNewTrip">
	  Registrar salida	
	</button>
  </div>
  <div class="mdl-cell mdl-cell--12-col">
  <table id="crewTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nave</th>
                <th>Fecha</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nave</th>
                <th>Fecha</th>
                <th>Detalles</th>
            </tr>
        </tfoot>
        <tbody>

        </tbody>
    </table>
  </div>
</div>
	<!-- Raised button with ripple -->


</main>
<?php  $this->load->view('includes/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("body").on("click","#btnNewTrip",function(){
			window.location = '<?php echo base_url("index.php/home/new_trip"); ?>'
		})

	});
</script>