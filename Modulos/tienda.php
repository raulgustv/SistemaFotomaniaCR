<?php

	//checkUser("tienda"); //descomentar para que cliente pueda ver tienda solo al iniciar sesión (temporal)



	if(isset($agregar) && isset($cant)){

		$idProd = clear($agregar);
		$cant = clear($cant);
		$idCliente = clear($_SESSION['idCliente']);

		$v = $mysqli->query("SELECT * FROM carro where idCliente = '$idCliente' AND idProducto = '$idProd'");
		if(mysqli_num_rows($v)>0){ //si ya el producto esta en carrito, con la sesión iniciada

			$q = $mysqli->query("UPDATE carro SET cantidad = cantidad + $cant WHERE idCliente = '$idCliente'"); //actualiza cantidad productos

		}else{
			$q = $mysqli->query("INSERT INTO carro (idCliente, idProducto, cantidad) VALUES ($idCliente, $idProd, $cant)");
			//solo inserta producto
		}

		
		alert("Se añadieron productos");
		redir("?p=tienda");
	}


	$q = $mysqli->query("SELECT * FROM productos ORDER by id DESC");

	while($r=mysqli_fetch_array($q)){
		?>
		<div class="producto">
			<div class="nombreProducto"><?=$r['nombre']?></div>

			<div>
				<img class="imgProducto" src="imagenproductos/<?=$r['imagen']?>"/>
			</div>

			<span class="precio"><?=$divisa?><?=$r['precio']?></span>


			<?php
				if(isset($_SESSION['idCliente'])){
					?>

					<button class= "btn btn-primary float-right" onclick="agregarCarro('<?=$r['id']?>');"><i class="fas fa-shopping-cart"></i></button>

					<?php
				}
			?>



		

		</div>

		

		<?php
	}

?>

<script type="text/javascript">
	function agregarCarro (idProd) {
		var cant = prompt("Cantidad a agregar?", 1);

		if(cant.length > 0){
			window.location="?p=tienda&agregar="+idProd+"&cant="+cant;
		}
		
	}
</script>