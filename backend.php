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
	$usuario=unserialize($_SESSION["usuario"]); 		// buscamos el valor de sesion de usuario
 	if(ResourceRepository::getInstance()->usuarioValido($usuario->getUsername(),$usuario->getPassword())) { 			// verificamos que el usuario este habilitado y el password sea correcto
 		$configuracion = ResourceRepository::getInstance()->getConfiguracion();// Buscamos configuracion del swf_oncondition(transition)
 		$seccion = $_GET["seccion"];
	    ResourceController::getInstance()->backend($seccion, 0, $usuario, $configuracion); //cargar el inicio      
	} else { header('location:login.php');	}
}  else {
	header('location:login.php');
}
die('A ver si anda');