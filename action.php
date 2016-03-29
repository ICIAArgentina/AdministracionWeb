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
// VERFICAMOS QUE LA VARIABLE DE SESION HAYA SIDO CREADA
if(isset($_SESSION["usuario"])){
	// BUSCAMOS EL VALOR DE SESION DE USUARIO
	$usuario=unserialize($_SESSION["usuario"]);
	// VERIFICAMOS QUE EL USUARIO ESTE HABILITADO Y EL PASSWORD SEA CORRECTO
 	if(ResourceRepository::getInstance()->usuarioValido($usuario->getUsername(),$usuario->getPassword())) {
		if(isset($_POST["accion"])){
			$accion=$_POST["accion"];
		}
		else
		{ 
			if (isset($_GET["accion"])) { $accion=$_GET["accion"]; } 
			else { $accion="Principal"; }	
		}
		if($accion !== null){
			//VALIDACIÓN DE ACCIÓN (QUE TENGA PERMISOS)
			if(ResourceRepository::getInstance()->tienePermisos($usuario->getId(), $accion)) {
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
			        case "AgregarMiembro":
			        	$Codigo=$_POST["codigo"];
			        	$NumeroDocumento=$_POST["dni"];
			        	$TipoDocumento=$_POST["tipoDoc"];
			        	$Nombre=$_POST["nombre"];
			        	$Apellido=$_POST["apellido"];
			        	$FechaNac=$_POST["fechaNac"];
			        	$Sexo=$_POST["sexo"];
			        	$Mail=$_POST["mail"];
			        	$Facebook=$_POST["facebook"];			       
			        	$Direccion=$_POST["direccion"];
			        	$Telefono1=$_POST["telefono1"];
			        	$Telefono2=$_POST["telefono2"];
			        	$FechaIngreso=$_POST["fechaIng"];
			        	$Bautizado=$_POST["bautizado"];
			        	$FechaBautismo=$_POST["fechaBautismo"];			        	
			        	$foto=$_POST["foto"];
			        	$idIglesia=$_POST["idIglesia"];
			        	$idLocalidad=$_POST["idLocalidad"];
			        	$idBarrio=$_POST["idBarrio"];
			        	$FechaAlta=date("Y-m-d");
			        	if(ResourceRepository::getInstance()->miembroExistente($TipoDocumento,$NumeroDocumento)) {
			            	header('location:backend.php?seccion=AgregarMiembro&mensaje=existe');			        		
			        	} else {
			        	ResourceRepository::getInstance()->altaMiembro($Codigo, $TipoDocumento, $NumeroDocumento, $Nombre, $Apellido, $FechaNac, $Sexo, $Mail, $Facebook, $Direccion, $Telefono1, $Telefono2, $FechaIngreso, null, $fechaAlta, $Bautizado, $FechaBautismo, $idIglesia, $idBarrio, $idLocalidad);
			            header('location:backend.php?seccion=ListadoMiembros');
			        	}
			        	break;
			        case "ModificarMiembro":
			        	$id=$_POST["id"];
			        	$codigo=$_POST["codigo"];
			        	$numeroDocumento=$_POST["dni"];
			        	$tipoDocumento=$_POST["tipoDoc"];
			        	$nombre=$_POST["nombre"];
			        	$apellido=$_POST["apellido"];
			        	$fechaNac=$_POST["fechaNac"];
			        	$sexo=$_POST["sexo"];
			        	$eMail=$_POST["mail"];
			        	$faceBook=$_POST["facebook"];			       
			        	$direccion=$_POST["direccion"];
			        	$telefono1=$_POST["telefono1"];
			        	$telefono2=$_POST["telefono2"];
			        	$FechaIngreso=$_POST["fechaIng"];
			        	$fechaEgreso=$_POST["fechaEgr"];			        	
			        	$bautizado=$_POST["bautizado"];
			        	$fechaBautismo=$_POST["fechaBautismo"];			        	
			        	$foto=$_POST["foto"];
			        	$idIglesia=$_POST["idIglesia"];
			        	$idLocalidad=$_POST["idLocalidad"];
			        	$idBarrio=$_POST["idBarrio"];
			        	ResourceRepository::getInstance()->modificarMiembro($codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, $fechaNac, $sexo, $eMail, $faceBook, $direccion, $telefono1, $telefono2, $FechaIngreso, $fechaEgreso, $fechaAlta, $fechaBautismo, $bautizado, $foto, $idIglesia, $idBarrio, $idLocalidad, $id);
			            header('location:backend.php?seccion=ABMMiembros');
			            break;
			        case "EliminarMiembro":
			        	$BajaID=$_GET["id"];
			        	ResourceRepository::getInstance()->bajaMiembro($BajaID);
			            header('location:backend.php?seccion=ABMMiembros');
			            break;
			        case "Principal":
			             header('location:backend.php');
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