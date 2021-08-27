var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarform(false);
	listar();

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
	$("#iddocumento").val("");
	$("#nombre").val("");
}

/*=============================================
	 FUNCION MOSTRAR FORMULARIO
=============================================*/
function mostrarform(flag)
{
	//limpiar();
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
	var idinstpar = getParameterByName('idinst');
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');
	var idcappar = getParameterByName('idcap');
	
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
					url: '../../ajax/documento2.php?op=listar&idinst='+idinstpar+'&idley='+idleypar+'&idtit='+idtitpar+'&idcap='+idcappar,	 
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
	//$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	
	var idinstpar = getParameterByName('idinst');
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');
	var idcappar = getParameterByName('idcap');

	$.ajax({
		url: '../../ajax/documento2.php?op=guardaryeditar&idinst='+idinstpar+'&idley='+idleypar+'&idtit='+idtitpar+'&idcap='+idcappar,
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	         // mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	//limpiar();
}

/*=============================================
	 FUNCION MOSTRAR REGISTRO
=============================================*/
//function mostrar(iddocumento)
//{
//	var idleypar = getParameterByName('idley');
//	var idtitpar = getParameterByName('idtit');
//	var idcappar = getParameterByName('idcap');
//
//	$.post('../../ajax/documento2.php?op=mostrar&idley='+idleypar+'&idtit='+idtitpar+'&idcap='+idcappar,{iddocumento : iddocumento}, function(data, status)
//	{
//		data = JSON.parse(data);		
//		mostrarform(true);
//
//		$("#numero").val(data.numero);
//		$("#nombre").val(data.nombre);
//		$("#descripcion").val(data.descripcion);
//		$("#idley").val(data.idley);
//		$("#idtitulo").val(data.idtitulo);
//		$("#idcapitulo").val(data.idcapitulo);
// 		$("#iddocumento").val(data.iddocumento);
//		
//		
// 	})
//}

/*=============================================
	 FUNCION ELIMINAR REGISTRO
=============================================*/
function eliminar(iddocumento)
{
	bootbox.confirm("Se eliminara el archivo. ¿Está seguro?", function(result){
		if(result)
        {
			var idinstpar = getParameterByName('idinst');
			var idleypar = getParameterByName('idley');
			var idtitpar = getParameterByName('idtit');
			var idcappar = getParameterByName('idcap');
			
        	$.post('../../ajax/documento2.php?op=eliminar&idinst='+idinstpar+'&idley='+idleypar+'&idtit='+idtitpar+'&idcap='+idcappar,{iddocumento : iddocumento}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


/*=============================================
	 FUNCION retorna a titulo
=============================================*/
function retornaeva()
{
	
	var idinstpar = getParameterByName('idinst');
	
	location.href = "../modulos/evaluacion2.php?op=listar&idinst="+idinstpar+'&idley='+idleypar+'&idtit='+idtitpar+'&idcap='+idcappar
	
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