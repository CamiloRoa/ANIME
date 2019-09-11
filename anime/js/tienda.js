$(document).ready(function () {
    cargaGrilla();
});

function cargaGrilla() {
    $.ajax({
        "type": "POST",
        "dataType": 'json',
        "url": "php/tiendaControlador.php",
        "data": "controle=5",
        success: function (data) {
            console.log(data);
            $.each(data, function (i, item) {
                $("#example").DataTable({
                    data: item,
                    "columns": [
                        { "data": 'Id_tienda' },
                        { "data": "Dept" },
                        { "data": "Municipios"},
                        { "data": "Tel" },
                        { "data": "Direccion" }


                    ]
                })

            })
        }

    });
}

function recargarLista(){
    $.ajax({
        type:"POST",
        url:"php/datos.php",
        data:"departamento=" + $('#depart').val(),
        success:function(r){
            $('#muni').html(r);
        }
    });
}


function Registrar()
            {
                var idtie = $("#idtienda").val();
                var dep =   $("#depart").val();
                var mun =   $("#muni").val();
                var tel =   $("#tel").val();
                var dir =   $("#dir").val();
                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/tiendaControlador.php",
                    data: "controle=1&id_tienda="+idtie+"&departamento="+dep+"&municipio="+mun+"&tele="+tel+"&direc="+dir+"",
                    success: function(resp){                        
                        $('#respuesta').html(resp);  
                         Limpiar();                     
                    }
                });
            } 

function Buscar()
            { 
            var idtie = $("#idtienda").val(); 

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "php/tiendaControlador.php",
                data: "controle=2&id_tienda="+idtie+"",
                success: function(resp){
                    console.log(resp);
                    $('#respuesta').html(resp); 
                    $('#idtienda').val(resp['Id_tienda']); 
                    $('#depart').val(resp['Dept']);
                    $('#muni').val(resp['Municipios']); 
                    $('#tel').val(resp['Tel']); 
                    $('#dir').val(resp['Direccion']); 
                    $('#btnModificar').prop('disabled', false);
                    $('#btnEliminar').prop('disabled', false);
                        

                }
                });
            } 
function Modificar()
            {
                var idtie = $("#idtienda").val();
                var dep =  $("#depart").val();
                var mun =  $("#muni").val();
                var tel = $("#tel").val();
                var dir = $("#dir").val();

                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/tiendaControlador.php",
                    data: "controle=4&id_tienda="+idtie+"&departamento="+dep+"&municipio="+mun+"&tele="+tel+"&direc="+dir+"",
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            } 

function Eliminar()
            {
                var idtie = $("#idtienda").val(); 
                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/tiendaControlador.php",
                    data: "controle=3&id_tienda="+idtie,
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            }

function Limpiar()
{
    
    $("#idtienda").val("");
    $("#idtienda").focus();
    $("#depart").val("");    
    $("#muni").val("");    
    $("#tel").val("");
    $("#dir").val("");
    $('#btnModificar').prop('disabled', true);
    $('#btnEliminar').prop('disabled', true);

}


function EliConfir() {
                      
                    if($("#idtienda").val() != ""){  
                              var r = confirm("Desea Continuar Eliminar el Cliente");
                              if (r == true) {
                               Eliminar();
                              } else {
                                alert("tienda No Eliminado");
                              }

                         }else{ alert("Digite Numero de ID");
                                $("#idtienda").focus();
                                }  
                      
                    }
