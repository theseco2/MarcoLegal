var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	mostrarform(false);
	recuperaley();
	$("#idley").change(recuperatitulo);
	$("#idtitulo").change(recuperacapitulo);
	$("#idcapitulo").change(listar);

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
	$("#idevaluacion").val("");
	$("#idarticulo").val("");
	//$("#marca").val("");
	$("#observacion").val("");
	//$("#descripcionIns").val("");
	$("#descripcionLey").val("");
	$("#descripcionTit").val("");
	$("#descripcionCap").val("");
	$("#descripcionArt").val("");
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

// Recupera Leyes
function recuperaley()
{
	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectLey'
		//data:{'peticion': 'selectUsuario'}
	})
	.done(function(lista_ley){
		$('#idley').html(lista_ley)
		$('#idley').selectpicker('refresh');
		recuperatitulo();
	})
	.fail(function(){
		alert('Error al Cargar Leyes')
	})
}

// Recupera Titulo
function recuperatitulo()
{
	var idley = document.getElementById("idley").value;

	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectTitulo&idley='+idley
	})
	.done(function(lista_titulo){
		$('#idtitulo').html(lista_titulo)
		$('#idtitulo').selectpicker('refresh');
		recuperacapitulo();
	})
	.fail(function(){
		alert('Error al Cargar Titulos')
	})
}

// Recupera Capitulo
function recuperacapitulo()
{
	var idley = document.getElementById("idley").value;
	var idtitulo = document.getElementById("idtitulo").value;

	$.ajax({
		type: 'POST',
		url: '../../ajax/evaluacion.php?op=selectCapitulo&idley='+idley+'&idtitulo='+idtitulo
		//data:{idley: idley,idtitulo: idtitulo}
	})
	.done(function(lista_capitulo){
		$('#idcapitulo').html(lista_capitulo)
		$('#idcapitulo').selectpicker('refresh');
		listar();
	})
	.fail(function(){
		alert('Error al Cargar Capitulo')
	})
}

//Función Listar_Articulos
function listar()
{
	/*************Recuperamos parametro de institucion*******/
	const valores = window.location.search;
	//Creamos la instancia
	const urlParams = new URLSearchParams(valores);
	//Accedemos a los valores
	var idinstitucionpar = urlParams.get('idinstitucion');
	/********************************************************/
	//alert('porque ni Muestra '+idinstitucionpar);
	recuperadesinstitucion(idinstitucionpar);
	var idley = document.getElementById("idley").value;
	var idtitulo = document.getElementById("idtitulo").value;
	var idcapitulo = document.getElementById("idcapitulo").value;

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
					url: '../../ajax/evaluacion.php?op=listar_articulos',
					data:{idley:idley, idtitulo:idtitulo, idcapitulo:idcapitulo, idinstitucionpar:idinstitucionpar},
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

//Muestra Informacion del Formulario
function mostrar(idarticulo,idinstitucion)
{
	var idley = document.getElementById("idley").value;
	var idtitulo = document.getElementById("idtitulo").value;
	var idcapitulo = document.getElementById("idcapitulo").value;
	var marca = document.getElementById("idcapitulo").value;
	if (marca==0) {marca=1}

	$.post("../../ajax/evaluacion.php?op=mostrar&idley="+idley+'&idtitulo='+idtitulo+'&idcapitulo='+idcapitulo+'&idinstitucion='+idinstitucion,{idarticulo : idarticulo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#observacion").val(data.observacion);
		$("#descripcionIns").val(data.descripcionIns);
		$("#descripcionLey").val(data.descripcionLey);
		$("#descripcionTit").val(data.descripcionTit);
		$("#descripcionCap").val(data.descripcionCap);
		$("#descripcionArt").val(data.descripcionArt);
		//Coloca los Id en pantalla
		if (data.idevaluacion===undefined) {
			data.idevaluacion=0;
		}
		$("#idevaluacion").val(data.idevaluacion);
		$("#idarticulo").val(data.idarticulo);
		$("#marca").val(data.marca);
		$('#marca').selectpicker('refresh');

 	})
}

// Agregar o Editar Registros
function guardaryeditar(e)
{
	/*************Recuperamos parametro de institucion*******/
	const valores = window.location.search;
	//Creamos la instancia
	const urlParams = new URLSearchParams(valores);
	//Accedemos a los valores
	var idinstitucionpar = urlParams.get('idinstitucion');
	/********************************************************/
	var idley = document.getElementById("idley").value;
	var idtitulo = document.getElementById("idtitulo").value;
	var idcapitulo = document.getElementById("idcapitulo").value;

	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../ajax/evaluacion.php?op=guardaryeditar&idley="+idley+'&idtitulo='+idtitulo+'&idcapitulo='+idcapitulo+'&idinstitucion='+idinstitucionpar,
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

function recuperadesinstitucion(idinstitucionpar){
	//alert(' Muestra '+idinstitucionpar);
    $.post('../../ajax/evaluacion.php?op=desinstitucion&idinstitucion='+idinstitucionpar, function(data, status)
	{
		data = JSON.parse(data);
		$("#descripcionIns").val(data.descripcion);

 	})
}

/*=============================================
	 FUNCION retorna a titulo
=============================================*/
function retornaint()
{	
	location.href = "../modulos/evaluacion.php";	
}


init();