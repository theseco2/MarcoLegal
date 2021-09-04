var tabla;
var graba1;
var graba2;
var graba3;

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
		eliminaarchivo();
		eliminaarchivo2();
		eliminaarchivo3();
		guardaryeditar(e);
		//cargararchivo();	
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
	$("#exampleInputFile").val("");
	$("#exampleInputFile2").val("");
	$("#exampleInputFile3").val("");
	$("#nombrearch").val("");
	$("#nombrearch2").val("");
	$("#nombrearch3").val("");
	graba1 = ' ';
	graba2 = ' ';
	graba3 = ' ';
	fileI  = ' ';
	fileI2 = ' ';
	fileI3 = ' ';
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
	var desinstitu = document.getElementById("descripcionIns").value;
	if (marca==0) {marca=1}

	//$("#exampleInputFile").val("");
	//$("#exampleInputFile2").val("");
	//$("#exampleInputFile3").val("");

	$.post("../../ajax/evaluacion.php?op=mostrar&idley="+idley+'&idtitulo='+idtitulo+'&idcapitulo='+idcapitulo+'&idinstitucion='+idinstitucion,{idarticulo : idarticulo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
		$("#SeleccionArchivo").hide();
		$("#SeleccionArchivo2").hide();
		$("#SeleccionArchivo3").hide();
		$("#observacion").val(data.observacion);
		$("#descripcionIns2").val(desinstitu);
		$("#descripcionLey").val(data.descripcionLey);
		$("#descripcionTit").val(data.descripcionTit);
		$("#descripcionCap").val(data.descripcionCap);
		$("#descripcionArt").val(data.descripcionArt);
		$("#numero").val(data.numero);
		$("#descripcionArtD").val(data.descripcionArtD);
		//Coloca los Id en pantalla
		if (data.idevaluacion===undefined) {
			data.idevaluacion=0;
		}
		if (data.nombredocumento1==null || data.nombredocumento1===undefined || data.nombredocumento1=="" ) {
			$("#SeleccionArchivo").show();
			$("#EliminaArchivo").hide();
		}else{
			$("#SeleccionArchivo").hide();
			$("#EliminaArchivo").show();
		}
		if (data.nombredocumento2==null || data.nombredocumento2===undefined || data.nombredocumento2=="" ) {
			$("#SeleccionArchivo2").show();
			$("#EliminaArchivo2").hide();
		}else{
			$("#SeleccionArchivo2").hide();
			$("#EliminaArchivo2").show();
		}
		if (data.nombredocumento3==null || data.nombredocumento3===undefined || data.nombredocumento3=="" ) {
			$("#SeleccionArchivo3").show();
			$("#EliminaArchivo3").hide();
		}else{
			$("#SeleccionArchivo3").hide();
			$("#EliminaArchivo3").show();
		}

		$("#idevaluacion").val(data.idevaluacion);
		$("#idarticulo").val(data.idarticulo);
		$("#marca").val(data.marca);
		$('#marca').selectpicker('refresh');

		$('#nombrearch').val(data.nombredocumento1);
		$('#nombrearch2').val(data.nombredocumento2);
		$('#nombrearch3').val(data.nombredocumento3);

 	})
}

// Agregar o Editar Registros
function guardaryeditar(e)
{
	/*************Recupera Nombre de Archivo *****************/
	file = $('input[id=exampleInputFile]').val().replace(/C:\\fakepath\\/i, '');
	file2 = $('input[id=exampleInputFile2]').val().replace(/C:\\fakepath\\/i, '');
	file3 = $('input[id=exampleInputFile3]').val().replace(/C:\\fakepath\\/i, '');
	/********************************************************/

	if (file==''&&graba1==' ') {fileI= document.getElementById("nombrearch").value;file=fileI;}
	if (file2==''&&graba2==' ') {fileI2= document.getElementById("nombrearch2").value;file2=fileI2;}
	if (file3==''&&graba3==' ') {fileI3= document.getElementById("nombrearch3").value;file3=fileI3;}

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
	var idarticulod = document.getElementById("idarticulo").value;

	if (file!=''&&fileI==' '){file11 = idinstitucionpar + idley + idtitulo + idcapitulo + idarticulod + file; file = file11;}
	if (file2!=''&&fileI2==' '){file22 = idinstitucionpar + idley + idtitulo + idcapitulo + idarticulod + file2; file2 = file22;}
	if (file3!=''&&fileI3==' '){file33 = idinstitucionpar + idley + idtitulo + idcapitulo + idarticulod + file3; file3 = file33;}

	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../ajax/evaluacion.php?op=guardaryeditar&idley="+idley+'&idtitulo='+idtitulo+'&idcapitulo='+idcapitulo+'&idinstitucion='+idinstitucionpar+'&file='+file+'&file2='+file2+'&file3='+file3,
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
	cargararchivo(file,file2,file3);
	limpiar();
}

function recuperadesinstitucion(idinstitucionpar){

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

function cargararchivo(file,file2,file3){

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
  		url: "../../ajax/evaluacion.php?op=cargaarchivo&filen="+file+"&filen2="+file2+"&filen3="+file3,
  		type: "POST",
  		data: formData,
	    contentType: false,
	    processData: false,
  		//data: { name: "John" }
	}).done(function( msg ) {
  			//alert( "Data Saved: " + msg );
	});    
}

function eliminaarchivo(){

	var filenom = graba1;
	if (filenom!="" && filenom!=null) {

		name = '../vistas/documentos/subidas/'+filenom;

    	$.ajax({
  			url: "../../ajax/evaluacion.php?op=eliminaarchivo&name="+name,
		}).done(function( msg ) {
  			//alert( "Data Saved: " + msg );
		});  

	}
}

function eliminaarchivo2(){

	//var filenom = document.getElementById("nombrearch2").value;
	var filenom = graba2;
	if (filenom!="" && filenom!=null) {

		name = '../vistas/documentos/subidas/'+filenom;

    	$.ajax({
  			url: "../../ajax/evaluacion.php?op=eliminaarchivo&name="+name,
		}).done(function( msg ) {
  			//alert( "Data Saved: " + msg );
		});  

	}
}

function eliminaarchivo3(){

	//var filenom = document.getElementById("nombrearch3").value;
	var filenom = graba3;
	if (filenom!="" && filenom!=null) {

		name = '../vistas/documentos/subidas/'+filenom;

    	$.ajax({
  			url: "../../ajax/evaluacion.php?op=eliminaarchivo&name="+name,
		}).done(function( msg ) {
  			//alert( "Data Saved: " + msg );
		});  

	}
}

function cambiaformu(){
	$("#SeleccionArchivo").show();
	$("#EliminaArchivo").hide();
	$("#exampleInputFile").val("");
	//$("#nombrearch").val("");
	graba1 = document.getElementById("nombrearch").value;
	$("#nombrearch").val("");
}

function cambiaformu2(){
	$("#SeleccionArchivo2").show();
	$("#EliminaArchivo2").hide();
	$("#exampleInputFile2").val("");
	//$("#nombrearch2").val("");
	graba2 = document.getElementById("nombrearch2").value;
	$("#nombrearch2").val("");
}

function cambiaformu3(){
	$("#SeleccionArchivo3").show();
	$("#EliminaArchivo3").hide();
	$("#exampleInputFile3").val("");
	//$("#nombrearch3").val("");
	graba3 = document.getElementById("nombrearch3").value;
	$("#nombrearch3").val("");
}


init();