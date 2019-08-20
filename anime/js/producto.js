/*$(document).on("ready", function(){
    listar();
});

var listar = function(){
    var table = $("#example").DataTable({
        ajax:{
            type: "POST",
            dataType: 'json',
            url: "../listar.php"
        },
        columns:[
            {"data": "Cod_producto"},
            {"data": "Valor_uni"},
            {"data": "Costo"},
            {"data": "Cantidad_llego"},
            {"data": "Cantidad_actual"}
            ]    
    });
}*/


$(document).ready( function () {
    $("#example").DataTable({
        "ajax":{
                "type": "POST",
                "dataType": 'json',
                "url": "php/listar.php"
            },
            "columns":[
                {"data": "Cod_producto"},
                {"data": "Valor_uni"},
                {"data": "Costo"},
                {"data": "Cantidad_llego"},
                {"data": "Cantidad_actual"}
            ]    
    })
});
 


function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagen2 + img').remove();
            $('#imagen2').after('<input type=image id="imagenes" src="'+e.target.result+'" width="121.8" height="115.8">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function Registrar()
            {
                var img = $("#imagenes").val(); 
                var prod = $("#CodPro").val();               
                var u_prod =  $("#VUPro").val();
                var cos = $("#CostoPro").val();
                var clleg = $("#CllegadaPro").val();
                var d_prod = $("#DesPro").val();

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/productoControlador.php",
                    data: "controle=1&product="+prod+"&uni_prod="+u_prod+"&cost_prod="+cos+"&cant_lleg="+clleg+"&des_prod="+d_prod+"&imagen="+img+"",
                    success: function(resp){                        
                        $('#respuesta').html(resp);     
                         Limpiar();                     
                    }
                });
            } 

function Buscar()
            { 

                var prod = $("#CodPro").val(); 
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/productoControlador.php",
                    data: "controle=2&product="+prod+"",
                    success: function(resp){
                        $('#respuesta').html(resp); 
                        $('#CodPro').val(resp['Cod_producto']); 
                        $('#VUPro').val(resp['Valor_uni']); 
                        $('#CostoPro').val(resp['Costo']);
                        $('#cantidad').val(resp['Cantidad_actual']);  
                        $('#CllegadaPro').val(resp['Cantidad_llego']); 
                        $('#DesPro').val(resp['Descripcion']); 
                        $('#btnModificar').prop('disabled', false);
                        $('#btnEliminar').prop('disabled', false);
                        

                    }
                });
            } 

function Modificar()
            {
                var prod =  $("#CodPro").val();               
                var u_prod= $("#VUPro").val();
                var cos =   $("#CostoPro").val();
                var clleg = $("#CllegadaPro").val();
                var d_prod= $("#DesPro").val();

                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/productoControlador.php",
                    data: "controle=4&product="+prod+"&uni_prod="+u_prod+"&cost_prod="+cos+"&cant_lleg="+clleg+"&des_prod="+d_prod+"",
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            } 

function Eliminar()
            {
                var prod = $("#CodPro").val(); 
                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/productoControlador.php",
                    data: "controle=3&product="+prod,
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            }

function Limpiar()
{
    
    $("#CodPro").val("");
    $("#CodPro").focus();
    $("#VUPro").val("");
    $("#CostoPro").val(""); 
    $("#cantidad").val("");   
    $("#CActualPro").val("");
    $("#CllegadaPro").val("");
    $("#DesPro").val("");
    $("#imagen2").val("");
    $('#btnModificar').prop('disabled', true);
    $('#btnEliminar').prop('disabled', true);

}


function EliConfir() {
                      
                    if($("#CodPro").val() != ""){  
                              var r = confirm("Desea Continuar Eliminar el Cliente");
                              if (r == true) {
                               Eliminar();
                              } else {
                                alert("usuario No Eliminado");
                              }

                         }else{ alert("Digite Numero de Documento");
                                $("#CodPro").focus();
                                }  
                      
                    }
