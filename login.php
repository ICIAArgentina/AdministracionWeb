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
if(isset($_SESSION["username"])){ //verificar si es asi - Si entras por la url
	header('location:backend.php');
}
elseif(isset($_POST["nombre"])){ //si no hay sesion abierta y esta completo el formulario
		//validar en la base de datos usuario
		//si son validas crear variables de session
		$usuario=ResourceController::getInstance()->user($_POST["nombre"], $_POST["password"]);
		if(($usuario->getHabilitado())==1){  //VERIFICAR QUE EXISTA EL USUARIO Y QUE ESTE HABILITADO
			$_SESSION["usuario"]=serialize($usuario);
			header('location:backend.php');
		}else{
			header('location:login.php');
		}
}else{ //si nunca se completo el formulario
	$view=new LoginView();
	$view->show();
}