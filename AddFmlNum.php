<?php
require 'conn.php';

$uid = @$_GET['uid'] ? $_GET['uid'] : '';   //uid  or tid
$fid = @$_GET['fid'] ? $_GET['fid'] : '';

if (empty($uid)||empty($fid)) {
    echo json_encode(array("status"=>"401",'AddFmlNum'=>'false'));
}else{

    $rs = mysql_query("UPDATE user SET U_fid = '$fid' WHERE id = '$uid'");

    if(mysql_affected_rows() <= 0){
        echo json_encode(array("status"=>"402",'AddFmlNum'=>'false'));
        //die(mysql_error());
        exit;
    }else{
        echo json_encode(array("status"=>"403",'AddFmlNum'=>'true'));
    }

    mysql_free_result($rs);

    mysql_close();
}

?>