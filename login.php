<?php
session_start(); //Iniciicaimaomos variables de sesion
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require_once('controller/ResourceController.php');
require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/Resource.php');
require_once('view/TwigView.php');
require_once('view/SimpleResourceList.php');
require_once('view/LoginView.php');
//VERIFICAR SI ES ASI - SI ENTRAS POR LA URL
if(isset($_SESSION["username"])){
	header('location:backend.php');
}
//SI NO HAY SESION ABIERTA Y ESTA COMPLETO EL FORMULARIO
elseif(isset($_POST["nombre"])){ 
		//VALIDAR EN LA BASE DE DATOS USUARIO SI SON VALIDAS CREAR VARIABLES DE SESSION
		$usuario=ResourceController::getInstance()->user($_POST["nombre"], $_POST["password"]);
		//VERIFICAR QUE EXISTA EL USUARIO Y QUE ESTE HABILITADO
		if(($usuario->getHabilitado())==1){  
			$_SESSION["usuario"]=serialize($usuario);
			header('location:backend.php');
		}else{
			header('location:login.php');
		}
//SI NUNCA SE COMPLETO EL FORMULARIO
}else{ 
	$view=new LoginView();
	$view->show();
}