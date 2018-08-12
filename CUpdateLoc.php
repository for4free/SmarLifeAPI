<?php
require 'conn.php';

$id = @$_GET['id'] ? $_GET['id'] : '';
$setLong = @$_GET['setLong'] ? $_GET['setLong'] : '';
$setLat = @$_GET['setLat'] ? $_GET['setLat'] : '';

if (empty($id)) {
    echo json_encode(array("status"=>"401",'SetLoc'=>'false'));
}else{
    if(!empty($setLong)&&!empty($setLat)){
        $rs = mysql_query("UPDATE user SET U_lon = $setLong,U_lat = $setLat WHERE id = $id");

    }

    if(mysql_affected_rows() <= 0){
        echo json_encode(array("status"=>"402",'SetLoc'=>'false'));
        exit;
    }
    echo json_encode(array("status"=>"403",'SetLoc'=>'true'));
}

mysql_free_result($rs);
mysql_close();

?>