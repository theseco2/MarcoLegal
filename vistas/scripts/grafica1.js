var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarform();
	recuperainstitucion();
	recuperaley();
	
}

// Recupera Instituciones
function recuperainstitucion()
{
	$.ajax({
		type: 'POST',
		url: '../../ajax/institucion.php?op=selectInstitucion'
		//data:{'peticion': 'selectUsuario'}
	})
	.done(function(lista_institucion){
		$('#idinstitucion').html(lista_institucion)
		$('#idinstitucion').selectpicker('refresh');
		//recuperatitulo();
	})
	.fail(function(){
		alert('Error al Cargar Instituciones')
	})
}

/*=============================================
	 FUNCION MOSTRAR FORMULARIO
=============================================*/
function mostrarform()
{
	$("#formulariofiltros").show();

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




function generagrafica()
{
	
	var idinstitucion = document.getElementById("idinstitucion").value;
	var idley = document.getElementById("idley").value;
	
	
	location.href = '../modulos/grafica.php?idinst='+idinstitucion+'&idley='+idley;
	

}



init();