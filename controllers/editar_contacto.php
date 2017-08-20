<?php
require_once '../models/class.contacto.php';

$editar = new Contacto();

// Saneamiento de variables
$id = htmlspecialchars($_POST['id_contacto']);
$nombre = htmlspecialchars($_POST['nombre']);
$apellido = htmlspecialchars($_POST['apellido']);
$alias = htmlspecialchars($_POST['alias']);
$telefono1 = htmlspecialchars($_POST['telefono1']);
$telefono2 = htmlspecialchars($_POST['telefono2']);
$email1 = htmlspecialchars($_POST['email1']);
$email2 = htmlspecialchars($_POST['email2']);
$grupo = htmlspecialchars($_POST['grupo']);


// Validacion de variables
if (($id == "") || ($nombre == "") || ($telefono1 == "")) {    
    echo "
    <script>
        swal('Error', 'Uno o varios campos se encuentran vacíos', 'error');
    </script>";

// Ejecuta el metodo actualizar
} elseif ($editar->Editar($nombre, $apellido, $alias, $telefono1, $telefono2, $email1, $email2, $grupo, $id)) {
    echo "
    <script>
        swal({
        title: 'Actualizar Contacto',
        text: 'Editado satisfactoriamente',
        type: 'success',
        showCancelButton: false,
        confirmButtonText: 'Aceptar',
        closeOnConfirm: false
        },
        
        function() {
            location.href = '/contactos/views/dashboard.php';
        });
    </script>";
    

} else {
    echo "
    <script>
        swal('Error', 'No se puede actualizar el registro seleccionado', 'error');
    </script>";
}