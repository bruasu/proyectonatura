<?php

class Categorias extends Controlador{	

	public function __construct(){
		$this->conectar=$this->modelo('Categoria');	
		$this->parametros=Globalparametros();	
	}
	public function mostrar(){	

		$resultado=$this->conectar->obtenerCategorias();		
		echo "<table class='table'>";
		echo "<thead><tr><th class='p-1'>".ID."</th><th class='p-1'>".NOMBRE."</th><th class='p-1'>".ACCIONES."</th></tr></thead>";
		echo "<tbody>";
		foreach ($resultado as $valor) {
			echo "<tr>
					<td class='p-1'>$valor->id_categoria</td>
					<td class='p-1'>$valor->nombre</td>
					<td class='p-1'><a href='".RUTA_URL."/categorias/modificar/$valor->id_categoria/$valor->nombre' class='btn ".BTNCOLOR." btn-sm icon-pencil-square-o'></a><a href='".RUTA_URL."/categorias/borrar/$valor->id_categoria/$valor->nombre' class='btn ".BTNCOLOR." btn-sm icon-trash-o ml-2'></a></td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	public function agregar(){
		if (isset($_POST['Enviar_Categoria'])) {			
			if (!empty(trim($_POST['nombre_categoria']))) {
				$datos=['nombre_categoria'=>filter_input(INPUT_POST,'nombre_categoria')];
				if ($resultado=$this->conectar->addCategoria($datos)) {
					redireccionar('/paginas/categorias/categoriaaddExito');
				}else{
					die('Algo salio Mal');
				}			
			}else{
				redireccionar('/paginas/categorias/error_addCategoria');
			}		
		}else{
			$datos=['nombre_categoria'=>''];
			$this->vista('admin/categorias',$datos);
		}

	}
	public function modificar($id_categoria){
		if (isset($_POST['modificar_categoria'])) {
			$datos=[
				"id_categoria"=>$id_categoria,
				"nombre_modificar"=>filter_input(INPUT_POST,'nombre_categoria')
			];			
			if ($this->conectar->modificarCategoria($datos)) {
				redireccionar('/paginas/categorias/categoriaModificadaExito');
			}

		}			
		require RUTA_APP.'/vistas/inc/header.php';
		echo "<div class='col-12 margenTopBotton'>
				<form action='".RUTA_URL."/categorias/modificar/".$id_categoria."'
				method='post' class='card form-inline margenTopBotton'>	
				<h3>".VALORACTUAL."</h3>
					<div class='card ".BGCOLOR."'>
					    <div class='card-body text-center pt-0 pb-0'>
					      <p class='card-text'><h2>".$this->parametros[1]."</h2></p>
					</div>
				</div>
				<div class='text-center'>
					<h4 class='mt-4'>".NOMBREASERMODIFICADO."</h4>		
					<input type='text' name='nombre_categoria' placeholder='".NOMBRE."' class='mt-2'>
				</div>
				<button type='submit' name='modificar_categoria' class='btn ".BTNCOLORLI." btn-sm mt-2 mb-2'>".MODIFICAR."</button>
				</form>
				<button class='btn ".BTNCOLORLI." btn-sm'><a href='".RUTA_URL."/paginas/categorias'>".VOLVER."</a></button>
			</div>";
		require RUTA_APP.'/vistas/inc/footer.php';	
		
	}

	public function borrar(){
		if ($this->parametros[2]=='ok_borrar') {
			$datos=['id_categoria'=>$this->parametros[0]];
			$resultado=$this->conectar->borrarCategoria($datos);
			redireccionar('/paginas/categorias/categoriaBorradaExito');
		}				
		require RUTA_APP.'/vistas/inc/header.php';
		echo "<div class='col-12 margenTopBotton'>
				<form action='".RUTA_URL."/categorias/borrar/".$this->parametros[0]."/".$this->parametros[1]."/borrar'
				method='post' class='card form-inline margenTopBotton'>				
					<h3>".ELIMINARCATEGORIA."</h3>
					<div class='card ".BGCOLORALERT."'>
					    <div class='card-body text-center pt-2 pb-2'>
					      <p class='card-text'><h2>".$this->parametros[1]."</h2></p>
					    </div>
					</div>
					<div>
						<button type='button' name='borar-categoria' class='btn ".BTNCOLOR." mt-2 mb-2'><a href='".RUTA_URL."/categorias/borrar/".$this->parametros[0]."/".$this->parametros[1]."/ok_borrar' class='text-white'>".SI."</a></button>
						<button type='button' class='btn ".BTNCOLOR." mt-2 mb-2'><a href='".RUTA_URL."/paginas/categorias' class='text-white'>".NO."</a></button>
					</div>
				</form>
			</div>";
		require RUTA_APP.'/vistas/inc/footer.php';	
	}

	public function mostrarNotificaciones($parametro){
		if (isset($parametro[0])) {			
			if ($parametro[0]=='ok') {
				echo "<div class='margenTopBotton alert alert-success alert-dismissible fade show'>
					    <button type='button' class='close' data-dismiss='alert'>&times;
					    </button><strong class='mr-2'>".ALERT_AGREGADO."</strong>".ALERT_ADD_SUCCESS."</div>";
			}
			if($parametro[0]=='error_addCategoria'){
				echo "<div class='margenTopBotton alert alert-danger alert-dismissible fade show'>
					    <button type='button' class='close' data-dismiss='alert'>&times;
					    </button><strong class='mr-2'>".ALERT_ERROR."</strong>".ALERT_ADD_ERROR."</div>";
			}
			if ($parametro[0]=='categoriaModificadaExito') {
				echo "<div class='margenTopBotton alert alert-success alert-dismissible fade show'>
					    <button type='button' class='close' data-dismiss='alert'>&times;
					    </button><strong class='mr-2'>".MODIFICADO."</strong>".MODCATEGORIAEXITO."</div>";
			}
			if ($parametro[0]=='categoriaBorradaExito') {
				echo "<div class='margenTopBotton alert alert-success alert-dismissible fade show'>
					    <button type='button' class='close' data-dismiss='alert'>&times;
					    </button><strong class='mr-2'></strong>".BORRADAEXITO."</div>";
			}
		}	
	}

	
}

?>