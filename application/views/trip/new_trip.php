<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class="alert alert-danger" style="display:none;" id="divError">
      
    </div>
  </div>
  <div class="mdl-cell mdl-cell--6-col">
   <?php if(isset($crew)): ?>
    <form action="<?php echo base_url('index.php/crew/update_crew'); ?>" method = "post" id = "updateCrewForm">
      
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Guardar
      </button>
    </form>
   <?php else:?>
    <form action="<?php echo base_url('index.php/crew/save_crew'); ?>" method = "post" id = "newCrewForm">
       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
       <label class="" for="txtxDate">Fecha</label>
       <input class="form-control" type="text" id="txtxDate" name="txtxDate">
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield" >
        <select class="form-control" placeholder = 'Dueño' id="txtShip" name="txtShip">
          <option value="">--Elegir nave--</option>
        </select>
      </div>
      <br>
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Guardar
      </button>
    </form>
  <?php endif; ?>
  </div>
</div>
</main>
<?php  $this->load->view('includes/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
   $( "#txtxDate" ).datepicker();

	});
</script>