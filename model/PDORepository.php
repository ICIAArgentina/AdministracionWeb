<?php

/************************************************************************************************************/
/*************************************REPOSITORIO DE OBJETOS DEL SISTEMA*************************************/
/************************************************************************************************************/

abstract class PDORepository {
    
    const USERNAME = "grupo_31";
    const PASSWORD = "wPjHCzsvKWQ6qCMT";
	const HOST ="localhost";
	const DB = "Iglesia";
    
    
    private function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
        return $connection;
    }
    
    protected function queryList($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }
    protected function queryListLimit($sql, $desde, $cuantos, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':desde', $desde, PDO::PARAM_INT);
        $stmt->bindParam(':cuantos', $cuantos, PDO::PARAM_INT);
        $stmt->execute();
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }
    protected function queryListLimitID($sql, $id, $desde, $cuantos, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':desde', $desde, PDO::PARAM_INT);
        $stmt->bindParam(':cuantos', $cuantos, PDO::PARAM_INT);
        $stmt->execute();
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        return $list;
    }
    protected function queryItem($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $mapper($stmt->fetch());
    }
    protected function querySinReturn($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
    }

    function validar($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetch()['cantidad'];
    }


}
