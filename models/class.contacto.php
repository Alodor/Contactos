<?php
require_once '../config/connection.php';

class Contacto {
    
    private $pdo;    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->StartUp();
		$this->pdo = $db;        
    }
    
        
    public function Listar() {
        
        try {
            
            $sql = "SELECT id_contacto, nombre, apellido FROM contacto ORDER BY id_contacto DESC LIMIT 5";      
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    
    public function Crear($nombre, $apellido, $alias, $telefono1, $telefono2, $email1, $email2, $grupo) {
        
        try {
            
            $sql = "SELECT nombre, apellido, telefono1 FROM contacto 
                    WHERE nombre = ?
                    AND apellido = ?
                    AND telefono1 = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($nombre,
                                $apellido,
                                $telefono1
            ));
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
            if (($row['nombre'] != $nombre) && ($row['apellido'] != $apellido) && ($row['telefono1'] != $telefono1)) {
                
                $sql = "INSERT INTO contacto (
                                            nombre, 
                                            apellido, 
                                            alias, 
                                            telefono1, 
                                            telefono2, 
                                            email1, 
                                            email2, 
                                            grupo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                            $nombre,
                            $apellido,
                            $alias,
                            $telefono1,
                            $telefono2,
                            $email1,
                            $email2,
                            $grupo
                ));
                return true;
                
            } else {
                return false;
            }
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
    
    
    public function Obtener($id) {
        
        try {
            
            $sql = "SELECT * FROM contacto WHERE id_contacto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }      
        
    }
    
    
    public function Editar($nombre, $apellido, $alias, $telefono1, $telefono2, $email1, $email2, $grupo, $id) {
        
        try {
            
            $sql = "UPDATE contacto SET
                                nombre = ?, 
                                apellido = ?, 
                                alias = ?, 
                                telefono1 = ?, 
                                telefono2 = ?,
                                email1 = ?,
                                email2 = ?,
                                grupo = ?
                                WHERE id_contacto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(                        
                        $nombre,
                        $apellido,
                        $alias,                        
                        $telefono1,                        
                        $telefono2,  
                        $email1,
                        $email2,
                        $grupo,
                        $id
            ));
            return true;
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    
    public function Eliminar($id) {
        
        try {
            
            $sql = "DELETE FROM contacto WHERE id_contacto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    
    public function Buscar($valor) {
        
        try {
            
            $sql = "SELECT id_contacto, nombre, apellido, alias, telefono1, telefono2 
                    FROM contacto WHERE 
                    nombre LIKE '%".$valor."%' 
                    OR apellido LIKE '%".$valor."%' 
                    OR alias LIKE '%".$valor."%'
                    OR telefono1 LIKE '%".$valor."%'
                    OR telefono2 LIKE '%".$valor."%'    
                    ORDER BY id_contacto DESC LIMIT 5";            
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
}