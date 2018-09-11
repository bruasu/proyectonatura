<?php
	$Glob_parametros;

	//Configuracion de acceso a la base de datos
	define('DB_HOST','localhost');
	define('DB_USUARIO','root');
	define('DB_PASSWORD','');
	define('DB_NOMBRE','proyectobruno');

	//Ruta de la aplicación	
	define('RUTA_APP',dirname(dirname(__FILE__)));

	//Ruta de la url Ejemplo:http://localhost/MVC/
	define('RUTA_URL','http://localhost/ProyectoBrunoNatBootstrap');

	define('NOMBRESITIO','Precente Natura');
	const NOMBRESITIOADM = 'Administrador';

	const ID = 'ID';
	const SI = 'Si';
	const NO = 'No';
	const NOMBRE = 'Nombre';
	const ACCIONES = 'Acciones';
	const MODIFICAR = 'Modificar';
	const MODIFICADO = 'Modificado';
	const DESCRIPCION = 'Descripción';
	const FOTOS = 'Fotos';
	const BORRAR = 'Borrar';
	const ENVIAR = 'Enviar';
	const AGREGAR = 'Agregar';
	const VOLVER = 'Volver';
	const VALORACTUAL = 'Valor Actual';
	const NUEVOVALOR = 'Nuevo valor';
	const NOMBREASERMODIFICADO= 'Nombre a ser Modificado';
	const BLOQUIADO = 'Bloquiado';
	const ACTIVO = 'Activo';
	const SINSTOCK ='Stock Vacio';

	/********* CATEGORIAS *******/

	const CATEGORIA= 'Categoria';
	const ADDCATEGORIA = 'Agregar categoria';
	const MODCATEGORIA = 'Modificar categoria';
	const MODCATEGORIAEXITO = 'Categoria Modificada con Exito';
	const BORRADAEXITO = 'Categoria Borrada con EXITO';
	const NOMBRECATEGORIA = 'Nombre de la Categoria';
	const ELIMINARCATEGORIA = 'Desea Eliminar la Categoria';

	/********* PRODUCTOS **********/
	const MODIFICARSTATUS= 'Desea Modificar el Status';
	const ESTADOACTUAL = 'Status actual';
	const ELPRODUCTO ='El producto es: ';
	const STATUSMODIFICADO = 'Status Modificado';
	const NUEVOPRODUCTO = 'Nuevo producto';
	const ADDALSTOCK= 'Adicionar al Stock';

	/******** ALERTAS *********/
	const ALERT_AGREGADO = 'Success! ';
	const ALERT_ERROR = 'Error ';

	const ALERT_ADD_SUCCESS = ' Almacenado Correctamente';
	const ALERT_ADD_ERROR= ' Error al Guardar';
	const ALERT_ERROR_SIN_STOCK= 'No se puede modificar Status, Producto sin Stock';

	/*********** COLORES *************/
	const BTNCOLOR = 'btn-primary';
	const BTNCOLORLI = 'btn-outline-primary';
	const BTNCOLORLISUCCESS = 'btn-outline-success';
	const BTNCOLORLIALERT = 'btn-outline-danger';
	const BTNCOLORALERT ='btn-danger';
	const BGCOLOR = 'bg-primary';
	const BGCOLORALERT = 'bg-danger'; //color Rojo para cuando queremos hacer una alerta ej:antes de borrar algo
	const BGCOLOREXITO = 'bg-success';
	const TEXTBLANCO = 'text-white';




?>
