<?php require RUTA_APP.'/vistas/inc/header.php';
	require_once RUTA_APP.'/controladores/Categorias.php';
	$categorias=new Categorias();
?>
 
<div class="col-12 margenTopBotton">
	<button type="button" class="btn <?php echo BTNCOLORLI?> btn-sm" data-toggle="collapse" data-target="#agregar_categoria"><?php echo ADDCATEGORIA;?></button>
</div>
<div class="col-12">
	 <div id="agregar_categoria" class="collapse">  		
	<form action="<?php echo RUTA_URL;?>/categorias/agregar" method="post" class="form-inline margenTopBotton">
		<div class="form-grup">			
			<input type="text" class="form-control" name="nombre_categoria" id="nombre" placeholder="<?php echo NOMBRECATEGORIA;?>">
			<button class="btn <?php echo BTNCOLOR?> btn-sm" type="submit" name="Enviar_Categoria"><span><?php echo AGREGAR;?></span></button>			
		</div>					
	</form>			
  </div>
<?php	
	$parametro=Globalparametros();
	$categorias->mostrarNotificaciones($parametro);	
?>
</div>
<?php
	$categorias->mostrar();
?>

<?php require RUTA_APP.'/vistas/inc/footer.php'; ?>