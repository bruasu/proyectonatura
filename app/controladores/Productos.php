<?php

class Productos extends Controlador{	

	public function __construct(){
		$this->conectar=$this->modelo('Producto');	
		$this->parametros=Globalparametros();	
	}

	public function mostrar(){
		$resultado=$this->conectar->obtenerProductos();

		echo "<table class='table'>";
		echo "<thead>
				<tr>
					<th class='p-1'>".ID."</th>
					<th class='p-1'>".NOMBRE."</th>
					<th class='p-1'>".DESCRIPCION."</th>
					<th class='p-1'>".ACCIONES."</th>
				</tr>
				</thead>";
		echo "<tbody>";
		foreach ($resultado as $valor) {
			$statusPrint=null;
			$colorbtn=null;
			$verificacion=$valor->status;

			if ($verificacion=='activo') {
				$statusPrint="icon-toggle-on";
				$colorbtn=BTNCOLORLISUCCESS;
			}elseif($verificacion=='bloqueado'){
				$statusPrint="icon-toggle-off";
				$colorbtn=BTNCOLORLIALERT;
			}elseif ($verificacion=='sin_stock') {
				$statusPrint="icon-toggle-off ";
				$colorbtn=BTNCOLORALERT;
			}

			echo "<tr>
					<td class='p-1'>$valor->id_producto</td>
					<td class='p-1'>$valor->nombre</td>
					<td class='p-1'>$valor->descripcion</td>
					<td class='p-1'>
						<a href='".RUTA_URL."/productos/modificar/$valor->id_producto/$valor->nombre' class='btn ".BTNCOLORLI." btn-sm icon-pencil-square-o'></a>
						<a href='".RUTA_URL."/productos/borrar/$valor->id_producto/$valor->nombre' class='btn ".BTNCOLORLI." btn-sm icon-trash-o ml-2'></a>
						<a href='".RUTA_URL."/productos/modificarStatus/$valor->status/$valor->nombre/$valor->id_producto' class='btn ".$colorbtn." btn-sm ".$statusPrint." ml-2'></a>
					</td>";
			echo "</tr>";		
		}
		echo "</tbody>";
		echo "</table>";


		
	}
	public function agregar(){
	require RUTA_APP.'/vistas/inc/header.php';
	echo "
	<div class='d-flex justify-content-center'>
		<div class='card'>
		  <div class='card-header'><h4 class='card-title'>".NUEVOPRODUCTO."</h4></div>
		  <div class='card-body'>
			<form action='".RUTA_URL."/productos/update_producto' method='post'>
				<div class='form-grup'>
					<label for='nombre'>".NOMBRE.":</label>
					<input type='text' class='form-control' id='nombre' name='nombre'>
				</div>
				<div class='form-grup'>
					<label for='descripcion'>".DESCRIPCION.":</label>
					<textarea name='descripcion' cols='10' maxlength='250' class='form-control' id='descripcion'></textarea>
				</div>
				<div class='form-grup'>
					<label for='categoria'>".CATEGORIA.":</label>
					<input list='categoria' name='categoria' required> <br><br>
                    <datalist id='categoria'>
                        <select>
                            <option value=''>Masculino</option>
                            <option value=''>Femenino</option>
                            <option value=''>Indefinido</option>
                        </select>  
                    </datalist>
				</div>
				<div class='form-grup'>
					<label for='imagenes[]'>".FOTOS.":</label>
					<input type='file' class='form-control' id='imagenes[]' name='imagenes[]' multiple=''>
				</div>
				<div class='form-grup'>
					<button type='submit' class='form-control btn ".BTNCOLOR." mt-2' name='Enviar_producto'>".ENVIAR."</button>
				</div>
			</form>
		  </div>		 
		</div>
	</div>
	";
	require RUTA_APP.'/vistas/inc/footer.php';	
	}
	public function modificar(){

	}
	public function borrar(){

	}
	public function modificarStatus(){
		$valordelStatus=$this->status($this->parametros[0]);

		require RUTA_APP.'/vistas/inc/header.php';
		echo "<div class='col-12 margenTopBotton'>
				<form action='".RUTA_URL."/productos/statusModificado' method='post' class='card form-inline margenTopBotton'>				
					<h3>".MODIFICARSTATUS."</h3>
					<div class='d-flex'>
						<div class='card ".BGCOLORALERT." m-2'>
						    <div class='card-body text-center pt-2 pb-2'>
						      <p class='card-text'><h4>".ELPRODUCTO."</h4><span class='".TEXTBLANCO."'><h2>".$this->parametros[1]."</h2><span></p>
						    </div>
						</div>
						<div class='card ".BGCOLORALERT." m-2'>
						    <div class='card-body text-center pt-2 pb-2'>
						      <p class='card-text'><h4>".ESTADOACTUAL."</h4><span class='".TEXTBLANCO."'><h2>".$valordelStatus."</h2></span></p>
						    </div>
						</div>
					</div>
					<div>
						<button type='button' name='modificarStatus' class='btn ".BTNCOLOR." mt-2 mb-2 text-white'><a href='".RUTA_URL."/productos/statusModificado/".$this->parametros[0]."/".$this->parametros[1]."/".$this->parametros[2]."' class='text-white'>".SI."</a></button>
						<button type='button' class='btn ".BTNCOLOR." mt-2 mb-2'><a href='".RUTA_URL."/paginas/productos' class='text-white'>".NO."</a></button>
					</div>
				</form>
			</div>";
		require RUTA_APP.'/vistas/inc/footer.php';	
	}
	public function statusModificado(){
		

		/************* MODIFICAR EL VALOR ****************/
		$statusNuevo=null;
		$status=$this->parametros[0];
		if ($status=='bloqueado') {
			$statusNuevo='activo';
		}elseif($status=='activo'){
			$statusNuevo='bloqueado';
		}elseif($status=='sin_stock') {
			redireccionar('/paginas/productos/errorProductoSinStock');
		}
		if ($statusNuevo=='bloqueado'||$statusNuevo=='activo') {					
			if (!empty(trim($this->parametros[2]))) {
					$datos=['id_producto'=>$this->parametros[2],
						'status'=>$statusNuevo];
				if ($resultado=$this->conectar->modificarStatus($datos)) {
					redireccionar("/productos/statusModificado/modificadoconExito/".$statusNuevo."");
				}else{
					die('Algo salio Mal');
				}	
			}		
		}
		/*************************************************/
		if ($this->parametros[0]=='modificadoconExito') {
			$valordelStatus=$this->status($this->parametros[1]);
			require RUTA_APP.'/vistas/inc/header.php';
				echo "<div class='col-12 margenTopBotton'>
					<div class='card form-inline margenTopBotton'>				
						<h3>".STATUSMODIFICADO."</h3>
						<div class='d-flex'>
							<div class='card ".BGCOLOREXITO." m-2'>
							    <div class='card-body text-center pt-2 pb-2'>
							      <p class='card-text'><h4>".NUEVOVALOR."</h4><span class='".TEXTBLANCO."'><h2>".$valordelStatus."</h2><span></p>
							    </div>
							</div>						
					</div>
				</div>
				<button class='btn ".BTNCOLORLI." btn-sm'><a href='".RUTA_URL."/paginas/productos'>".VOLVER."</a></button>";
			require RUTA_APP.'/vistas/inc/footer.php';
		}

	}

