$(function(){

	var valor, contador, parrafo;
	
	$('<p class="indicador">Tienes 200 caracteres restantes</p>').appendTo('#contador');	
	
	$('#obs').keydown(function(){
	
		contador = 200;
		$('.advertencia').remove();
		$('.indicador').remove();
		
		valor = $('#obs').val().length;
		contador = contador - valor;
		
		if(contador < 0) {
			parrafo = '<p class="advertencia">';
		}
		else {
			parrafo = '<p class="indicador">';
		}
		
		$('#contador').append(parrafo + 'Tienes ' + contador + ' caracteres restantes</p>');
	
	});
	
	
});