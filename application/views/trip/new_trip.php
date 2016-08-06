<?php  $this->load->view('includes/header'); ?>
<?php  $this->load->view('includes/sidebar'); ?>
<main class="mdl-layout__content">
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
    <div class="alert alert-danger" style="display:none;" id="divError">
      
    </div>
  </div>
  <div class="mdl-cell mdl-cell--6-col">
    <form action="<?php echo base_url('index.php/home/register_trip'); ?>" method = "post" id = "newTripForm">
       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
       <label class="" for="txtxDate">Fecha</label>
       <input class="form-control" type="text" id="txtxDate" name="txtxDate">
      </div>
      <br/>
      <div class="mdl-textfield mdl-js-textfield" >
        <label class="" for="txtShip">Nave</label>
        <select class="form-control" placeholder = 'Dueño' id="txtShip" name="txtShip">
          <option value="">--Elegir nave--</option>
        </select>
      </div>
      <br>
      <div id="crewDiv">
        
      </div>
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        Guardar
      </button>
    </form>
  </div>
</div>
</main>
<?php  $this->load->view('includes/footer'); ?>
<script type="text/javascript">
	$(document).ready(function(){
   $( "#txtxDate" ).datepicker();
   loadShipSelect('txtShip');

   $("#txtShip").change(function(){
    var shipId = $(this).val()
    loadShipCrew(shipId,'crewDiv');
   });
   $('#newTripForm').ajaxForm({ 
        beforeSubmit: function(formData, jqForm, options){
          $("#divError").hide().html("");
          var form = jqForm[0]; 
          var isValid = true;
          var errors = "";
          var cantidades = $(".pezCant");
          var tipos = $(".pezTipo");

          if(form.txtxDate.value == "")
          {
            errors += "Debe de elegir una fecha correcta<br>";
            isValid = false;
          }

          if(form.txtShip.value != "")
          {
            if(cantidades.length == 0)
            {
              errors += "No se puede registrar un viaje a una nave sin tripulacion<br>";
              isValid = false;
            }
            else
            {
              for(var i=0;i<cantidades.length;++i) 
              {
                if(isNaN(cantidades[i].value) || cantidades[i].value == '' )
                {
                   errors += "Todas las cantidades deben de ser numericas<br>";
                   isValid = false;
                   break; 
                }
              }

              for(var i=0;i<tipos.length;++i) 
              {
                if(tipos[i].value == '' )
                {
                   errors += "Todas los tipos de peces son requeridos<br>";
                   isValid = false;
                   break; 
                }
              }
            }
          }
          else
          {
            errors += "Debe de elegir una nave<br>";
            isValid = false;
          }
          

          if(!isValid)
          {
             $("#divError").show().html(errors);
          }

          return isValid; 
        },
        success:  function(response){
          var data = $.parseJSON(response);
          if(data.status == "ok")
          {
            BootstrapDialog.alert(data.message,function(){
              window.location = $("#baseUrl").val()+"index.php/home";
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