var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarley();
	mostrartitulo();
	mostrarcapitulo();

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
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrartitulo()
{
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');

	$.post('../../ajax/titulo.php?op=recuperar&idleypar='+idleypar,{idtitpar : idtitpar}, function(data, status)
	{

		data = JSON.parse(data);		
		//mostrarform(true);
		$("#descripciontitulo").val(data.descripcion);
 		//$("#idley").val(data.idley);

 	})
}

/*=============================================
	 FUNCION MOSTRAR REGISTRO
=============================================*/
function mostrarcapitulo()
{
	var idleypar = getParameterByName('idley');
	var idtitpar = getParameterByName('idtit');
	var idcappar = getParameterByName('idcap');

	$.post('../../ajax/capitulo.php?op=recuperar&&idleypar='+idleypar+'&idtitpar='+idtitpar,{idcappar : idcappar}, function(data, status)
	{

		data = JSON.parse(data);		
		//mostrarform(true);
		$("#descripcioncapitulo").val(data.descripcion);
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