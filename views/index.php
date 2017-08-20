<!Doctype html>
<html lang="es">
    <head>
        <?php include '../assets/head.php'; ?>
        <title>Contactos | Login</title>
    </head>
    
    <body>        
        <!-- Form Login -->
        <div class="container">
            <div class="row">
                <!-- ************************* -->
                <div class="col m6 offset-m3 col s10 offset-s1 head-form">
                    <h4 class="center">Log in</h4>
                </div>
                <!-- ************************* -->
                <div class="col m6 offset-m3 col s10 offset-s1 content-form">
                    <form id="login">
                        <!-- ************************* -->
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>                            
                            <label for="icon_prefix">User:</label>
                            <input id="icon_prefix" type="text" name="user" autocomplete="off" required>
                        </div>
                        <!-- ************************* -->
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>                            
                            <label for="icon_prefix">Password:</label>
                            <input id="icon_prefix" type="password" name="password" required>
                        </div>
                        <!-- ************************* -->
                        <button class="btn waves-effect waves-light col s6 offset-s3 blue accent-4" type="submit">Aceptar</button>
                        <div id="respuesta" style="display: none"></div>
                    </form>
                </div>
                <!-- ************************* -->
            </div>
        </div>
        <!-- /Form Login -->
        
        <?php include '../assets/footer.php'; ?>
    </body>
</html>