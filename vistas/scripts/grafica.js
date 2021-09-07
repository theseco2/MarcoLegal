var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarinstitucion();
	mostrarley();	

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
	 FUNCION Recupera parametro
=============================================*/
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


init();