<?php

    header('Content-Type: application/json');
    require('../../comunes/conectar.php');

    $response=array('status'=>"ERROR");
    $clave_emp=$_POST['clave_emp'];
   

        $queryEmp="DELETE FROM residuos.res_empresa WHERE clave_emp=".$clave_emp."";
        $queryEmpDir="DELETE FROM residuos.res_emp_dir WHERE clave_emp=".$clave_emp."";
        if(mysqli_query($dbh,$queryEmp)==true && mysqli_query($dbh,$queryEmpDir)==true)
        {
            $response['status']='Ok';
            
        }       
    
    else{
        //echo $clave_emp;
        $response['status']="No existe esa empresa";
    }

    mysqli_close($dbh);
    echo json_encode($response);
?>