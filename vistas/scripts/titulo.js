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
	$("#iddepartamento").val("");
	$("#nombre").val("");
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
	var idregpar = getParameterByName('idreg');
	
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
					url: '../ajax/departamento_ajax.php?op=listar&idreg='+idregpar, 	 
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
}

/*=============================================
	 FUNCION GUARDAR Y EDITAR REGISTRO
=============================================*/
function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	
	var idregpar = getParameterByName('idreg');

	$.ajax({
		url: '../ajax/departamento_ajax.php?op=guardaryeditar&idreg='+idregpar,
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
function mostrar(iddepartamento)
{
	var idregpar = getParameterByName('idreg');
	$.post('../ajax/departamento_ajax.php?op=mostrar&idreg='+idregpar,{iddepartamento : iddepartamento}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.NOMBRE);
		$("#idregion").val(data.REGION_ID);
 		$("#iddepartamento").val(data.ID);
 	})
}

/*=============================================
	 FUNCION ELIMINAR REGISTRO
=============================================*/
function eliminar(iddepartamento)
{
	bootbox.confirm("Se eliminara el departamento. ¿Está seguro?", function(result){
		if(result)
        {
			var idregpar = getParameterByName('idreg');
        	$.post('../ajax/departamento_ajax.php?op=eliminar&idreg='+idregpar,{iddepartamento : iddepartamento}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

/*=============================================
	 FUNCION VALIDA departamento
=============================================*/
function verificamuni(iddepartamento)
{
	var idregpar = getParameterByName('idreg');
	$.post('../ajax/departamento_ajax.php?op=verificamuni&idreg='+idregpar,{iddepartamento : iddepartamento}, function(data, status) 
    {
    	data = JSON.parse(data);
		
        if (data == null)
        {
        	eliminar(iddepartamento);       
        }
        else
        {
            bootbox.alert("Existen registros relacionados, imposible eliminar");
        }
    });
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