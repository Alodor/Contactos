<?php
require_once '../models/class.contacto.php';

$eliminar = new Contacto();

$id = $_POST['id'];

if (isset($id)) {
    $eliminar->Eliminar($id);
}