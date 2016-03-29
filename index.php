<?php
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
$configuracion = ResourceRepository::getInstance()->getConfiguracion();
if ( $configuracion->getHabilitado() ){
	if(isset($_GET["seccion"])){
		//CARGAR LA SECCION
		ResourceController::getInstance()->home($_GET["seccion"]);
	}else{
		//CARGAR EL INICIO
    	ResourceController::getInstance()->home("Principal");
	}
}
else
{
	ResourceController::getInstance()->home("deshabilitado");
}
?>




