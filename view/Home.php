<?php
class HomeView extends TwigView {
    public function show($recursos,$seccion) {
        //REALIZAMOS LA RENDERIZACION LLAMANDO EL METODO RENDER DE LA CLASE CON LOS PARAMETROS NECESARIOS
        echo self::getTwig()->render($seccion, array('recursos' => $recursos));
    }
}
