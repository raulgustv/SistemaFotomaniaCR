<?php

	


	$q = $mysqli->query("SELECT * FROM productos ORDER by id DESC");

	while($r=mysqli_fetch_array($q)){
		?>
		<div class="producto">
			<div class="nombreProducto"><?=$r['nombre']?></div>

			<div>
				<img class="imgProducto" src="imagenproductos/<?=$r['imagen']?>"/>
			</div>

			<span class="precio"><?=$divisa?><?=$r['precio']?></span>
			<button class= "btn btn-primary float-right" onclick="agregarCarro('<?=$r['id']?>');"><i class="fas fa-shopping-cart"></i></button>

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