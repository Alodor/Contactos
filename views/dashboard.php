<?php 

include 'session.php';
require_once '../models/class.contacto.php';

$listar = new Contacto();

?>
<!Doctype html>
<html lang="es">
    <head>
        <?php include '../assets/head.php'; ?>
        <title>Contactos | Dashboard</title>
    </head>
    
    <body>
        <div class="row">
            <!-- Aside -->
            <div class="col m4 col s3 aside">
                <div class="aside-header">
                    <i class="people medium material-icons">person_pin</i>
                    <h4 id="nombre">Nombre</h4>
                    <h5 id="alias">Alías</h5>
                    
                    <!-- Logout -->
                    <a id="salir" class="waves-effect waves-light btn amber darken-4 right">Salir</a>
                    <!-- /Logout -->
                </div>
                
                <div id="details">
                    <div class="col s12">
                        <h5>
                            <i class="material-icons blue-text text-accent-4 left">phone_android</i>
                            <span id="telefono1">Teléfono 1</span>
                        </h5>    
                    </div>
                    <!-- ********************** -->
                    <div class="col s12">
                        <h5>
                            <i class="material-icons blue-text text-accent-4 left">phone_android</i>
                            <span id="telefono2">Teléfono 2</span>
                        </h5>    
                    </div>
                    <!-- ********************** -->
                    <div class="col s12">
                        <h5>
                            <i class="material-icons blue-text text-accent-4 left">local_post_office</i>
                            <span id="email1">Email 1</span>
                        </h5>    
                    </div>
                    <!-- ********************** -->
                    <div class="col s12">
                        <h5>
                            <i class="material-icons blue-text text-accent-4 left">local_post_office</i>
                            <span id="email2">Email 2</span>    
                        </h5>    
                    </div>
                    <!-- ********************** -->
                    <div class="col s12">
                        <h5>
                            <i class="material-icons blue-text text-accent-4 left">group</i>
                            <span id="grupo">Grupo</span>    
                        </h5>
                    </div>
                    <!-- ********************** -->
                    <div class="col s12">
                        <div class="divider" style="margin-bottom: 10px"></div>
                    </div>
                </div>                
                
                <!-- Actions -->                
                <div class="action center-align">
                    <a id="eliminar" class="col s6 waves-effect waves-dark btn white black-text">
                    <i class="material-icons left red-text">delete</i>Eliminar 
                    <span id="id-contacto"></span></a>
                    
                    <a id="editar" class="col s6 waves-effect waves-dark btn white black-text">
                    <i class="material-icons left blue-text">edit</i>Editar
                    <span id="id-contacto2"></span></a>
                </div>
                <!-- /Actions -->                                
            </div>
            <!-- /Aside -->
            
            <!-- content -->
            <div class="content">
                <!-- Buscador -->
                <div class="navbar-fixed">
                    <nav>
                        <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required>
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
                <!-- /Buscador -->
                
                <!-- Card's -->
                <div class="cards">
                    <div id="resultado"></div>
                   
                    <div id="listado">
                        <?php                        
                        $data = $listar->Listar();
                        foreach ($data as $valor) { ?>

                        <div class="card-panel hoverable" onclick="capturar(<?php echo $valor['id_contacto']; ?>)">
                            <h5><i class="material-icons">person_pin</i> 
                            <?php echo $valor['nombre']. " " .$valor['apellido']; ?></h5>
                        </div>

                        <?php } ?>                   
                    </div>
                </div>
                <!-- /Card's -->  
            </div>
            <!-- /content -->
        </div>
        
        <!-- Nuevo Contacto -->
        <div class="right fixed-action-btn">
            <div class="row">
                <a id="modal-trigger" class="btn-floating btn-large waves-effect waves-light light-green accent-4 pulse"><i class="material-icons">add</i></a>
                
                <div id="modal-add" class="overlay">
                    <div class="modal-content">
                        <i class="material-icons close right">close</i>
                        <h4>Nuevo Contacto</h4>
                        
                        <form id="add-contacto">
                            <div class="input-field col s6">
                                <label for="icon_prefix">Nombre:</label>
                                <input type="text" name="nombre" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off" required>
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Apellido:</label>
                                <input type="text" name="apellido" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off">
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Alías:</label>
                                <input type="text" name="alias" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off">
                            </div>
                            <!-- ************************* -->
                            <div class="col s6" style="margin-top: 20px; margin-bottom: 20px">
                                <select class="browser-default" name="grupo">
                                    <option disabled selected>Grupo</option>
                                    <option value="amigos">Amigos</option>
                                    <option value="clientes">Clientes</option>
                                    <option value="conocidos">Conocidos</option>
                                    <option value="estudios">Estudios</option>
                                    <option value="familia">Familia</option>
                                    <option value="trabajo">Trabajo</option>
                                    <option value="vecinos">Vecinos</option>
                                </select>
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Teléfono 1:</label>
                                <input type="text" name="telefono1" maxlength="11" onkeypress="return onlyNumber(event)" onpaste="return false" autocomplete="off" required>
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Teléfono 2:</label>
                                <input type="text" name="telefono2" maxlength="11" onkeypress="return onlyNumber(event)" onpaste="return false" autocomplete="off">
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Email 1:</label>
                                <input type="email" name="email1" autocomplete="off">
                            </div>
                            <!-- ************************* -->
                            <div class="input-field col s6">
                                <label for="icon_prefix">Email 2:</label>
                                <input type="email" name="email2" autocomplete="off">
                            </div>
                            <!-- ************************* -->
                            <div class="center-align">
                                <a id="cancelar" class="waves-effect waves-light btn blue-grey darken-1"><i class="material-icons left">do_not_disturb</i>Cancelar</a>
                                
                                <button class="waves-effect waves-light btn light-green accent-4" type="submit"><i class="material-icons left">done</i>Aceptar</button>
                            </div>
                            <!-- ************************* -->
                            <div id="respuesta"></div>
                        </form>                                             
                    </div>
                </div>
            </div>
        </div>
        <!-- /Nuevo Contacto --> 
        
        <!-- Editar Contacto -->       
        <div id="modal-edit" class="overlay">
            <div class="modal-content">
                <i class="material-icons close right">close</i>
                <h4>Editar Contacto</h4>

                <form id="edit-contacto">
                    <div class="input-field">
                        <input id="id-contact-edit" name="id_contacto" type="hidden">                        
                        <input id="nombre-edit" type="text" name="nombre" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off" required>
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="apellido-edit" type="text" name="apellido" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off">
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="alias-edit" type="text" name="alias" onkeypress="return onlyText(event)" onpaste="return false" autocomplete="off">
                    </div>
                    <!-- ************************* -->
                    <div id="grupo-edit" style="margin-top: 10px; margin-bottom: 31px">
                        <select class="browser-default" name="grupo">
                            <option disabled selected>Grupo</option>
                            <option value="amigos">Amigos</option>
                            <option value="clientes">Clientes</option>
                            <option value="conocidos">Conocidos</option>
                            <option value="estudios">Estudios</option>
                            <option value="familia">Familia</option>
                            <option value="trabajo">Trabajo</option>
                            <option value="vecinos">Vecinos</option>
                        </select>
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="telefono1-edit" type="text" name="telefono1" maxlength="11" onkeypress="return onlyNumber(event)" onpaste="return false" autocomplete="off" required>
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="telefono2-edit" type="text" name="telefono2" maxlength="11" onkeypress="return onlyNumber(event)" onpaste="return false" autocomplete="off">
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="email1-edit" type="email" name="email1" autocomplete="off">
                    </div>
                    <!-- ************************* -->
                    <div class="input-field">
                        <input id="email2-edit" type="email" name="email2" autocomplete="off">
                    </div>
                    <!-- ************************* -->
                    <div class="center-align">
                        <button class="waves-effect waves-light btn light-green accent-4" type="submit"><i class="material-icons left">done</i>Aceptar</button>
                    </div>
                    <!-- ************************* -->
                    <div id="respuesta"></div>
                </form>                                             
            </div>
        </div>
        <!-- /Editar Contacto -->       
        
        <?php include '../assets/footer.php'; ?>
    </body>
</html>
