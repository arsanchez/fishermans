<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class="alert alert-danger" style="display:none;" id="divError">
      
    </div>
  </div>
  <div class="mdl-cell mdl-cell--6-col">
   <?php if(isset($owner)): ?>
    <form action="<?php echo base_url('index.php/owner/update_owner'); ?>" method = "post" id = "updateOwnerForm">
      <div class="mdl-textfield mdl-js-textfield">
        <input type="hidden" name="txtId" value="<?php echo $owner->id; ?>">
        <input class="mdl-textfield__input" type="text" id="txtNif" name="txtNif" value = "<?php echo $owner->identificacion; ?>">
        <label class="mdl-textfield__label" for="txtNif">NIF</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtNombre" name="txtNombre" value = "<?php echo $owner->nombre; ?>">
        <label class="mdl-textfield__label" for="txtNombre">Nombre</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtDireccion" name="txtDireccion" value = "<?php echo $owner->direccion; ?>">
        <label class="mdl-textfield__label" for="txtDireccion">Direcci&oacute;n</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtTelefono" name="txtTelefono" value = "<?php echo $owner->telefono; ?>">
        <label class="mdl-textfield__label" for="txtTelefono">Telefono</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtFax" name="txtFax" value = "<?php echo $owner->fax; ?>">
        <label class="mdl-textfield__label" for="txtFax">Fax</label>
      </div>
      <br>
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Guardar
      </button>
    </form>
   <?php else:?>
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
		$('#newOwnerForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;
          if(form.txtNombre.value == '')
          {
            $("#divError").show().append("El campo nombre es obligatorio<br>");
            isValid = false;
          }
          if(form.txtDireccion.value == '')
          {
            $("#divError").show().append("El campo direccion es obligatorio<br>");
            isValid = false;
          }
          if(isNaN(form.txtNif.value) || form.txtNif.value == '')
          {
            $("#divError").show().append("El campo NIF debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtTelefono.value) || form.txtTelefono.value == '')
          {
            $("#divError").show().append("El campo telefono debe de ser numerico<br>");
            isValid = false;
          }
          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/owner";
            });
          }
          else
          {
            BootstrapDialog.alert(data.message);
          }
          
        }
    }); 
    $('#updateOwnerForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;
          if(form.txtNombre.value == '')
          {
            $("#divError").show().append("El campo nombre es obligatorio<br>");
            isValid = false;
          }
          if(form.txtDireccion.value == '')
          {
            $("#divError").show().append("El campo direccion es obligatorio<br>");
            isValid = false;
          }
          if(isNaN(form.txtNif.value) || form.txtNif.value == '')
          {
            $("#divError").show().append("El campo NIF debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtTelefono.value) || form.txtTelefono.value == '')
          {
            $("#divError").show().append("El campo telefono debe de ser numerico<br>");
            isValid = false;
          }
          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/owner";
            });
          }
          else
          {
            BootstrapDialog.alert(data.message);
          }
          
        }
    }); 
	});
</script>