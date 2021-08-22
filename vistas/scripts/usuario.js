var tabla; 

//Función que se ejecuta al inicio
function init(){
	
	$.post("../../ajax/usuario.php?op=selectRol",function(r){
			$("#idrol").html(r);
			$('#idrol').selectpicker('refresh');
		})


	//Mostramos los permisos
	$.post("../../ajax/usuario.php?op=permisos&id=",function(r){
	        $("#permisos").html(r);
	});

	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{

		//Verifica que el login no este repetido
		idusuarioo=$("#idusuario").val();
		if(idusuarioo == 0)
		{
			validapermiso(e);
		}
		else
		{
			if($("input[type='checkbox']").is(':checked') === true)
			{
    			guardaryeditar(e);
			}
  			else{
  				bootbox.alert("Debe seleccionar almenos un Permiso");
    			return false; //Soy invalid
  			} 
		}
	})

}

//Función limpiar
function limpiar()
{
	//$("#idrol").val("");
	$("#nombre").val("");
	$("#apellido").val("");
	$("#telefono").val("");
	$("#login").val("");
	$("#clave").val("");
	$("#idusuario").val("");
	$("input:checkbox[value=1]").prop("checked", false);
	$("input:checkbox[value=2]").prop("checked", false);
	$("input:checkbox[value=3]").prop("checked", false);
	$("input:checkbox[value=4]").prop("checked", false);
	$("input:checkbox[value=5]").prop("checked", false);
	$("input:checkbox[value=6]").prop("checked", false);
	$("input:checkbox[value=7]").prop("checked", false);
}

//Función mostrar formulario
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

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
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
					url: '../../ajax/usuario.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../ajax/usuario.php?op=guardaryeditar",
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

function mostrar(idusuario)
{
	//Mostramos los permisos
	$.post("../../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
	        $("#permisos").html(r);
	});

	$.post("../../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idrol").val(data.idrol);
		$('#idrol').selectpicker('refresh');
		$('#profesional').val(data.profesional);
		$('#profesional').selectpicker('refresh');
		$("#nombre").val(data.nombre);
		$("#apellido").val(data.apellido);
		$("#telefono").val(data.telefono);
		$("#login").val(data.login);
		//$("#clave").val(data.clave);
		$("#idusuario").val(data.idusuario);
		$.post("../../ajax/usuario.php?op=desincriptar&idcla="+data.clave, function(r){
	       	$("#clave").val(r);
		});

 	});
 	$.post("../../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
	        $("#permisos").html(r);
	});
}

//Función para desactivar registros
function desactivar(idusuario)
{
	bootbox.confirm("¿Está Seguro de desactivar el usuario?", function(result){
		if(result)
        {
        	$.post("../../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idusuario)
{
	bootbox.confirm("¿Está Seguro de activar el Usuario?", function(result){
		if(result)
        {
        	$.post("../../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Verifica que el login no este repetido
function verificalogin(e)
{
	e.preventDefault();
	loginaa=$("#login").val();

	$.post("../../ajax/usuario.php?op=verificaexistencialogin&idlogin="+loginaa,
 
        function(data)
    {
    	data = JSON.parse(data);
        if (data == null)
        {
        	guardaryeditar(e);       
        }
        else
        {
            bootbox.alert("Login ya Existe");
            $("#login").focus();
        }
    });
}

//Valida que tenga seleccionado almenos un permiso
function validapermiso(e)
{
	e.preventDefault();
    if($("input[type='checkbox']").is(':checked') === true)
    {
    	verificalogin(e);
    }
  	else{
  		bootbox.alert("Debe seleccionar almenos un Permiso");
    	return false; //Soy invalid
  	} 
}


init();