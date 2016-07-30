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
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input type="hidden" name="txtId" value="<?php echo $crew->id; ?>">
        <input type="hidden"  id="txtShipId" value="<?php echo $crew->id_ship; ?>">
        <input class="mdl-textfield__input" type="text" id="txtIdentificacion" name="txtIdentificacion" value = "<?php echo $crew->identificacion; ?>">
        <label class="mdl-textfield__label" for="txtIdentificacion">Identificaci&oacute;n</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtNombre" name="txtNombre" value = "<?php echo $crew->nombre; ?>">
        <label class="mdl-textfield__label" for="txtNombre">Nombre</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtDireccion" name="txtDireccion" value = "<?php echo $crew->direccion; ?>">
        <label class="mdl-textfield__label" for="txtDireccion">Direcci&oacute;n</label>
      </div>
      <br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtTelefono" name="txtTelefono" value = "<?php echo $crew->telefono; ?>">
        <label class="mdl-textfield__label" for="txtTelefono">Telefono</label>
      </div>
      <br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtCargo" name="txtCargo" value = "<?php echo $crew->cargo; ?>">
        <label class="mdl-textfield__label" for="txtCargo">Cargo</label>
      </div>
      <br>

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
   <?php else:?>
    <form action="<?php echo base_url('index.php/crew/save_crew'); ?>" method = "post" id = "newCrewForm">
       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtIdentificacion" name="txtIdentificacion">
        <label class="mdl-textfield__label" for="txtIdentificacion">Identificaci&oacute;n</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtNombre" name="txtNombre" >
        <label class="mdl-textfield__label" for="txtNombre">Nombre</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtDireccion" name="txtDireccion">
        <label class="mdl-textfield__label" for="txtDireccion">Direcci&oacute;n</label>
      </div>
      <br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtTelefono" name="txtTelefono">
        <label class="mdl-textfield__label" for="txtTelefono">Telefono</label>
      </div>
      <br>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input class="mdl-textfield__input" type="text" id="txtCargo" name="txtCargo">
        <label class="mdl-textfield__label" for="txtCargo">Cargo</label>
      </div>
      <br>

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
    loadShipSelect('txtShip');

		$('#newCrewForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;

          if(form.txtIdentificacion.value == '')
          {
            $("#divError").show().append("El campo identificacion es requerido<br>");
            isValid = false;
          }
          if(form.txtShip.value == '')
          {
            $("#divError").show().append("El campo Nave es requerido<br>");
            isValid = false;
          }
          if(form.txtCargo.value == '')
          {
            $("#divError").show().append("El campo Cargo es requerido<br>");
            isValid = false;
          }
          if(form.txtNombre.value == '')
          {
            $("#divError").show().append("El campo Nombre es requerido<br>");
            isValid = false;
          }
          if(form.txtDireccion.value == '')
          {
            $("#divError").show().append("El campo Direccion es requerido<br>");
            isValid = false;
          }
          if(isNaN(form.txtTelefono.value) || form.txtTelefono.value == '')
          {
            $("#divError").show().append("El campo Telefono debe de ser numerico<br>");
            isValid = false;
          }

          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/crew";
            });
          }
          else
          {
            BootstrapDialog.alert(data.message);
          }
          
        }
    }); 
    $('#updateCrewForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;
          
          if(form.txtIdentificacion.value == '')
          {
            $("#divError").show().append("El campo identificacion es requerido<br>");
            isValid = false;
          }
          if(form.txtShip.value == '')
          {
            $("#divError").show().append("El campo Nave es requerido<br>");
            isValid = false;
          }
          if(form.txtCargo.value == '')
          {
            $("#divError").show().append("El campo Cargo es requerido<br>");
            isValid = false;
          }
          if(form.txtNombre.value == '')
          {
            $("#divError").show().append("El campo Nombre es requerido<br>");
            isValid = false;
          }
          if(form.txtDireccion.value == '')
          {
            $("#divError").show().append("El campo Direccion es requerido<br>");
            isValid = false;
          }
          if(isNaN(form.txtTelefono.value) || form.txtTelefono.value == '')
          {
            $("#divError").show().append("El campo Telefono debe de ser numerico<br>");
            isValid = false;
          }

          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/crew";
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