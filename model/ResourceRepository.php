<?php
/************************************************************************************************************/
/*************************************REPOSITORIO DE RECURSOS DEL SISTEMA************************************/
/************************************************************************************************************/
class ResourceRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
    }

    public function listAll() {
        $mapper = function($row) {
            $resource = new Resource($row['TABLE_SCHEMA'], $row['TABLE_NAME']);
            return $resource;
        };
        $answer = $this->queryList(
                "select TABLE_SCHEMA, TABLE_NAME from information_schema.TABLES where TABLE_TYPE=?;", ['BASE TABLE'], $mapper);
        return $answer;
    }
    //Agregar todas las funciones de consulta sql

    /*---------------------------------------Listados----------------------------------------*/
    public function listarMiembros() {
        $mapper = function($row) {  
            $Miembro = new Miembro($row['idMiembro'], $row['Codigo'], $row['tipoDocumento'],$row['numeroDocumento'], 
            $row['nombre'], $row['apellido'], $row['fechaNacimiento'],$row['sexo'], $row['mail'],
            $row['FaceBook'], $row['direccion'], $row['Telefono1'], $row['Telefono2'], $row['fechaIngreso'],
            $row['fechaEgreso'], $row['fechaAlta'], $row['fechaBautismo'], $row['bautizado'], $row['foto'],
            $row['idIglesia'], $row['idLocalidad'], $row['idBarrio']);
            return $Miembro;
        };
        $answer = $this->queryList(
                "select * from Iglesia.Miembro ;", [''], $mapper);
        return $answer;
    }

    public function getMenu($nivel){
        $mapper = function($row){
            $RecursoMenu = new Menu($row['id'], $row['descripcion'],$row['minRol'],$row['accion']);
            return $RecursoMenu;
        };
        $answer = $this->queryList(
                "select * from Iglesia.Menu where minRol<=? and visible=1;", [$nivel], $mapper);
        return $answer;

    }

    public function listarNMiembrosDesde($cuantos, $pagina) { //listar los Miembros por página
        $mapper = function($row) {  
            $Miembro = new Miembro($row['idMiembro'], $row['Codigo'], $row['tipoDocumento'],$row['numeroDocumento'], 
            $row['nombre'], $row['apellido'], $row['fechaNacimiento'],$row['sexo'], $row['mail'],
            $row['FaceBook'], $row['direccion'], $row['Telefono1'], $row['Telefono2'], $row['fechaIngreso'],
            $row['fechaEgreso'], $row['fechaAlta'], $row['fechaBautismo'], $row['bautizado'], $row['foto'],
            $row['idIglesia'], $row['idLocalidad'], $row['idBarrio']);
            return $Miembro;
        };
        $desde = $pagina*(int)$cuantos;
        $answer = $this->queryListLimit(
                "select * from Iglesia.Miembro order by apellido,nombre ASC LIMIT :cuantos OFFSET :desde ;", $desde, (int)$cuantos, $mapper);
        return $answer;
    }

    /*---------------------------------------Getters----------------------------------------*/
    public function getMiembro($tipoDocumento, $numeroDocumento) {
        $mapper = function($row) {
            $Miembro = new Miembro($row['idMiembro'], $row['Codigo'], $row['tipoDocumento'],$row['numeroDocumento'], 
            $row['nombre'], $row['apellido'], $row['fechaNacimiento'],$row['sexo'], $row['mail'],
            $row['FaceBook'], $row['direccion'], $row['Telefono1'], $row['Telefono2'], $row['fechaIngreso'],
            $row['fechaEgreso'], $row['fechaAlta'], $row['fechaBautismo'], $row['bautizado'], $row['foto'],
            $row['idIglesia'], $row['idLocalidad'], $row['idBarrio']);
            return $Miembro;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.Miembro where tipoDocumento=? and numeroDocumento=?;", [$tipoDocumento, $numeroDocumento], $mapper);
        return $answer;
    }

    public function getConfiguracion() {
        $mapper = function($row) {
            $resource = new Configuracion($row['id'], $row['titulo'], $row['descripcion'], $row['email'], $row['cantItems'], $row['habilitado'], $row['mensajeDeshabilitado']);
            return $resource;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.Configuracion where id=?;", ['1'], $mapper);
        return $answer;
    } 

    public function getUsuario($username, $password){
        $mapper = function($row) {
            $resource = new Usuario($row['idUsuario'], $row['idMiembro'], $row['idTipoUsuario'], $row['username'], $row['password'], $row['habilitado']);
            return $resource;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.Usuario where username=? and password=?;", [$username, $password], $mapper);
        return $answer;
    }

    public function getUsuarioPorId($id){
        $mapper = function($row) {
            $resource = new Usuario($row['idUsuario'], $row['idMiembro'], $row['idTipoUsuario'], $row['username'], $row['password'], $row['habilitado']);
            return $resource;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.Usuario where idUsuario=?;", [$id], $mapper);
        return $answer;
    }

    public function getMiembroPorId($id){
        $mapper = function($row) {
            $Miembro = new Miembro($row['idMiembro'], $row['Codigo'], $row['tipoDocumento'],$row['numeroDocumento'], 
            $row['nombre'], $row['apellido'], $row['fechaNacimiento'],$row['sexo'], $row['mail'],
            $row['FaceBook'], $row['direccion'], $row['Telefono1'], $row['Telefono2'], $row['fechaIngreso'],
            $row['fechaEgreso'], $row['fechaAlta'], $row['fechaBautismo'], $row['bautizado'], $row['foto'],
            $row['idIglesia'], $row['idLocalidad'], $row['idBarrio']);
            return $Miembro;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.Miembro where id=?;", [$id], $mapper);
        return $answer;
    }

    public function getNivel($idTipoUsuario){
        $mapper = function($row) {
            $resource = new TipoUsuario($row['idTipoUsuario'], $row['Descripcion'], $row['Codigo'], $row['Funcion'], $row['nivel']);
            return $resource;
        };
        $answer = $this->queryItem(
                "select * from Iglesia.tipoUsuario where idTipoUsuario=?;", [$idTipoUsuario], $mapper);
        return $answer;
    }

    /*---------------------------------------Alta----------------------------------------*/ 
    public function altaUsuario($idMiembro, $idTipoUsuario, $username, $password, $habilitado){
        $this->querySinReturn(
                "insert into Iglesia.Usuario (idMiembro, idTipoUsuario, username, password, habilitado) values (?, ?, ?, ?, ?);", [$idMiembro, $idTipoUsuario, $username, $password, $habilitado]);
    }

    public function altaMiembro($Codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, 
        $fechaNacimiento, $sexo, $mail, $FaceBook, $direccion, $Telefono1, $Telefono2,
        $fechaIngreso, $fechaEgreso, $fechaAlta, $fechaBautismo, $bautizado, $foto, $idIglesia,
        $idLocalidad, $idBarrio){
        $this->querySinReturn(
                "insert into Iglesia.Miembro (Codigo, tipoDocumento, numeroDocumento, nombre, apellido, 
        fechaNacimiento, sexo, mail, FaceBook, direccion, Telefono1, Telefono2,
        fechaIngreso, fechaEgreso, fechaAlta, fechaBautismo, bautizado, foto, idIglesia,
        idLocalidad, idBarrio) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);", 
        [$Codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, 
        $fechaNacimiento, $sexo, $mail, $FaceBook, $direccion, $Telefono1, $Telefono2,
        $fechaIngreso, $fechaEgreso, $fechaAlta, $fechaBautismo, $bautizado, $foto, $idIglesia,
        $idLocalidad, $idBarrio]);
    }

   /*---------------------------------------Baja----------------------------------------*/
    public function bajaMiembro($id) {
        $this->querySinReturn(
                "delete from Iglesia.Miembro where idMiembro=?;", [$id]);
    } 

    public function bajaUsuario($id){
        $this->querySinReturn(
                "delete from Iglesia.Usuario where id=?;", [$id]);
    }

    /*---------------------------------------Modificacion----------------------------------------*/
    public function modificarMiembro($Codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, 
        $fechaNacimiento, $sexo, $mail, $FaceBook, $direccion, $Telefono1, $Telefono2,
        $fechaIngreso, $fechaEgreso, $fechaAlta, $fechaBautismo, $bautizado, $foto, $idIglesia,
        $idLocalidad, $idBarrio) {
        $this->querySinReturn(
                "UPDATE Iglesia.Miembro set Codigo=?, tipoDocumento=?, numeroDocumento=?, nombre=?, apellido=?, 
        fechaNacimiento=?, sexo=?, mail=?, FaceBook=?, direccion=?, Telefono1=?, Telefono2=?,
        fechaIngreso=?, fechaEgreso=?, fechaAlta=?, fechaBautismo=?, bautizado=?, foto=?, idIglesia=?,
        idLocalidad=?, idBarrio=?;", 
        [$Codigo, $tipoDocumento, $numeroDocumento, $nombre, $apellido, 
        $fechaNacimiento, $sexo, $mail, $FaceBook, $direccion, $Telefono1, $Telefono2,
        $fechaIngreso, $fechaEgreso, $fechaAlta, $fechaBautismo, $bautizado, $foto, $idIglesia,
        $idLocalidad, $idBarrio]);
    }

    public function modificarIglesia($idIglesia, $idPastor, $idPastora, $Nombre, $direccion, $telefono, $EMail, $FaceBook) {
        $this->querySinReturn(
                "UPDATE Iglesia.Iglesia SET idPastor = ?, idPastora = ?, Nombre = ?, direccion = ?, telefono = ?, EMail = ?, FaceBook = ? WHERE idIglesia = ?;", 
        [$idPastor, $idPastora, $Nombre, $direccion, $telefono, $EMail, $FaceBook, $idIglesia]);
    }   

    public function modificarUsuario($id, $password, $idTipoUsuario, $habilitado){
        $this->querySinReturn(
                "UPDATE Iglesia.Usuario SET password = ?, habilitado = ?, idRol = ? WHERE idUsuario = ?;", [$password, $habilitado, $idTipoUsuario, $id]);
    }
    /*------------------------------------------Validaciones----------------------------------------*/
    public function usuarioValido($username,$password) {
        return $this->validar(
                "SELECT COUNT(*) AS cantidad from Iglesia.Usuario where username=? AND password=? and habilitado=1;", [$username,$password]);
    }
    public function usuarioExistente($username) {
        return $this->validar(
                "SELECT COUNT(*) AS cantidad from Iglesia.Usuario where username=?;", [$username]);
    }
    public function MiembroExistente($tipoDocumento,$numeroDocumento) {
        return $this->validar(
                "SELECT COUNT(*) AS cantidad from Iglesia.Miembro where tipoDocumento=? AND numeroDocumento=?;", [$tipoDocumento,$numeroDocumento]);
    }
    public function tienePermisos($id, $accion){
        return $this->validar(
                "SELECT COUNT(*) AS cantidad from Usuario where (id=?)and(idTipoUsuario in (select R.nivel from Acciones A inner join Rol R on(R.nivel>=A.MinRol) where (A.accion=?)));", [$id, $accion]);       
    }
    public function tienePermisosSeccion($id, $seccion){
        return $this->validar(
                "SELECT COUNT(*) AS cantidad from Usuario where (id=?)and(idTipoUsuario in (select R.nivel from Menu M inner join Rol R on(R.nivel>=M.MinRol) where (M.accion=?)));", [$id, $seccion]);       
    }
    public function contarItems($tabla) {
            return $this->validar(
                "SELECT COUNT(*) AS cantidad from Iglesia.".$tabla.";",[] );
    }
    public function ContarItemsPorCampo($tabla, $campo, $valor) {
            return $this->validar(
                "SELECT COUNT(*) AS cantidad from Iglesia.".$tabla." WHERE ".$campo."=?;",[$valor] );
    }

}