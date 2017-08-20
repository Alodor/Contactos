$(document).ready(function() {
    
    // Modal
    $('#modal-trigger').click(function() {
        $('#modal-add').fadeIn();
    });
    
    $('.close').click(function() {
        $('#modal-add').fadeOut();
        $('#modal-edit').fadeOut();
    });
    
    // Resetear campos de form contacto
    $('#cancelar').click(function() {
        $('input').val(''); 
    });
    
    // Habilitar botones de acciones
    $('.card-panel').click(function() {
        $('#eliminar').show();    
        $('#editar').show();    
    });
    
});


// Validar solo numero
function onlyNumber(e) {
    var key = window.Event ? e.which : e.keyCode;
    return (key >= 48 && key <= 57);
}


// Validar solo letras
function onlyText(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false;

    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}