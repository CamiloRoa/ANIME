$(document).ready(function() {
    cargaGrilla();
} );

function cargaGrilla(){
	
    $("#example").DataTable({
      "ajax":{
              "type": "POST",
              "dataType": 'json',
              "url": "php/bodegaControlador.php",
              "data": "controle=5"
          },
          "columns":[
              {"data": "Id_bodega"},
              {"data": "Dept"},
              {"data": "Municipio"},
              {"data": "Tel"},
              {"data": "Direccion"}

          ] 
  })
}


function recargarLista(){
    $.ajax({
        type:"POST",
        url:"php/datos.php",
        data:"departamento=" + $('#depart').val(),
        success:function(r){
            $('#lista').html(r);
        }
    });
}

function Registrar()
            {
                var idbod = $("#id_Bodega").val();
                var dep =  $("#depart").val();
                var mun = $("#lista").val();
                var tel = $("#tel").val();
                var dir = $("#dir").val();

                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/bodegaControlador.php",
                    data: "controle=1&idbodega="+idbod+"&depart="+dep+"&mun="+mun+"&tele="+tel+"&dire="+dir+"",
                    success: function(resp){                        
                        $('#respuesta').html(resp);     
                         Limpiar();                     
                    }
                });
            }   

function Buscar()
            { 
                var idbod = $("#id_Bodega").val(); 
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/bodegaControlador.php",
                    data: "controle=2&idbodega="+idbod+"",
                    success: function(resp){
                        //console.log(resp);
                        $('#respuesta').html(resp); 
                        $('#id_Bodega').val(resp['Id_bodega']); 
                        $('#depart').val(resp['Dept']);
                        $('#lista').val(resp['Municipio']); 
                        $('#tel').val(resp['Tel']); 
                        $('#dir').val(resp['Direccion']); 
                        $('#btnModificar').prop('disabled', false);
                        $('#btnEliminar').prop('disabled', false);
                        recargarLista();

                    }
                });
            } 

function Eliminar()
            {
                var idbod = $("#id_Bodega").val(); 
                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/bodegaControlador.php",
                    data: "controle=3&idbodega="+idbod,
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            } 
function Modificar()
            {
                var idbod = $("#id_Bodega").val();
                var dep =  $("#depart").val();
                var mun = $("#lista").val();
                var tel = $("#tel").val();
                var dir = $("#dir").val();
                
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "php/bodegaControlador.php",
                    data: "controle=4&idbodega="+idbod+"&depart="+dep+"&mun="+mun+"&tele="+tel+"&dire="+dir+"",
                    success: function(resp){
                        $('#respuesta').html(resp);
                        Limpiar();
                    }
                });
            } 

function Limpiar()
{
    
    $("#id_Bodega").val("");
    $("#id_Bodega").focus();
    $("#depart").val("");
    $("#lista").val("");
    $("#tel").val("");
    $("#dir").val("");
    $('#btnModificar').prop('disabled', true);
    $('#btnEliminar').prop('disabled', true);

}


 function EliConfir() {
                      
                    if($("#id_Bodega").val() != ""){  
                              var r = confirm("Desea Continuar Eliminar la bodega");
                              if (r == true) {
                               Eliminar();
                              } else {
                                alert("Bodega No Eliminado");
                              }

                         }else{ alert("Digite Id de bodega");
                                $("#id_Bodega").focus();
                                }  
                      
                    }
