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