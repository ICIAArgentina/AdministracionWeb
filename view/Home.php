<?php
class HomeView extends TwigView {
    public function show($recursos,$seccion) {
        //Realizamos la renderizacion llamando el metodo render de la clase con los parametros necesarios
        echo self::getTwig()->render($seccion, array('recursos' => $recursos));
    }
}
