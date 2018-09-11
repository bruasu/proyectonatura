<?php

class Categoria{
	private $db;

	public function __construct(){
		$this->db=new Base;
	}

	public function obtenerCategorias(){
		$this->db->query("select * from categorias");
		return $this->db->registros();
	}
	public function addCategoria($datos){
		$this->db->query("INSERT INTO categorias (nombre) VALUE (:nombre)");
		$this->db->bind(':nombre',$datos['nombre_categoria']);
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}
	public function modificarCategoria($datos){
		$this->db->query("UPDATE categorias SET nombre = :nombre where id_categoria= :id");
		$this->db->bind(':id',$datos['id_categoria']);
		$this->db->bind(':nombre',$datos['nombre_modificar']);	
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}
	public function borrarCategoria($datos){
		$this->db->query("DELETE FROM categorias WHERE id_categoria= :id");
		$this->db->bind(':id',$datos['id_categoria']);
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}

}


?>