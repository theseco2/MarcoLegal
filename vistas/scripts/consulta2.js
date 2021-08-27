var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	recuperaley();
	$("#idley").change(recuperatitulo);
	$("#idtitulo").change(recuperacapitulo);
	$("#idcapitulo").change(listar);
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
					url: '../../ajax/consulta.php?op=listar_articulos',
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
function retornains()
{	
	location.href = "../modulos/ConsultaEvaluacion.php";	
}

init();