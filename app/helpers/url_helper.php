<?php

	//para redirecionar la página
	function redireccionar($pagina){
		header('location:'.RUTA_URL.$pagina);
	}

	/*************** RETORNA PARAMETRO URL **************/

	function Globalparametros(){
		$iniciarCore=new Parametros();
		$parametro=$iniciarCore->parametros;
		unset($iniciarCore);
		return $parametro;
	}

	class Parametros{		
		public $parametros =[];

		//Constructor		
		public function __construct(){
			$url = $this->getUrl();							
			unset($url[0]);
			unset($url[1]);				
			$this->parametros=$url ? array_values($url) : [];
			
		}

		public function getUrl(){
			//echo $_GET['url'];
			if (isset($_GET['url'])) {
				$url=rtrim($_GET['url'],''); //elimina los espacion en el final
				//$url=filter_var($url, FILTER_SANITIZE_URL); //leido como un url
				$url=explode('/',$url);//pasamo un limitador
				return $url;

			}
		}
	}
	/*****************************************************/

	/*************** STATUS DE UN PRODUCTO *****************/


?>