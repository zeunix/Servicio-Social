<?php

  header('Content-Type: application/json');

  $response=array('status'=>"ERROR");

  require('../../comunes/conectar.php');

  $query="SELECT * FROM residuos.res_empresa";
    
	$result=mysqli_query($dbh,$query);

	$f=mysqli_num_rows($result);
  
  if($f)
	{
    $tabla="<table style='text-align: center' class='table table-bordered'><thead>";
    $tabla.="<tr>
              <th>#</th>
              <th>Nombre</th>
              <th>N&uacutemero de Autorizaci&oacuten</th>
              <th>Tipo</th>
              <th><button class='btn btn-primary'>Nueva Empresa</button></th>
            </tr></thead><tbody>";
    
    while($valor=mysqli_fetch_object($result))
    {		       
      $tabla.="<tr>";
      $tabla.="<td>".utf8_encode($valor->clave_emp)."</td>";
      $tabla.="<td>".utf8_encode($valor->nombre)."</td>";
      $tabla.="<td>".utf8_encode($valor->num_auto)."</td>";
    
      $qry="SELECT t.nombre FROM residuos.res_empresa e, residuos.res_emp_tipo t 
        WHERE e.clave_tipo = t.clave_tipo AND t.clave_tipo=".$valor->clave_tipo."";
      
      $resultTipo=mysqli_query($dbh,$qry);
      $tipo=mysqli_fetch_array($resultTipo);
      
      $tabla.="<td>".utf8_encode($tipo['nombre'])."</td>";
      $tabla.="<td>
      <button class='btn btn-success btn-sm' onclick='muestraModal(0,".$valor->clave_emp.")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></button>
      <button class='btn btn-danger btn-sm' onclick='muestraModal(1,".$valor->clave_emp.")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td>";
      $tabla.="</tr>";
		}
        $tabla.="</tbody></table>";
           
     //   echo $tabla;*/
     
       
        $response['tabla']=$tabla;
        $response['status']='OK';
	}
	else 
	{
    echo "No hay registros en la base de datos";
  }
    mysqli_close($dbh);
   echo json_encode($response);
?>