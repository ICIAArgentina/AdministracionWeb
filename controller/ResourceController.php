<?php

/************************************************************************************************************/
/******************************************CONTROLADOR DE RECURSOS*******************************************/
/************************************************************************************************************/
/******************************************@author Ricardo Gamarra*******************************************/

class ResourceController {
    
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
    }
    
    public function listResources(){
        $resources = ResourceRepository::getInstance()->listAll();
        $view = new SimpleResourceList();
        $view->show($resources);
    }

    public function listarMiembros(){
        $resources = ResourceRepository::getInstance()->listarMiembros();
        $view = new SimpleResourceList();
        $view->showMiembros($resources);
    }
    
    public function home($seccion){
        $configuracion = ResourceRepository::getInstance()->getConfiguracion();
        $titulo = $configuracion->getTitulo();
        $email = $configuracion->getEmail();
        $seccion = 'index/'.$seccion.'.twig';
        $view = new HomeView();
        $view->show($configuracion,$seccion);  //todos los parametros son objetos de tipo recursoConfiguracion, no un string
    }
    
    public function user($username, $password){
       return ResourceRepository::getInstance()->getUsuario($username, $password);
    }

    public function backend($seccion, $datosSeccion, $usuario, $configuracion){
        $idTipoUsuario = ResourceRepository::getInstance()->getNivel($usuario->getIdTipoUsuario());
        $menu = ResourceRepository::getInstance()->getMenu($idTipoUsuario->getNivel());
        $seccion = 'backend/'.$seccion.'.twig';
        //$recursos contendra los elementos dinamicos que twig debe renderizar dentro de template index
        $recursos = array('configuracion'=>$configuracion,'datosSeccion'=>$datosSeccion,'menu'=>$menu, 'username'=>$usuario->getUsername());
        $view = new HomeView();
        $view->show($recursos, $seccion);  //todos los parametros son objetos de tipo recursoConfiguracion, no un string
    }

}
