<?php
	
	//Clase controlador Principal
	//Se encarga de cargar los modelos y las vistas

	class Controlador{
		
		//cargar modelo
		public function modelo($modelo){
			//carga modelo
			require_once '../app/modelos/'.$modelo.'.php';
			//Instanciar el modelo
			return new $modelo();
		}

		//cargar vista
		public function vista($vista,$datos=[]){
			//chequear si el archivo vista existe
			if (file_exists('../app/vistas/'.$vista.'.php')) {
				require_once '../app/vistas/'.$vista.'.php';
			}else{
				//si el archivo de la vista no existe
				die('la vista no existe');
			}
		}


	}


?>