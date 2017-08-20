// Login
$("#login").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/contactos/controllers/login.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Logout
$('#salir').click(function() {
    var obj = document.getElementById('salir');
    var url = '/contactos/controllers/logout.php';
    
    obj.href = url;
});


// Crear contacto
$("#add-contacto").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/contactos/controllers/registro_contacto.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").html(data);
        }
    });
    return false;
});


// Obtener contacto
function capturar(id) {
    var obj = {
        id: id
    };
    
    $.ajax({
        url: '/contactos/controllers/obtener_contacto.php',
        data: obj,
        type: 'post',
        dataType: 'json',
        
        // Escribe los datos obtenidos en los campos correspondientes
        success: function (response) {
            $('#id-contacto').text(response.id_contacto);
            $('#id-contacto2').text(response.id_contacto);
            $('#nombre').text(response.nombre);
            $('#alias').text(response.alias);
            $('#telefono1').text(response.telefono1);
            $('#telefono2').text(response.telefono2);
            $('#email1').text(response.email1);
            $('#email2').text(response.email2);
            $('#grupo').text(response.grupo);
            
            $('#id-contact-edit').val(response.id_contacto);
            $('#nombre-edit').val(response.nombre);
            $('#apellido-edit').val(response.apellido);
            $('#alias-edit').val(response.alias);
            $('#telefono1-edit').val(response.telefono1);
            $('#telefono2-edit').val(response.telefono2);
            $('#email1-edit').val(response.email1);
            $('#email2-edit').val(response.email2);
        }
    });
}


// Editar contacto
$('#editar').click(function() {
    $('#modal-edit').fadeIn();
});

$("#edit-contacto").submit(function(e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/contactos/controllers/editar_contacto.php',
        data: $(this).serialize(),
        success: function(data) {
            $("#respuesta").html(data);
        }
    });
    return false;
});

// Eliminar contacto
$('#eliminar').click(function() {
    var id = $('#id-contacto').text();
    
    swal({
      title: '¿Eliminar Contacto?',
      text: 'Contacto seleccionado será eliminado',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Aceptar',
      closeOnConfirm: false
    },
    function() {
        $.post('/contactos/controllers/eliminar_contacto.php', {
            id: id
        });
        swal({
            title: 'Eliminado!',
            text: 'Contacto eliminado satisfactoriamente',
            type: 'success',
            showCancelButton: false,
            confirmButtonText: 'Aceptar',
            closeOnConfirm: false
            },
            function() {
                location.href = '/contactos/views/dashboard.php';
            });
    });
});


// Buscador
$('#search').keyup(function(e) {
    var consulta = $('#search').val();
    
    if (consulta.length > 0) {
        
        $.ajax({
            type: 'post',
            url: '/contactos/controllers/buscador_contacto.php',
            data: 'consulta='+consulta,
            dataType: 'html',
            success: function(data) {
                $('#listado').hide();
                $('#resultado').show();
                $('#resultado').html(data);
                $('#eliminar').show();    
                $('#editar').show(); 
            }
        });
    
    } else if (consulta.length == 0) {
        $('#resultado').hide();
        $('#listado').show();
    }
});