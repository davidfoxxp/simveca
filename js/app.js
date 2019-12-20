function load(page){   
    
                var query=$("#buscardni").val();
		var parametros = {"action":"ajax",'query':query};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'formEditarCPosterior_1.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='imagenes/loading.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})                                
                
	}
function load2(page){       
                var query=$("#idcontrolposterior").val();
		var parametros = {"action":"ajax",'query':query};
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'formEditarPCalificar_1.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='imagenes/loading.gif'>");
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})                                
                
	}
        

        $(document).on("click","#actualizar1",function(event){
            var idcontrolposterior =$("#observaciones1").data("id_controlposterior1");
            var observaciones=$("#observaciones1").val();            
//            alert(observaciones);
            var parametros = {'idcontrolposterior':idcontrolposterior,'observaciones':observaciones};
			 $.ajax({
					type: "POST",
					url: "modificarCPosterior.php",                                        
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);                                        
//					$('#dataUpdate').modal('hide');
					load(1);
				  }
			});
		  event.preventDefault();
        })
        
            $(document).on("click","#actualizarperiodostitular",function(event){
            var iddim_PaCalificar =$("#iddim_PaCalificar").val();
            
            var InicioPCalificar1=$("#InicioPCalificar1").val();
            var FinPCalificar1=$("#FinPCalificar1").val();            
            var InicioPCalificar2=$("#InicioPCalificar2").val();
            var FinPCalificar2=$("#FinPCalificar2").val();

            
            var InicioPFinal=$("#InicioPFinal").val(); 
            var FinPFinal=$("#FinPFinal").val(); 
            var parametros = {'iddim_PaCalificar':iddim_PaCalificar,'InicioPFinal':InicioPFinal,'FinPFinal':FinPFinal,
            'InicioPCalificar1':InicioPCalificar1,'FinPCalificar1':FinPCalificar1,'InicioPCalificar2':InicioPCalificar2,'FinPCalificar2':FinPCalificar2};
			 $.ajax({
					type: "POST",
					url: "modificarPCalificarTitular.php",                                        
					data: parametros,
					 beforeSend: function(objeto){
						$("#datos_ajax").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#datos_ajax").html(datos);                                        
//					$('#dataUpdate').modal('hide');
					load2(1);
//                                        load(1);
				  }
			});
		  event.preventDefault();
        })
        
        
		

//	$( "#actualidarDatos" ).submit(function( event ) {
//		var parametros = $(this).serialize();
//			 $.ajax({
//					type: "POST",
//					url: "modificarCPosterior.php",                                        
//					data: parametros,
//					 beforeSend: function(objeto){
//						$("#datos_ajax").html("Mensaje: Cargando...");
//					  },
//					success: function(datos){
//					$("#datos_ajax").html(datos);
//                                        
////					$('#dataUpdate').modal('hide');
//					load(1);
//				  }
//			});
//		  event.preventDefault();
//		});
//		
//		$( "#guardarDatos" ).submit(function( event ) {
//		var parametros = $(this).serialize();
//			 $.ajax({
//					type: "POST",
//					url: "agregar.php",
//					data: parametros,
//					 beforeSend: function(objeto){
//						$("#datos_ajax_register").html("Mensaje: Cargando...");
//					  },
//					success: function(datos){
//					$("#datos_ajax_register").html(datos);
//					
//					load(1);
//				  }
//			});
//		  event.preventDefault();
//		});
		
