var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarform(false);
	listar();
	mostrarley();
	mostrartitulo();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

/*=============================================
	 FUNCION LIMPIAR CAMPOS
=============================================*/
function limpiar()
{
	$("#idcapitulo").val("");
	$("#descripcion").val("");
}

/*=============================================
	 FUNCION MOSTRAR FORMULARIO
=============================================*/
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#btnretroceso").hide();
		
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		$("#btnretroceso").show();
	}
}

/*=============================================
	 FUNCION CANCELAR FORMULARIO
=============================================*/
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

/*=============================================
	 FUNCION LISTAR REGISTROS
=============================================*/
function listar()
{
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');
	
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../../ajax/capitulo.php?op=listar&idley='+idleypar+'&idtit='+idtitpar,	 
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
	
	//alert(tabla.aaData);
}

/*=============================================
	 FUNCION GUARDAR Y EDITAR REGISTRO
=============================================*/
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');

	$.ajax({
		url: '../../ajax/capitulo.php?op=guardaryeditar&idley='+idleypar+'&idtit='+idtitpar,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

/*=============================================
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrar(idcapitulo)
{
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');

	$.post('../../ajax/capitulo.php?op=mostrar&idley='+idleypar+'&idtit='+idtitpar,{idcapitulo : idcapitulo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#descripcion").val(data.descripcion);
		$("#idley").val(data.idley);
		$("#idtitulo").val(data.idtitulo);
 		$("#idcapitulo").val(data.idcapitulo);
		
 	})
}

/*=============================================
	 FUNCION ELIMINAR REGISTRO
=============================================*/
function eliminar(idcapitulo)
{
	
	bootbox.confirm("Se eliminara el capitulo. ¿Está seguro?", function(result){
		if(result)
        {
			var idleypar = getParameterByName('idley');
			var idtitpar = getParameterByName('idtit');
			
        	$.post('../../ajax/capitulo.php?op=eliminar&idley='+idleypar+'&idtit='+idtitpar,{idcapitulo : idcapitulo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

/*=============================================
	 FUNCION VALIDA articulo
=============================================*/
function verificaarticulo(idcapitulo)
{
	
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');
	$.post('../../ajax/capitulo.php?op=verificaarticulo&idley='+idleypar+'&idtit='+idtitpar,{idcapitulo : idcapitulo}, function(data, status) 
    {
    	data = JSON.parse(data);
		
        if (data == null)
        {
		
        	eliminar(idcapitulo);       
        }
        else
        {
            bootbox.alert("Existen registros relacionados, imposible eliminar");
        }
    });
}


/*=============================================
	 FUNCION retorna a titulo
=============================================*/
function retornatit()
{
	
	var idleypar = getParameterByName('idley');
	
	location.href = "../modulos/titulo.php?idley="+idleypar;
	
}

/*=============================================
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrarley()
{
	var idleypar = getParameterByName('idley');

	$.post("../../ajax/ley.php?op=recuperar",{idleypar : idleypar}, function(data, status)
	{

		data = JSON.parse(data);		
		//mostrarform(true);
		$("#descripcionley").val(data.descripcion);
 		//$("#idley").val(data.idley);

 	})
}


/*=============================================
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrartitulo()
{
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');

	$.post('../../ajax/titulo.php?op=recuperar&idleypar='+idleypar,{idtitpar : idtitpar}, function(data, status)
	{

		data = JSON.parse(data);		
		//mostrarform(true);
		$("#descripciontitulo").val(data.descripcion);
 		//$("#idley").val(data.idley);

 	})
}

/*=============================================
	 FUNCION Recupera parametro
=============================================*/
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


init();