$(document).ready(function(){
    $.ajax({
        type:'POST',
        url:'php/consulta.php',
        data: {'peticion': 'consulta'}
    })
.done(function(lista){
    $('#TipPro').html(lista)

})
.fail(function(){
    alert('ERROR')
})
})

