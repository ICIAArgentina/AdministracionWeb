<?php
/************************************************************************************************************/
/*************************************REPOSITORIO DE OBJETOS DEL SISTEMA*************************************/
/************************************************************************************************************/

class Resource {
    
    private $name;
    private $url;
    
    public function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return $this->url;
    }
}

class Miembro {
    private $idMiembro;
    private $codigo;
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $sexo;
    private $eMail;
    private $facebook;
    private $direccion;
    private $telefono1;
    private $telefono2;
    private $fechaIngreso;
    private $fechaEgreso;
    private $fechaAlta;
    private $fechaBaustismo;
    private $bautizado;
    private $idLocalidad;
    private $idBarrio;
    
    public function __construct($idMiembro, $codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, $fechaNacimiento, $sexo, $eMail, $facebook,
        $direccion, $telefono1, $telefono2, $fechaIngreso, $fechaEgreso, $fechaAlta, $bautizado, $fechaBaustismo,
        $foto, $idIglesia, $idLocalidad, $idBarrio) {
        $this->idMiembro = $idMiembro;
        $this->codigo = $codigo;        
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->eMail = $eMail;
        $this->facebook = $facebook;
        $this->direccion = $direccion;
        $this->telefono1 = $telefono1;
        $this->telefono2 = $telefono2;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaEgreso = $fechaEgreso;
        $this->fechaAlta = $fechaAlta;
        $this->fechaBaustismo = $fechaBaustismo;
        $this->bautizado = $bautizado;
        $this->foto = $foto;
        $this->idIglesia = $idIglesia;
        $this->idBarrio = $idBarrio;
        $this->idLocalidad = $idLocalidad;
    }

    public function getId() {
        return $this->idMiembro;
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
    public function getSexo() {
        return $this->sexo;
    }
    public function getFacebook() {
        return $this->facebook;
    }
    public function getEMail() {
        return $this->eMail;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getTelefono1() {
        return $this->telefono1;
    }
    public function getTelefono2() {
        return $this->telefono2;
    }
    public function getFechaIngreso() {
        return $this->fechaIngreso;
    }
    public function getFechaEgreso() {
        return $this->fechaEgreso;
    }
    public function getFechaAlta() {
        return $this->fechaAlta;
    }
    public function getFechaBautismo() {
        return $this->fechaBaustismo;
    }
    public function getBautizado() {
        return $this->bautizado;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function getIdIglesia() {
        return $this->idIglesia;
    }
    public function getIdBarrio() {
        return $this->idBarrio;
    }
    public function getIdLocalidad() {
        return $this->idLocalidad;
    }
}

class Usuario {
    private $idUsuario;
    private $idMiembro;
    private $idTipoUsuario;
    private $username;
    private $password;
    private $habilitado;
 
    public function __construct($idUsuario, $idMiembro, $idTipoUsuario, $username, $password, $habilitado) {
        $this->idUsuario = $idUsuario;
        $this->idMiembro = $idMiembro;
        $this->idTipoUsuario = $idTipoUsuario;
        $this->username = $username;
        $this->password = $password;
        $this->habilitado = $habilitado;
    }
    public function getId() {
        return $this->idUsuario;
    }
    public function getIdMiembro() {
        return $this->idMiembro;
    }
    public function getIdTipoUsuario() {   
        return $this->idTipoUsuario;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getHabilitado() {
        return $this->habilitado;
    }
}

class Iglesia{
    private $idIglesia;
    private $idPastor;
    private $idPastora;
    private $nombre;
    private $direccion;
    private $telefono;
    private $eMail;
    private $facebook;

    public function __construct($idIglesia, $idPastor, $idPastora, $nombre, $direccion, $telefono, $eMail, $facebook){
        $this->idIglesia = $idIglesia;
        $this->idPastor = $idPastor;
        $this->idPastora = $idPastora;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->facebook = $facebook;
    }

    public function getId(){
        return $this->idIglesia;
    }

    public function getIdPastor(){
        return $this->idPastor;
    }

    public function getIdPastora(){
        return $this->idPastora;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getEmail(){
        return $this->eMail;
    }

    public function getFacebook(){
        return $this->facebook;
    }
}


class Menu {
    private $id;
    private $descripcion;
    private $minRol;
    private $accion;
    public function __construct($id, $descripcion, $minRol, $accion) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->minRol = $minRol;
        $this->accion = $accion;
    }
    public function getId() {
        return $this->id;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getminRol() {
        return $this->minRol;
    }
    public function getAccion() {
        return $this->accion;
    }
}

class Configuracion {
    private $id;
    private $titulo;
    private $descripcion;
    private $email;
    private $cantItems;
    private $habilitado;
    private $mensajeDeshabilitado;

    public function __construct($id, $titulo, $descripcion, $email, $cantItems, $habilitado, $mensajeDeshabilitado) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->email = $email;
        $this->cantItems = $cantItems;
        $this->habilitado = $habilitado;
        $this->mensajeDeshabilitado = $mensajeDeshabilitado;
    }
    public function getId() {
        return $this->id;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getCantItems() {
        return $this->cantItems;
    }
    public function getHabilitado() {
        return $this->habilitado;
    }
    public function getMensajeDeshabilitado() {
        return $this->mensajeDeshabilitado;
    }
}

class TipoUsuario {
    private $idTipoUsuario;
    private $descripcion;
    private $codigo;
    private $funcion;
    private $nivel;

    public function __construct($idTipoUsuario, $descripcion, $codigo, $funcion, $nivel) {
        $this->id = $idTipoUsuario;
        $this->descripcion = $descripcion;
        $this->codigo = $codigo;
        $this->funcion = $funcion;
        $this->nivel = $nivel;
    }
    
    public function getId() {
        return $this->id;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    public function getFuncion(){
        return $this->funcion;
    }
    public function getNivel(){
        return $this->nivel;
    }
}