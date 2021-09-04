var tabla;

/*=============================================
	 FUNCION INICIAL DE CARGA
=============================================*/
function init(){
	
	mostrarform();
	recuperainstitucion();
	recuperaley();
	$("#idley").change(recuperatitulo);
	$("#idtitulo").change(recuperacapitulo);
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
		//generagrafica();
	})
	.fail(function(){
		alert('Error al Cargar Capitulo')
	})
}


function generagrafica()
{
	
	var idinstitucion = document.getElementById("idinstitucion").value;
	var idley = document.getElementById("idley").value;
	var idtitulo = document.getElementById("idtitulo").value;
	var idcapitulo = document.getElementById("idcapitulo").value;
	
	location.href = '../modulos/grafica.php?idinst='+idinstitucion+'&idley='+idley+'&idtit='+idtitulo+'&idcap='+idcapitulo;
	

}



init();