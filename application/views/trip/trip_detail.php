<?php if(count($trips) > 0): ?>
	<div class="mdl-cell mdl-cell--12-col">
    <table id="tripsDetTable" class="display" cellspacing="0" width="100%">
    <thead>
            <tr>
                <th>ID salida</th>
                <th>Tripulante</th>
                <th>Pesca</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID salida</th>
                <th>Tripulante</th>
                <th>Pesca</th>
                <th>Cantidad</th>
            </tr>
        </tfoot>
        <tbody>
		<?php foreach($trips as $t): ?>
			<tr>
				<td><?php echo $t['id_salida']; ?></td>
				<td><?php echo $t['nombre']; ?></td>
				<td><?php echo $t['fish']; ?></td>
				<td><?php echo $t['cantidad']; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	</div>
<?php  else:?>
<h3>No existen datos para esta salida</h3>
<?php  endif;?>