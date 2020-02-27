<?php

	checkAdmin();

	if(isset($enviar)){
		$name = clear($nombre);
		$precio = clear($precio);
		$imagen = "";

		if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
			$imagen = $nombre.rand(0,1000).".png";
			move_uploaded_file($_FILES['imagen']['tmp_name'], "imagenproductos/".$imagen);
		}

		$q = $mysqli->query("INSERT INTO productos(nombre, precio, imagen) VALUES ('$nombre', '$precio', '$imagen')");
		alert("Producto agregado");
		redir("?p=agregarProductos");
  

	}


?>


<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto">
	</div>	

	<div class="form-group">
		<input type="text" name="precio" class="form-control" placeholder="Precio del Producto">
	</div>	

	<label>Imagen</label>

	<div class="form-group">
		<input type="file" name="imagen" class="form-control" placeholder="Imagen del Producto">
	</div>	

	<div class="form-group">
		<button type="submit" class="btn btn-success" name="enviar"><i class="fas fa-check"></i>Agregar Producto</button>	
	</div>
</form>