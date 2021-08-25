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
	$("#idinstitucion").val("");
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
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
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
					url: '../../ajax/institucion.php?op=listar',
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

	$.ajax({
		url: "../../ajax/institucion.php?op=guardaryeditar",
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
function mostrar(idinstitucion)
{
	$.post("../../ajax/institucion.php?op=mostrar",{idinstitucion : idinstitucion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#descripcion").val(data.descripcion);
 		$("#idinstitucion").val(data.idinstitucion);
 	})
}

/*=============================================
	 FUNCION ELIMINAR REGISTRO
=============================================*/
function eliminar(idinstitucion)
{
	bootbox.confirm("Se eliminara la institucion. ¿Está seguro?", function(result){
		if(result)
        {
        	$.post("../../ajax/institucion.php?op=eliminar", {idinstitucion : idinstitucion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

/*=============================================
	 FUNCION VALIDA institucion
=============================================*/
function verificaevalua(idinstitucion)
{
	
	$.post("../../ajax/institucion.php?op=verificaevalua",{idinstitucion : idinstitucion}, function(data, status) 
    {
    	data = JSON.parse(data);
		
        if (data == null)
        {
        	eliminar(idinstitucion);       
        }
        else
        {
            bootbox.alert("Existen registros relacionados, imposible eliminar");
        }
    });
}


init();