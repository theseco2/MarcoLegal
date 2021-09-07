var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarinstitucion();
	mostrarley();
	listar();
}


//Función Listar_Articulos
function listar()
{
	
	/*************Recuperamos parametro de institucion*******/
	const valores = window.location.search;
	//Creamos la instancia
	const urlParams = new URLSearchParams(valores);
	//Accedemos a los valores
	var idinstpar = urlParams.get('idinst');
	var idleypar = urlParams.get('idley');
	/********************************************************/

	

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
					url: '../../ajax/consulta.php?op=listar_articulos2',
					data:{idinstpar:idinstpar, idleypar:idleypar},
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
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrarinstitucion()
{
	var idinstpar = getParameterByName('idinst');
	$.post("../../ajax/institucion.php?op=recuperar",{idinstpar : idinstpar}, function(data, status)
	{

		data = JSON.parse(data);		
		//mostrarform(true);
		$("#descripcioninstitucion").val(data.descripcion);
 		//$("#idley").val(data.idley);

 	})
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
	 
=============================================*/
function retornagrafica()
{	
	var idleypar = getParameterByName('idley');
	var idinstpar = getParameterByName('idinst');
	
	location.href = '../modulos/grafica.php?idinst='+idinstpar+'&idley='+idleypar;
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