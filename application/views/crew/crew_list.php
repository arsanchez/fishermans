<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
  	<?php if(isset($message)):?>
		<h4><?php echo $message; ?></h4>
	<?php endif; ?>
  	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id = "btnNewCrew">
	  Agregar miembro	
	</button>
  </div>
  <div class="mdl-cell mdl-cell--12-col">
  <table id="ownersTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Cargo</th>
                <th>Nave</th>
                <th>--</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Cargo</th>
                <th>Nave</th>
                <th>--</th>

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
		$("body").on("click","#btnNewCrew",function(){
			window.location = '<?php echo base_url("index.php/crew/new_crew"); ?>'
		})

 	  
	});
</script>