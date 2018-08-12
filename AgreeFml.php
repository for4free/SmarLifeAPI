<?php
    require 'conn.php';

    $tidORuid = @$_GET['tidORuid'] ? $_GET['tidORuid'] : '';   //uid  or tid
    $Fid = @$_GET['Fid'] ? $_GET['Fid'] : '';
    $agree = @$_GET['agree'] ? $_GET['agree'] : '1';  //1为不同意 2为同意

    if (empty($tidORuid)||empty($Fid)||empty($agree)) {
        echo json_encode(array("status"=>"401",'BKFamily'=>'false'));
    }else{

        if ($agree == '2'){  //同意加入家庭  更新表
            $rs = mysql_query("UPDATE user SET U_fid = '$Fid',U_fid_t = 'a' WHERE id = '$tidORuid'");
        }else{
            $rs = mysql_query("UPDATE user SET U_fid = 'a',U_fid_t = 'a' WHERE id = '$tidORuid'");
        }

        if(mysql_affected_rows() <= 0){
            echo json_encode(array("status"=>"402",'BKFamily'=>'false'));
            //die(mysql_error());

            exit;
        }
        echo json_encode(array("status"=>"403",'BKFamily'=>'true'));
    }

    mysql_free_result($rs);

    mysql_close();

?>