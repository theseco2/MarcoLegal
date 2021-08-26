var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){

}

function grabararchivo(){

	file = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
	alert('vamos '+file);
	/*$.ajax({
        url: '../../ajax/documento.php?op=cargararchivo&file='+file
    })*/
}



init();