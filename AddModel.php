<?php
require 'conn.php';

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';
    $name = @$_GET['name'] ? $_GET['name'] : '';


    if (empty($uid)||empty($name)) {
        echo json_encode(array("status"=>"401",'Delete'=>'false'));
    }else{
        $row =mysql_fetch_object( mysql_query("SELECT U_fid FROM user WHERE id = '$uid'"));
        $rs = mysql_query("INSERT INTO model(Mname,M_fid) VALUES ('$name','$row->U_fid')");

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