<?php
require_once '../models/class.contacto.php';

$obtener = new Contacto();

$id = $_POST['id'];

if (isset($id)) {
    $data = $obtener->Obtener($id);
    
    // Sirve para almacenar los datos recogidos
    $response = [
        'id_contacto' => $data['id_contacto'],
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'alias' => $data['alias'],
        'telefono1' => $data['telefono1'],
        'telefono2' => $data['telefono2'],
        'email1' => $data['email1'],
        'email2' => $data['email2'],
        'grupo' => $data['grupo'],
    ];
    echo json_encode($response);
    
}