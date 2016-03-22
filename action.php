<?php
session_start(); //verificar si es asi
//ini_set('display_startup_errors',1);
//ini_set('display_errors',1);
//error_reporting(-1);
require_once('controller/ResourceController.php');
require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/Resource.php');
require_once('view/TwigView.php');
require_once('view/SimpleResourceList.php');
require_once('view/Home.php');
if(isset($_SESSION["usuario"])){ 			// verficamos que la variable de sesion haya sido creada
	$usuario=unserialize($_SESSION["usuario"]); 		// buscamos el valor de sesion de usuario
 	if(ResourceRepository::getInstance()->usuarioValido($usuario->getUsername(),$usuario->getPassword())) { 			// verificamos que el usuario este habilitado y el password sea correcto
		if(isset($_POST["accion"])){
			$accion=$_POST["accion"];
		}
		else
		{ 
			if (isset($_GET["accion"])) { 
				$accion=$_GET["accion"]; 
			} 
			else 
			{ 
				$accion="Principal";
			}	
		}
		if($accion !== null){
			if(ResourceRepository::getInstance()->tienePermisos($usuario->getId(), $accion)) { //validacion de accion
				switch ($accion) {
			        case "AgregarUsuario":
			        	$AltaUsername=$_POST["usuario"];
			        	$AltaPassword=$_POST["clave"];
			        	$AltaNivel=$_POST["idRol"];
			        	if(ResourceRepository::getInstance()->usuarioExistente($AltaUsername)) {
			            	header('location:backend.php?seccion=AgregarUsuario&mensaje=existe');			        		
			        	} else {
			        	ResourceRepository::getInstance()->altaUsuario($AltaUsername, $AltaPassword,1 , $AltaNivel);
			            header('location:backend.php?seccion=ABMUsuarios');
			        	}
			            break;
			        case "ModificarUsuario":
			        	$id=$_POST["id"];
			        	$ModPassword=$_POST["clave"];
			        	$ModNivel=$_POST["idRol"];
			        	$ModHabilitado=$_POST["habilitado"];
			        	ResourceRepository::getInstance()->modificarUsuario($id, $ModPassword, $ModNivel , $ModHabilitado);
			            header('location:backend.php?seccion=ABMUsuarios');
			            break;
			        case "EliminarUsuario":
			        	$BajaID=$_GET["id"];
			        	ResourceRepository::getInstance()->bajaUsuario($BajaID);
			            header('location:backend.php?seccion=ABMUsuarios');
			            break;
			        case "AgregarAlumno":
			        	$AltaTipoDocumento=$_POST["tipoDoc"];
			        	$AltaNumeroDocumento=$_POST["dni"];
			        	$AltaNombre=$_POST["nombre"];
			        	$AltaApellido=$_POST["apellido"];
			        	$AltaFechaNac=$_POST["fechaNac"];
			        	$AltaSexo=$_POST["sexo"];
			        	$AltaMail=$_POST["mail"];
			        	$AltaDireccion=$_POST["direccion"];
			        	$AltaFechaIngreso=$_POST["fechaIng"];
			        	$AltaFechaEgreso=$_POST["fechaEgreso"];
			        	$AltaFechaAlta=date("Y-m-d");
			        	if(ResourceRepository::getInstance()->alumnoExistente($AltaTipoDocumento,$AltaNumeroDocumento)) {
			            	header('location:backend.php?seccion=AgregarAlumno&mensaje=existe');			        		
			        	} else {
			        	ResourceRepository::getInstance()->altaAlumno($AltaTipoDocumento, $AltaNumeroDocumento, $AltaNombre, $AltaApellido, $AltaFechaNac, $AltaSexo, $AltaMail, $AltaDireccion, $AltaFechaIngreso, $AltaFechaEgreso, $AltaFechaAlta);
			            header('location:backend.php?seccion=ABMAlumnos');
			        	}
			        	break;
			        case "ModificarAlumno":
			        	$id=$_POST["id"];
			        	$tipoDocumento=$_POST["tipoDocumento"];
			        	$numeroDocumento=$_POST["dni"];
			        	$nombre=$_POST["nombre"];
			        	$apellido=$_POST["apellido"];
			        	$fechaNac=$_POST["fechaNac"];
			        	$sexo=$_POST["sexo"];
			        	$mail=$_POST["mail"];
			        	$direccion=$_POST["direccion"];
			        	$fechaIngreso=$_POST["fechaIng"];
			        	$fechaEgreso=$_POST["fechaEgreso"];
			        	ResourceRepository::getInstance()->modificarAlumno($tipoDocumento, $numeroDocumento, $nombre, $apellido, $fechaNac, $sexo, $mail, $direccion, $fechaIngreso, $fechaEgreso, $id);
			            header('location:backend.php?seccion=ABMAlumnos');
			            break;
			        case "EliminarAlumno":
			        	$BajaID=$_GET["id"];
			        	ResourceRepository::getInstance()->bajaAlumno($BajaID);
			            header('location:backend.php?seccion=ABMAlumnos');
			            break;
			        case "Principal":
			             header('location:backend.php');
			            break;
			        case "Listados":
			            echo "TO DO";
			            break;
			        case "Configuracion":
			        	$titulo=$_POST["titulo"];
			        	$descripcion=$_POST["descripcion"];
			        	$email=$_POST["email"];
			        	$cantItems=$_POST["cantItems"];
			        	$habilitado=$_POST["habilitado"];
			        	$mensajeDeshabilitado=$_POST["mensajeDeshabilitado"];
			        	ResourceRepository::getInstance()->modificarConfiguracion($titulo, $descripcion, $email, $cantItems, $habilitado, $mensajeDeshabilitado);
			            header('location:backend.php?seccion=Configuracion');
			            break;
					}
			}
		}
    }
}