	protected function status($valor){
		$valordelStatus=null;
		if ($valor=='bloqueado') {			
			return $valordelStatus=BLOQUIADO;
		}
		elseif($valor=='activo'){
			return $valordelStatus=ACTIVO;
		}else{
			return $valordelStatus=SINSTOCK;
		}
	}

	protected function update_producto(){
		if (isset($_POST['Enviar_producto'])) {
			if (!empty(trim($_POST['nombre']))) {
				if (!empty(trim($_POST['descripcion']))) {
					$nombre=filter_input(INPUT_POST, 'nombre');
					$descripcion=filter_input(INPUT_POST, 'descripcion');
					$id_categoria='';
					$id_admin='';
					$status='bloqueado';

				}
			}
		}
		
		foreach($_FILES["imagenes"]['tmp_name'] as $key => $tmp_name){
		//Validamos que el archivo exista
		if($_FILES["imagenes"]["name"][$key]) {
			$filename = $_FILES["imagenes"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["imagenes"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			$tipo_imagen= $_FILE["imagenes"]["type"]; //tipo de imagen
			$tipo_imagen= $_FILE["imagenes"]["size"]; //tamaño de la imagen
			
			$directorio = 'docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
		

	}


	public function mostrarNotificaciones($parametro){
		if (isset($parametro[0])) {	
			if($parametro[0]=='errorProductoSinStock'){
				echo "<div class='margenTopBotton alert alert-danger alert-dismissible fade show'>
					    <button type='button' class='close' data-dismiss='alert'>&times;
					    </button><strong class='mr-2'>".ALERT_ERROR."</strong>".ALERT_ERROR_SIN_STOCK."</div>";
			}
		}	
	}




}

?>