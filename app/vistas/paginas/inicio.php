<?php
require RUTA_APP . '/vistas/inc/header.php';
?>

<h1>INICIO- LISTA DE PRODUCTOS</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Acciones</th>
		</tr>
		<?php foreach ($datos['usuarios'] as $usuario) : ?>
			<tr>
				<td><?php echo $usuario->id_usuario; ?></td>
				<td><?php echo $usuario->nombre; ?></td>
				<td><?php echo $usuario->email; ?></td>
				<td><?php echo $usuario->telefono; ?></td>
				<td><a href="<?php echo RUTA_URL; ?>/paginas/editar/<?php echo $usuario->id_usuario; ?>">Editar</a></td>
				<td><a href="<?php echo RUTA_URL; ?>/paginas/borrar/<?php echo $usuario->id_usuario; ?>">Eliminar</a></td>
			</tr>
		<?php endforeach; ?>
	</thead>
</table>


<?php
require RUTA_APP . '/vistas/inc/footer.php';
?>
