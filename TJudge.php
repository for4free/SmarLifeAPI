<?php
require 'conn.php';

$tid = @$_GET['tid'] ? $_GET['tid'] : '';   //uid  or tid

if (empty($tid)) {
    echo json_encode(array("status"=>"401",'TJudge'=>'false'));
}else{

    $row=mysql_fetch_object(mysql_query("SELECT Fid,Fname FROM family WHERE TerminalId = '$tid' ORDER BY Fid"));


    if(mysql_affected_rows() <= 0){
        echo json_encode(array("status"=>"402",'TJudge'=>'false'));
        //die(mysql_error());
        exit;
    }else{
        echo json_encode(array("status"=>"403",'TJudge'=>'true','Fid'=>$row->Fid,'Fname'=>$row->Fname));
    }

    mysql_free_result($rs);

    mysql_close();
}

?>