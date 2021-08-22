var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		//guardaryeditar(e);	
	})
}

/*=============================================
	 FUNCION LIMPIAR CAMPOS
=============================================*/
function limpiar()
{
	$("#idregion").val("");
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
		//$("#btnGuardar").prop("disabled",false);
		//$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		//$("#btnagregar").show();
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
					url: '../../ajax/evaluacion.php?op=listar',
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

// Recupera Leyes
function recuperaley()
{
	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectLey'
		//data:{'peticion': 'selectUsuario'}
	})
	.done(function(lista_juzgado){
		$('#idley').html(lista_juzgado)
		$('#idley').selectpicker('refresh');
	})
	.fail(function(){
		alert('Error al Cargar Leyes')
	})
}

// Recupera Titulo
function recuperatitulo()
{
	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectTitulo'
		//data:{'peticion': 'selectUsuario'}
	})
	.done(function(lista_juzgado){
		$('#idtitulo').html(lista_juzgado)
		$('#idtitulo').selectpicker('refresh');
	})
	.fail(function(){
		alert('Error al Cargar Titulos')
	})
}

// Recupera Capitulo
function recuperacapitulo()
{
	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectCapitulo'
		//data:{'peticion': 'selectUsuario'}
	})
	.done(function(lista_juzgado){
		$('#idcapitulo').html(lista_juzgado)
		$('#idcapitulo').selectpicker('refresh');
	})
	.fail(function(){
		alert('Error al Cargar Capitulo')
	})
}

init();