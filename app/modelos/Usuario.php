<?php

class Usuario{
	private $db;

	public function __construct(){
		$this->db=new Base;
	}

	public function obtenerUsuarios(){
		$this->db->query("select * from usuarios");
		return $this->db->registros();
	}
	public function obtenerUsuario_id($id){
		$this->db->query("select * from usuarios where id_usuario=:id");
		$this->db->bind(':id',$id);
		return $this->db->registro();
	}
	public function obtenerUsuario_Nombre($nombre){
		$this->db->query("select * from usuarios where nombre=:nombre");
		$this->db->bind(':nombre',$nombre);
		return $this->db->registro();
	}

}


?>