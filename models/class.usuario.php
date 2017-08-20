<?php
require_once '../config/connection.php';

class Usuario {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->StartUp();
		$this->pdo = $db;        
    }
    
    
    public function Registrar($user, $password, $privilegio) {
        
        try {
            
            $sql = "INSERT INTO usuario (usuario, password, privilegio) VALUES (?, ?, ?)";
            $stm = $pdo->prepare($sql);
            $stm->execute(array(
                        $user,
                        $password,
                        $privilegio
            ));
            return true;
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
    
    
    public function Ingresar($user, $password) {
        
        try {
            
            $sql = "SELECT * FROM usuario WHERE usuario = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($user));
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
            if ($stm->rowCount() == 1) {
                
				if (password_verify($password, $row['password'])) {  
                                        
                    session_start();
                    $_SESSION['user_session'] = $row['usuario'];
                    return true;
                    
				} else {                 
					return false;
				}
			}
        
        } catch(PDOException $e) {            
            die('ERROR: ' . $e->getMessage());
        }
    }
    
    
    public function LoggedIn() {
		
        if (isset($_SESSION['user_session'])) {
			return true;
		}
	}
    
    
    public function Logout() {
        
        session_destroy();
        return true;
    }
}