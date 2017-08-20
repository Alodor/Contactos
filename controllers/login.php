<?php
require_once '../models/class.usuario.php';

$login = new Usuario();

// Realizo un saneamiento de las variables
$user = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);

if (($user == "") || ($password == "")) {
    echo "
    <script>
        swal('Error', 'Uno o ambos campos se encuentran vacíos', 'error');
    </script>";
    
} elseif ($login->Ingresar($user, $password)) {
    echo "
    <script>
        location.href = '/contactos/views/dashboard.php';    
    </script>";

} else {
    echo "
    <script>
        swal('Error', 'Usuario o Contraseña incorrecta', 'error');
    </script>";
}