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