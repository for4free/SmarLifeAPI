<?php
require 'conn.php';

  //  $uid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $Mid = @$_GET['Mid'] ? $_GET['Mid'] : '';


    if (empty($Mid)) {
        echo json_encode(array("status"=>"401",'Delete'=>'false'));
    }else{
       // $row =mysql_fetch_object( mysql_query("SELECT U_fid FROM user WHERE id = '$uid'"));
        $rs = mysql_query("delete model from model where Mid = '$Mid'");
        if(mysql_affected_rows() <= 0){
            echo json_encode(array("status"=>"402",'Delete'=>'false'));
            //die(mysql_error());
            exit;
        }
        echo json_encode(array("status"=>"403",'Delete'=>'true'));
    }

    mysql_free_result($rs);

    mysql_close();

?>