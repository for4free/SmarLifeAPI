<?php
require 'conn.php';

$getType = @$_GET['getType'] ? $_GET['getType'] : '';
$getId = @$_GET['getId'] ? $_GET['getId'] : '';
$newData  = @$_GET['newData'] ? $_GET['newData'] : 0;
$flag  = @$_GET['flag'] ? $_GET['flag'] : 0;

if (empty($getType)||empty($getId)) {
    echo json_encode(array("status"=>"401",'setData'=>'false'));
}else{

    $rs = mysql_query("UPDATE device SET Ddata = '$newData',flag = '$flag' WHERE getType = '$getType' AND getId = '$getId'");
    if(mysql_affected_rows() <= 0){
        echo json_encode(array("status"=>"402",'setData'=>'false'));
        //die(mysql_error());
        exit;
    }else{
        echo json_encode(array("status"=>"403",'setData'=>'true'));
    }

    mysql_free_result($rs);
    mysql_close();
}
?>