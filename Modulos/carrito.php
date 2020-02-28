<?php
checkUser("carrito");
?>

<h1><i class="fas fa-shopping-cart"></i>Carrito de compras</h1>

<table class="table table-striped">
	
	<tr>
		<th>Producto</th>
		<th>Nombre producto</th>
		<th>Cantidad</th>
		<th>Precio Unitario</th>
		<th>Precio Total</th>		
	</tr>

<?php

	$idCliente = clear($_SESSION['idCliente']);

	$q = $mysqli->query("SELECT * FROM carro Where idCliente = '$idCliente'"); // recorre carro 

	while($r = mysqli_fetch_array($q)){

			$q2 = $mysqli->query("SELECT * FROM productos WHERE id = '".$r['idProducto']."'"); // recorre productos para determinar el nombre
			$r2 = mysqli_fetch_array($q2);

			$imagen = $r2['imagen'];
			$nombreProducto = $r2['nombre'];
			$cantidad = $r['cantidad'];
			$precioUnidad = $r2['precio'];
			$impuesto = $cantidad * $precioUnidad * $iva; // aun no se muestra
			$precioTotal = $cantidad * $precioUnidad + $impuesto;

			?>

			
			<tr>
				<td><img src="imagenproductos/<?=$imagen?>" class="imagenCarro"/></td>
				<td><?=$nombreProducto?></td>
				<td><?=$cantidad?></td>
				<td><?=$divisa?><?=$precioUnidad?></td>
				<td><?=$divisa?><?=$precioTotal?></td>

			</tr>

			<?php
	}

?>

</table>