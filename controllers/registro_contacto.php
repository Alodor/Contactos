<?php
require_once '../models/class.contacto.php';

$crear = new Contacto();

// Realizo un saneamiento y validacion de variables
$nombre = htmlspecialchars($_POST['nombre']);
$apellido = htmlspecialchars($_POST['apellido']);
$alias = htmlspecialchars($_POST['alias']);
$grupo = htmlspecialchars($_POST['grupo']);
$telefono1 = htmlspecialchars($_POST['telefono1']);
$telefono2 = htmlspecialchars($_POST['telefono2']);
$email1 = htmlspecialchars($_POST['email1']);
$email2 = htmlspecialchars($_POST['email2']);

if (($nombre == "") || ($grupo == "") || ($telefono1 == "")) {    
    echo "
    <script>
        swal('Error', 'Uno o varios campos se encuentran vacíos', 'error');
    </script>";

} elseif ($crear->Crear($nombre, $apellido, $alias, $telefono1, $telefono2, $email1, $email2, $grupo)) {
    echo "
    <script>
        //swal('Contacto Nuevo', 'Contacto registrado satisfactoriamente', 'success');
        
        swal({
            title: 'Contacto Nuevo',
            text: 'Contacto registrado satisfactoriamente',
            type: 'success',
            confirmButtonText: 'Aceptar',
            closeOnConfirm: false
        },
        function(){
            location.href = '/contactos/views/dashboard.php';
        });
    </script>";

} else {
    echo "
    <script>
        swal('Error', 'No se puede registrar el contacto', 'error');
    </script>";
}