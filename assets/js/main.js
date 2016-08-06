function loadOwnerTable(table)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/owner/get_owners",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row = "<tr>";
				row +="<td>"+data[i].id+"</td>";
				row +="<td>"+data[i].identificacion+"</td>";
				row +="<td>"+data[i].nombre+"</td>";
				row +="<td>"+data[i].direccion+"<t/d>";
				row +="<td>"+data[i].telefono+"</td>";
				row +="<td>"+data[i].fax+"</td>";
				row +='<td><i onclick = "editOwner($(this));" class="mdl-color-text-red-400 material-icons" role="presentation">edit</i></td>';
				row += "</tr>";
				$("#"+table+" tbody").append(row);
			}
			$("#"+table).DataTable();
		}
	});
}

function editOwner(sp)
{
	var id = sp.parent().parent().find('td').eq(0).html();
	window.location = $("#baseUrl").val()+"/index.php/owner/edit_owner/"+id;
}

function loadOwnerSelect(select)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/owner/get_owners",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row ="<option value = '"+data[i].id+"'>"+data[i].nombre+"</option>";
				$("#"+select).append(row);
				$("#txtOwner").val($("#txtOwnerId").val());
			}
		}
	});
}

// Ship functions
function loadShipsTable(table)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/ship/get_ship",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row = "<tr>";
				row +="<td>"+data[i].id+"</td>";
				row +="<td>"+data[i].matricula+"</td>";
				row +="<td>"+data[i].manga+"</td>";
				row +="<td>"+data[i].eslora+"<t/d>";
				row +="<td>"+data[i].max_crew+"</td>";
				row +="<td>"+data[i].nombre+"</td>";
				row +='<td><i onclick = "editShip($(this));" class="mdl-color-text-red-400 material-icons" role="presentation">edit</i></td>';
				row += "</tr>";
				$("#"+table+" tbody").append(row);
			}
			$("#"+table).DataTable();
		}
	});
}

function editShip(sp)
{
	var id = sp.parent().parent().find('td').eq(0).html();
	window.location = $("#baseUrl").val()+"index.php/ship/edit_ship/"+id;
}

//Crew functions
function loadShipSelect(select)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/ship/get_ship",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row ="<option value = '"+data[i].id+"'>"+data[i].nombre+"</option>";
				$("#"+select).append(row);
				$("#"+select).val($("#txtShipId").val());
			}
		}
	});
}

function loadCrewTable(table)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/crew/get_crews",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row = "<tr>";
				row +="<td>"+data[i].id+"</td>";
				row +="<td>"+data[i].identificacion+"</td>";
				row +="<td>"+data[i].nombre+"</td>";
				row +="<td>"+data[i].direccion+"<t/d>";
				row +="<td>"+data[i].telefono+"</td>";
				row +="<td>"+data[i].cargo+"</td>";
				row +="<td>"+data[i].matricula+"</td>";
				row +='<td><i onclick = "editCrew($(this));" class="mdl-color-text-red-400 material-icons" role="presentation">edit</i></td>';
				row += "</tr>";
				$("#"+table+" tbody").append(row);
			}
			$("#"+table).DataTable();
		}
	});
}

function editCrew(sp)
{
	var id = sp.parent().parent().find('td').eq(0).html();
	window.location = $("#baseUrl").val()+"index.php/crew/edit_crew/"+id;
}

function loadShipCrew(ship,div)	
{
	$("#divError").hide().html("");
	$.ajax({
		url : $("#baseUrl").val()+"index.php/ship/get_ship_crew/"+ship,	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			var divContent = "<h2>Datos de la tripulacion</h2>";
			for (var i = 0; i < data.length; i++) {

				divContent += "<input type = 'hidden' name = 'txtCrew["+data[i].id+"]' value = '"+data[i].id+"'>";
				divContent += "<input type = 'hidden' name = 'txtCargo["+data[i].id+"]' value = '"+data[i].cargo+"'>";
				divContent += "<br/><h4>Tripulante:"+data[i].nombre+" <h4>";
				divContent += "<br/><div class='upgradeTextField' >";
				divContent += "<input class='mdl-textfield__input pezTipo' type='text' name='txtPez["+data[i].id+"]' id = 'txtPez'>";
				divContent += "<label class='mdl-textfield__label' for='txtPez'>Pez que pesca</label>";
				divContent += "</div>"
				divContent += "<br/><div class='upgradeTextField' >";
				divContent += "<input class='mdl-textfield__input pezCant' type='text' name='txtPezCant["+data[i].id+"]' id = 'txtPezCant'>";
				divContent += "<label class='mdl-textfield__label' for='txtPezCant'>Cantidad</label>";
				divContent += "</div>"
			}

			$("#"+div).html(divContent);
			var textFieldUpgrades = $('.upgradeTextField');

			if(textFieldUpgrades) {

			    for(var i=0;i<textFieldUpgrades.length;++i) {
			        textFieldUpgrades[i].className = 'mdl-textfield mdl-js-textfield mdl-textfield--floating-label';
			    }

			}
			componentHandler.upgradeDom();

			if(data.length == 0) {
				$("#"+div).html("");
				$("#divError").show().html("La nave no tiene tripulantes");
			}

		}
	});
}

function loadTripTable(table)
{
	$.ajax({
		url : $("#baseUrl").val()+"index.php/home/get_trips",	
		method: 'GET',
		success: function(response){
			var data = $.parseJSON(response);
			for (var i = 0; i < data.length; i++) {
				var row = "<tr>";
				row +="<td>"+data[i].id+"</td>";
				row +="<td>"+data[i].matricula+"</td>";
				row +="<td>"+data[i].date+"</td>";
				row +='<td><i onclick = "viewTripDetails($(this));" class="mdl-color-text-red-400 material-icons" role="presentation">search</i></td>';
				row += "</tr>";
				$("#"+table+" tbody").append(row);
			}
			$("#"+table).DataTable();
		}
	});
}

function viewTripDetails(sp)
{
	var id = sp.parent().parent().find('td').eq(0).html();
	 BootstrapDialog.show({
            message: $('<div></div>').load($("#baseUrl").val()+"index.php/home/get_details/"+id)
        });
}
