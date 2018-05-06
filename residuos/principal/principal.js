$(document).ready(function() 
{	
	$('#cargando').hide();
	
});

function consultarEmpresas()
{
	
	$.ajax({
		url: "ajax/consulta_empresas.php",
		type: "post",
		dataType:'json',
		success: function(data)
		{
			if(data.status='Ok')
			{		
				$("#contenido").html(data.tabla);
			}
			else
			{
				alert(data.status);
			}
		},
		error:function()
			{
				alert('Error en ajax/consulta_empresas.php...');
			}
		
	})
}
function muestraModal(op,idEmp)
{
	
	if(op==0){
		$('#clave_emp_up').html(idEmp);
		$('#editarEmp').modal('show');
	}
	else{
		$('#clave').html(idEmp);
		$('#eliminarEmp').modal('show');
	}
}
function actualizaEmpresa()
{
	var clave=document.getElementById('clave_emp_up').innerHTML;
	var parametros={'nombre':$('#nombre').val(),
					'numeroAuto':$('#numeroAuto').val(),
					'vI':$('#vI').val(),
					'vF':$('#vF').val(),
					'cant':$('#cant').val(),
					'tipo':$('#tipo').val(),
					'calle':$('#calle').val(),
					'numeroDir':$('#numeroDir').val(),
					'colonia':$('#colonia').val(),
					'ciudad':$('#ciudad').val(),
					'estado':$('#estado').val(),
					'cp':$('#cp').val(),
					'tel1':$('#tel1').val(),
					'tel2':$('#tel2').val(),
					'clave_emp':clave}
	var b=0;
	
	for(var i in parametros)
	{
		if(parametros[i].trim()=='' && i!='tel1' && i!='tel2'){
			b++;
		}
	}
	
	if(b==0)
	{
		$.ajax({
			url:"ajax/actualiza_empresa.php",
			type:'post',
			data:{parametros},
			dataType:'json',
			success:function(data){
				if(data.status='Ok')
				{	
					$('#contenido').html(data.tipo);
					alert("accep");
				}
				else
				{
					alert('nooooo');
				}
			},
			error:function(){
				alert("error en actualiza_empresa");
			}
		})
	}	
	else 
	{
		alert("Faltan datos");
	} 
}
function eliminaEmpresa()
{
	var clave=document.getElementById('clave').innerHTML;
	
	$.ajax({
		url:"ajax/elimina_empresa.php",		
		type:'post',
		data:{'clave_emp':clave},
		dataType:'json',
		success: function(data)
		{
			if(data.status='Ok')
			{
				consultarEmpresas();
			}
			else{
				alert(data.status);
			}
		},
		error: function(){
			alert('Error en elimina_empresa.php');
		}	})
	
}
