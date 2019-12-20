/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('ready', funcPrincipal);

function funcPrincipal() {
    $('#btnVerificar').on('click', funcVerificar);
}

function  funcVerificar() 
{
    var varlorEscrito = $("#txtUser").val();
    $.get("getReniec.php?q="+varlorEscrito, function(data) {
       alert('respuesta del servidor: ' +data);
       var respuesta;
       if(data==="0")
           respuesta = data + "Esta disponoble";
       else 
           respuesta = data + "Ya esta en uso";
       
       //$('#respuesta').text(respuesta);
    });
    $('#respuesta').text(respuesta);
}