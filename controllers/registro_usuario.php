<?php
require_once '../models/class.usuario.php';

$registrar = new Usuario();

// Realizo un saneamiento y validacion de variables
$user = htmlspecialchars($_POST['user']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
$privilegio = htmlspecialchars($_POST['privilegio']);

if (($user == "") || ($password == "") || ($privilegio == "")) {    
    echo "
    <script>
        swal('Se encuentra uno o varios campos vacíos');
    </script>";

} elseif ($registrar->Registrar($user, $password, $privilegio)) {
    echo "
    <script>
        swal('Usuario registrado satisfactoriamente');
    </script>";

} else {
    echo "
    <script>
        swal('Usuario no puede ser registrado');
    </script>";
}