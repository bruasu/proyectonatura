<?php

class Producto{
	private $db;

	public function __construct(){
		$this->db=new Base;
	}

	public function obtenerProductos(){
		$this->db->query("select * from productos");
		return $this->db->registros();
	}
	public function addProducto(){

	}
	public function modificarProducto(){

	}
	public function borrarCategoria(){

	}
	public function modificarStatus($datos){
		$this->db->query("UPDATE productos SET status=:status where id_producto=:id");
		$this->db->bind(':id',$datos['id_producto']);
		$this->db->bind(':status',$datos['status']);	
		if ($this->db->execute()) {
			return true;
		}else{
			return false;
		}
	}


}

?>