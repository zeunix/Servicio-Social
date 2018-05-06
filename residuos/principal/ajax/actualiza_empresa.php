<?php

header('Content-Type: application/json');
require('../../comunes/conectar.php');

$response=array('status'=>"ERROR");
//DATOS DEL A EMPRESA
$parametro= $_POST['parametros'];
$nombre=    $parametro['nombre'];
$numeroAuto=$parametro['numeroAuto'];
$vI=        $parametro['vI'];
$vF=        $parametro['vF'];
$cant=      $parametro['cant'];
$tipo=      $parametro['tipo'];
//DATOS DE LA DIRECCION DE LA EMPRESA
$calle=     $parametro['calle'];
$numeroDir= $parametro['numeroDir'];
$colonia=   $parametro['colonia'];
$cp=        $parametro['cp'];
$ciudad=    $parametro['ciudad'];
$estado=    $parametro['estado'];
$tel1=      $parametro['tel1'];
$tel2=      $parametro['tel2'];
$clave_emp= $parametro['clave_emp'];

$queryTipo="SELECT clave_tipo FROM residuos.res_emp_tipo WHERE nombre='".$tipo."'";
$t=mysqli_query($dbh,$queryTipo);
$f=mysqli_num_rows($t);

if($f){
    $array=mysqli_fetch_array($t);
    
    $queryEmp='UPDATE residuos.res_empresa SET nombre ="'.$nombre.'"
    , num_auto="'.$numeroAuto.'", vigencia_ini="'.$vI.'",vigencia_fin="'.$vF.'"
    , capacidad='.$cant.',clave_tipo='.$array["clave_tipo"].' WHERE clave_emp='.$clave_emp.'';

    $queryDir="UPDATE residuos.res_emp_dir SET calle ='".$calle."', numero='".$numeroDir."'
    , colonia='".$colonia."',cp='".$cp."',ciudad='".$ciudad."',estado='".$estado."',tel1='".$tel1."'
    , tel2='".$tel2." WHERE clave_emp=".$clave_emp."";
    
    if(mysqli_query($dbh,$queryEmp) && mysqli_query($dbh,$queryDir))
    {
        $response['status']='Ok';
    }
 
}
else {
    $response['status']="ERROR";
}
mysqli_close($dbh);
echo json_encode($response);

?>