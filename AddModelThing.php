<?php
require 'conn.php';

    //  $uid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $Mid = @$_GET['Mid'] ? $_GET['Mid'] : '';
    $Did = @$_GET['Did']?$_GET['Did']:0;
    $Thing = @$_GET['Thing']?$_GET['Thing']:0;

    if (empty($Mid)||empty($Mid)||empty($Thing)) {
        echo json_encode(array("status"=>"401",'Add'=>'false'));
    }else{
        $row =mysql_fetch_object( mysql_query("SELECT Mdata FROM model WHERE Mid = '$Mid'"));
        $data = $Did."+".$Thing."=".$row->Mdata;
        $rs = mysql_query("UPDATE model SET Mdata = '$data' WHERE Mid = '$Mid'");
        if(mysql_affected_rows() <= 0){
            echo json_encode(array("status"=>"402",'Add'=>'false'));
            //die(mysql_error());
            exit;
        }
        echo json_encode(array("status"=>"403",'Add'=>'true'));
    }

mysql_free_result($rs);

mysql_close();

?>