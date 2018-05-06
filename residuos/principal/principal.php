<?php
 session_start();
 require('../comunes/conectar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="../comunes/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../comunes/pagina.css" />
   
    <script type="text/javascript" src="../comunes/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../comunes/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="principal.js"></script>
   
    <title>Principal</title>
</head>
<body>
    
    <button type="button" class="btn btn-primary" onclick='consultarEmpresas()' >cargar</button>
  
    <div id="contenido"></div>   

    <div class="modal fade" id="editarEmp" tabindex="-1" role="dialog" aria-labelledby="editarEmpLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdl_titulo"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li role="presentation"  class="active"><a class="nav-link active" href="#datosEmp" aria-controls="datosEmp" data-toggle="tab">Datos de la Empresa</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#datosEmpDir" aria-controls="datosEmpDir" data-toggle="tab">Direccion de la Empresa</a>                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="datosEmp" >
                            <p hidden id='clave_emp_up'></p>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                                <input id="nombre" type="text" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Numero de Autorización</span>
                                <input id='numeroAuto' type="text" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Vigencia Inicial</span>
                                <input id='vI' type="text" class="form-control" aria-label="Nombre" aria-describedby="inputGroup-sizing-sm">
                            </div>
                        
                                <input id="vI" type="text" placeholder="Vigencia inicial">*<br>
                                <input id="vF" type="text" placeholder="Vigencia final">*<br>
                                <input id="cant" type="text" placeholder="Cantidad(numero)">*<br>
                                <input id="tipo" type="text" placeholder="Tipo empresa">*<br>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="datosEmpDir" >
                                <input id="calle" type="text" placeholder="calle">*<br>
                                <input id="numeroDir" type="text" placeholder="numero">*<br>
                                <input id="colonia" type="text" placeholder="colonia">*<br>
                                <input id="cp" type="text" placeholder="codigo postal">*<br>
                                <input id="ciudad" type="text" placeholder="ciudad">*<br>
                                <input id="estado" type="text" placeholder="estado">*<br>
                                <input id="tel1" type="text" placeholder="telefono 1"><br>
                                <input id="tel2" type="text" placeholder="telefono 2"><br>
                        </div>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class='btn btn-success' type="button" class="btn btn-secondary" data-dismiss="modal" onclick='actualizaEmpresa()'>Actualizar</button>
                </div>
                
            </div>
        </div>
    </div>    

    <div class="modal fade" id="eliminarEmp" tabindex="-1" role="dialog" aria-labelledby="eliminarEmpLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdl_titulo">Eliminar Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
                <div class="modal-body">                    
                    Est&aacute a punto de eliminar la empresa <p id='nombreEmp'></p> <br>
                    ¿Desea continuar?
                    <p hidden id='clave'></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="eliminaEmpresa()">Continuar</button>
                </div>
                
            </div>
        </div>
    </div>  

   
</body>