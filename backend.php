<?php
session_start(); //verificar si es asi
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once('controller/ResourceController.php');
require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/Resource.php');
require_once('view/TwigView.php');
require_once('view/SimpleResourceList.php');
require_once('view/Home.php');
//VERIFICAMOS QUE LA VARIABLE DE SESION HAYA SIDO CREADA
if(isset($_SESSION["usuario"])){
	// BUSCAMOS EL VALOR DE SESION DE USUARIO
	$usuario=unserialize($_SESSION["usuario"]);	
	// VERIFICAMOS QUE EL USUARIO ESTE HABILITADO Y EL PASSWORD SEA CORRECTO
 	if(ResourceRepository::getInstance()->usuarioValido($usuario->getUsername(),$usuario->getPassword())) {
 		$configuracion = ResourceRepository::getInstance()->getConfiguracion();
 		if(isset($_GET['seccion'])){
 			$seccion=$_GET['seccion'];
 			switch ($seccion) {
 				case 'ListadoMiembros':
		 			$listaMiembros=ResourceRepository::getInstance()->listarMiembros();
		 			$datosSeccion=array('listaMiembros' => $listaMiembros, 'pagina' => 1, 'cantPaginas' => 1);
 					break;
 				case 'ModificarMiembro':
 					$datosSeccion=ResourceRepository::getInstance()->getMiembroPorId($_GET['id']);
 					break;
  				case 'ABMMiembros':
  					$listaMiembros=ResourceRepository::getInstance()->listarMiembros();
		 			$datosSeccion=array('listaMiembros' => $listaMiembros, 'pagina' => 1, 'cantPaginas' => 1);
 					break;
 				default:
		 			$datosSeccion=0;
 					break;
 			}
 		}
 		else{
 			$seccion="Principal";
 			$datosSeccion=0;
 		}
 		//CARGAR LA SECCIÓN CORRESPONDIENTE
	    ResourceController::getInstance()->backend($seccion, $datosSeccion, $usuario, $configuracion);
	} else { header('location:login.php');	}
}  else {
	header('location:login.php');
}