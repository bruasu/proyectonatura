<?php require RUTA_APP.'/vistas/inc/header.php';
require_once RUTA_APP.'/controladores/Productos.php';
$productos=new Productos();

	$parametro=Globalparametros();
	$productos->mostrarNotificaciones($parametro);	
?>
<div class="p-1">	
	<div class="dropdown">
	  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><?php echo AGREGAR?></button>
	  <div class="dropdown-menu">
	    <a class="dropdown-item" href="<?php echo RUTA_URL;?>/productos/agregar"><?php echo NUEVOPRODUCTO?></a>
	    <a class="dropdown-item" href="#"><?php echo ADDALSTOCK?></a>
	  </div>
	</div>	
</div>


<?php
 $productos->mostrar();
?>

<?php require RUTA_APP.'/vistas/inc/footer.php';?>
