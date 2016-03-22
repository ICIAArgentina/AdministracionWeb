<?php
class BackendView extends TwigView { //FALTA VER PARAMETRO
    public function show($recursos) {
        //Realizamos la renderizacion llamando el metodo render de la clase con los parametros necesarios
        echo self::getTwig()->render('backend.html.twig', array('recursos' => $recursos));
    }
}
