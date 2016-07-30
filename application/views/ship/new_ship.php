<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class="alert alert-danger" style="display:none;" id="divError">
      
    </div>
  </div>
  <div class="mdl-cell mdl-cell--6-col">
   <?php if(isset($ship)): ?>
    <form action="<?php echo base_url('index.php/ship/update_ship'); ?>" method = "post" id = "updateShipForm">
      <div class="mdl-textfield mdl-js-textfield">
        <input type="hidden" name="txtId" value="<?php echo $ship->id; ?>">
        <input class="mdl-textfield__input" type="text" id="txtMatricula" name="txtMatricula" value = "<?php echo $ship->matricula; ?>">
        <label class="mdl-textfield__label" for="txtMatricula">Matricula</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtManga" name="txtManga" value = "<?php echo $ship->manga; ?>">
        <label class="mdl-textfield__label" for="txtManga">Manga</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtEslora" name="txtEslora" value = "<?php echo $ship->eslora; ?>">
        <label class="mdl-textfield__label" for="txtEslora">Eslora</label>
      </div>
      <br>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtCrew" name="txtCrew" value = "<?php echo $ship->max_crew; ?>">
        <label class="mdl-textfield__label" for="txtCrew">Tripulacui&oacute;n maxima</label>
      </div>
      <br>
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Guardar
      </button>
    </form>
   <?php else:?>
    <form action="<?php echo base_url('index.php/ship/save_ship'); ?>" method = "post" id = "newShipForm">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtMatricula" name="txtMatricula" >
        <label class="mdl-textfield__label" for="txtMatricula">Matricula</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtManga" name="txtManga" >
        <label class="mdl-textfield__label" for="txtManga">Manga</label>
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtEslora" name="txtEslora" >
        <label class="mdl-textfield__label" for="txtEslora">Eslora</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="txtCrew" name="txtCrew" >
        <label class="mdl-textfield__label" for="txtCrew">Tripulaci&oacute;n maxima</label>
      </div>

      <div class="mdl-textfield mdl-js-textfield" id="txtOwner" name="txtOwner" >

        <select class="form-control" placeholder = 'Dueño'>
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
		$('#newShipForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;

          if(isNaN(form.txtMatricula.value) || form.txtMatricula.value == '')
          {
            $("#divError").show().append("El campo Matricula es requerido<br>");
            isValid = false;
          }
          if(isNaN(form.txtManga.value) || form.txtManga.value == '')
          {
            $("#divError").show().append("El campo Manga debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtEslora.value) || form.txtEslora.value == '')
          {
            $("#divError").show().append("El campo Manga debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtCrew.value) || form.txtCrew.value == '')
          {
            $("#divError").show().append("El campo tripulaci&oacute;n maxima debe de ser numerico<br>");
            isValid = false;
          }

          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/ship";
            });
          }
          else
          {
            BootstrapDialog.alert(data.message);
          }
          
        }
    }); 
    $('#updateShipForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;
          
          if(form.txtMatricula.value == '')
          {
            $("#divError").show().append("El campo Matricula es requerido<br>");
            isValid = false;
          }
          if(isNaN(form.txtManga.value) || form.txtManga.value == '')
          {
            $("#divError").show().append("El campo Manga debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtEslora.value) || form.txtEslora.value == '')
          {
            $("#divError").show().append("El campo Manga debe de ser numerico<br>");
            isValid = false;
          }
          if(isNaN(form.txtCrew.value) || form.txtCrew.value == '')
          {
            $("#divError").show().append("El campo tripulaci&oacute;n maxima debe de ser numerico<br>");
            isValid = false;
          }

          return isValid; 
          
           
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/ship";
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