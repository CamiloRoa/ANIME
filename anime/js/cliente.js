$(document).ready(function () {
    cargaGrilla();
});

function cargaGrilla() {
    $.ajax({
        "type": "POST",
        "dataType": 'json',
        "url": "php/clienteControlador.php",
        "data": "controle=5",
        success: function (data) {
            console.log(data);
            $.each(data, function (i, item) {
                $("#example").DataTable({
                    data: item,
                    "columns": [
                        { "data": "N_Documento" },
                        { "data": "Nombres" },
                        { "data": "Email" },
                        { "data": "Tel" },
                        { "data": "Dir" },
                        { "data": "Ciudad" }
                    ]
                })
                

            })
        }
    });
}

window.onload = function () {
    Limpiar();
}

function Registrar() {
    var cedu = $("#documentoText").val();
    var nom = $("#nombreText").val();
    var ema = $("#emailText").val();
    var tel = $("#telefonoText").val();
    var dir = $("#direccionText").val();
    var ciu = $("#ciudadText").val()

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "php/clienteControlador.php",
        data: "controle=1&cedula=" + cedu + "&nombre=" + nom + "&email=" + ema + "&telefono=" + tel + "&direccion=" + dir + "&ciudad=" + ciu + "",
        success: function (resp) {
            $('#respuesta').html(resp);
            Limpiar();
        }
    });
}

function Buscar() {

    var cedu = $("#documentoText").val();
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "php/clienteControlador.php",
        data: "controle=2&cedula=" + cedu + "",
        success: function (resp) {
            //console.log(resp);
            $('#respuesta').html(resp);
            $('#documentoText').val(resp['N_Documento']);
            $('#nombreText').val(resp['Nombres']);
            $('#emailText').val(resp['Email']);
            $('#telefonoText').val(resp['Tel']);
            $('#direccionText').val(resp['Dir']);
            $('#ciudadText').val(resp['Ciudad']);
            $('#btnModificar').prop('disabled', false);
            $('#btnEliminar').prop('disabled', false);


        }
    });
}

function Eliminar() {
    var cedu = $("#documentoText").val();

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "php/clienteControlador.php",
        data: "controle=3&cedula=" + cedu,
        success: function (resp) {
            $('#respuesta').html(resp);
            Limpiar();
        }
    });
}
function Modificar() {
    var cedu = $("#documentoText").val();
    var nom = $("#nombreText").val();
    var ema = $("#emailText").val();
    var tel = $("#telefonoText").val();
    var dir = $("#direccionText").val();
    var ciu = $("#ciudadText").val()

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "php/clienteControlador.php",
        data: "controle=4&cedula=" + cedu + "&nombre=" + nom + "&email=" + ema + "&telefono=" + tel + "&direccion=" + dir + "&ciudad=" + ciu + "",
        success: function (resp) {
            $('#respuesta').html(resp);
            Limpiar();
        }
    });
}

function Limpiar() {

    $("#documentoText").val("");
    $("#documentoText").focus();
    $("#nombreText").val("");
    $("#emailText").val("");
    $("#telefonoText").val("");
    $("#direccionText").val("");
    $("#ciudadText").val("");
    $('#btnModificar').prop('disabled', true);
    $('#btnEliminar').prop('disabled', true);

}


function EliConfir() {

    if ($("#documentoText").val() != "") {
        var r = confirm("Desea Continuar Eliminar el Cliente");
        if (r == true) {
            Eliminar();
        } else {
            alert("usuario No Eliminado");
        }

    } else {
        alert("Digite Numero de Documento");
        $("#documentoText").focus();
    }

}

