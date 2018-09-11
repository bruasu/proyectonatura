<?php

class Paginas extends Controlador{

	public function __construct(){
		$this->articuloModelo=$this->modelo('Usuario');
		//echo "Paginas Caragadas";
	}
	public function index(){		
		$this->inicioAdmin();
	}
	public function usuarios(){
		$datos=[];
		$this->vista('paginas/usuarios',$datos);
	}
	public function inicioAdmin(){
		$datos=[];
		$this->vista('paginas/inicioAdmin',$datos);
	}
	public function categorias(){
		$datos=[];
		$this->vista('admin/categorias',$datos);
	}
	public function productos(){
		$datos=[];
		$this->vista('admin/productos',$datos);
	}
	
}

?>