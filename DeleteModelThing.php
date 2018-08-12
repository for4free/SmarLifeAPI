<?php
require 'conn.php';
 
    //  $uid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $Mid = @$_GET['Mid'] ? $_GET['Mid'] : '';
    $Did = @$_GET['Did'] ? $_GET['Did'] : '';

    if (empty($Mid)||empty($Did)) {
        echo json_encode(array("status"=>"401",'Delete'=>'false'));
    }else{
         $row =mysql_fetch_object( mysql_query("SELECT Mdata FROM model WHERE Mid = '$Mid'"));

         $str =  $row->Mdata;
         $arr = explode("=",$str);

        foreach($arr as $u) {
            $strarr = explode("+", $u);
            if($strarr[0] != $Did && !empty($strarr[0])){
                $Mdata = $Mdata.$strarr[0]."+".$strarr[1]."=";
            }
        }

        $rs = mysql_query("UPDATE model SET Mdata = '$Mdata' WHERE Mid = '$Mid'");
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