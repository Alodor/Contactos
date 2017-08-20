<?php
session_start();
require_once '../models/class.contacto.php';

$listar = new Contacto();
$valor = $_POST['consulta'];

$salida = "";

if (isset($valor)) {
    $data = $listar->Buscar($valor);
    
    foreach ($data as $valor) { 
    
    $salida .= "
        <div class='card-panel hoverable' onclick='capturar(" .$valor['id_contacto']. ")'>
            <h5><i class='material-icons'>person_pin</i>" 
            .$valor['nombre']. " " .$valor['apellido']. "</h5>
        </div>
    ";
        
    }
    echo $salida;
}