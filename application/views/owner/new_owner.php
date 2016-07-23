<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--6-col">
    <form action="<?php echo base_url('index.php/owner/save_owner'); ?>" method = "post" id = "newOwnerForm">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtNif" name="txtNif">
        <label class="mdl-textfield__label" for="txtNif">NIF</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtNombre" name="txtNombre">
        <label class="mdl-textfield__label" for="txtNombre">Nombre</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtDireccion" name="txtDireccion">
        <label class="mdl-textfield__label" for="txtDireccion">Direcci&oacute;n</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtTelefono" name="txtTelefono">
        <label class="mdl-textfield__label" for="txtTelefono">Telefono</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtFax" name="txtFax">
        <label class="mdl-textfield__label" for="txtFax">Fax</label>
      </div>
      <br>
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Button
      </button>
    </form>
  </div>
</div>
</main>
<?php  $this->load->view('includes/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#newOwnerForm').ajaxForm({ 
        success:  function(data){
          BootstrapDialog.alert(data);
        }
    }); 
	});
</script>