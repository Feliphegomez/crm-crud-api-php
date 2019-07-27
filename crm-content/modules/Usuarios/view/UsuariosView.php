
 
<div class="col-lg-7">
	<form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5">
		<h3>Añadir usuario</h3>
		<hr/>
		Nombre: <input type="text" name="nombre" class="form-control"/>
		Apellido: <input type="text" name="apellido" class="form-control"/>
		Email: <input type="text" name="email" class="form-control"/>
		Contraseña: <input type="password" name="password" class="form-control"/>
		<input type="submit" value="enviar" class="btn btn-success"/>
	</form>
</div>
 
<div class="col-lg-5">
	<h3>Usuarios</h3>
	<hr/>
	<section class="col-lg-12 usuario" style="height:400px;overflow-y:scroll;">
		<?php 
			if(isset($allusers)){
				foreach($allusers as $user) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
				<?php echo $user->id; ?> -
				<?php echo $user->names; ?> -
				<?php echo $user->surname; ?> -
				<?php echo $user->email; ?>
				<div class="right">
					<a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
				</div>
				<hr/>
			<?php }
			} ?>
	</section>
</div>
