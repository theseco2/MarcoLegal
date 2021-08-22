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
	$("#idley").val("");
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
					url: '../../ajax/ley.php?op=listar',
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
		url: "../../ajax/ley.php?op=guardaryeditar",
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
function mostrar(idley)
{
	$.post("../../ajax/ley.php?op=mostrar",{idley : idley}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#descripcion").val(data.descripcion);
 		$("#idley").val(data.ID);
 	})
}

/*=============================================
	 FUNCION ELIMINAR REGISTRO
=============================================*/
function eliminar(idley)
{
	bootbox.confirm("Se eliminara la ley. ¿Está seguro?", function(result){
		if(result)
        {
        	$.post("../../ajax/ley.php?op=eliminar", {idley : idley}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

/*=============================================
	 FUNCION VALIDA ley
=============================================*/
function verificatitulo(idley)
{
	$.post("../../ajax/ley.php?op=verificatitulo",{idley : idley}, function(data, status) 
    {
    	data = JSON.parse(data);
		
        if (data == null)
        {
        	eliminar(idley);       
        }
        else
        {
            bootbox.alert("Existen registros relacionados, imposible eliminar");
        }
    });
}


init();