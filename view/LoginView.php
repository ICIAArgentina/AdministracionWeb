<?php
class LoginView extends TwigView {
    public function show() {
        //Realizamos la renderizacion llamando el metodo render de la clase con los parametros necesarios
        echo self::getTwig()->render('login.html.twig');
    }
}
