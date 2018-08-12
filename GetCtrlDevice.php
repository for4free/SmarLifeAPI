<?php
require 'conn.php';

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';
    $Mid = @$_GET['Mid'] ? $_GET['Mid'] : '';

    if (empty($uid)||empty($Mid)) {
        echo json_encode(array("status"=>"401",'getData'=>'false'));
    }else{

        //type 5 6 9 a a1 a2 a3 a4 a5
        $row =mysql_fetch_object( mysql_query("SELECT Mdata FROM model WHERE Mid = '$Mid'"));
        $str =  $row->Mdata;
        $arr = explode("=",$str);

        $rs = mysql_query("select getType,getId,Dname,Ddata,flag FROM device,user WHERE user.id = $uid AND user.U_fid = device.D_fid AND (device.getType = '5' OR device.getType = '6' OR device.getType = '9' OR device.getType = 'a' OR device.getType = 'a1' OR device.getType = 'a2'  OR device.getType = 'a3' OR device.getType = 'a4' OR device.getType = 'a5') ORDER BY getType,getId");

        if(mysql_affected_rows() <= 0){
            echo json_encode(array("status"=>"402",'getData'=>'false'));
            //die(mysql_error());
            exit;
        }else{

            class Data{
                public $Dname;
                public $getType;
                public $getId;
                public $Ddata;
                public $flag;
            }

            $data=array();

            while($row2=mysql_fetch_object($rs)){
                foreach($arr as $u) {
                    $strarr = explode("+", $u);
                    $type =$row2->getType;
                    $id =  $row2->getId;
                    $type_t = 999;
                    if($strarr[0] == $type."_".$id){
                        $type_t = $type;
                        $id_t = $id;
                        break;
                    }
                }
                if(($type_t != $type && $id_t != $id)||($type_t==999)){
                    $s=new Data();
                    $s->getType = $type;
                    $s->getId = $id;
                    $s->Dname = $row2->Dname;
                    $s->Ddata = $row2->Ddata;
                    $s->flag = $row2->flag;
                    $data[]=$s;
                }

            }
            //exit(json_encode($data));
            echo json_encode(array("status"=>"403",'getData'=>'true','result'=>$data));
        }


        mysql_free_result($rs);
        mysql_close();
    }
?>