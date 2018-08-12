<?php
            require 'conn.php';

            $Mid = @$_GET['Mid'] ? $_GET['Mid'] : '';
            $uid = @$_GET['uid'] ? $_GET['uid'] : '';
            $tid = @$_GET['tid'] ? $_GET['tid'] : '';
            //$setLong = @$_GET['setLong'] ? $_GET['setLong'] : '';
            //$setLat = @$_GET['setLat'] ? $_GET['setLat'] : '';

            if (empty($Mid)||(empty($uid)&&empty($tid))) {
                echo json_encode(array("status"=>"401",'Change'=>'false'));
            }else{

                if(empty($tid)){
                    $row =mysql_fetch_object( mysql_query("SELECT U_fid FROM user WHERE id = '$uid'"));
                    $Fid = $row->U_fid;
                }else{
                    $row =mysql_fetch_object( mysql_query("SELECT Fid FROM family WHERE TerminalId = '$tid'"));
                    $Fid = $row->Fid;
                }

                //$row =mysql_fetch_object( mysql_query("SELECT U_fid FROM user WHERE id = '$uid'"));
                //$Fid = $row->U_fid;
                $row2 =mysql_fetch_object( mysql_query("SELECT Mdata FROM model WHERE Mid = '$Mid'"));
                $str =  $row2->Mdata;
                $arr = explode("=",$str);
                foreach($arr as $u) {
                    $strarr = explode("+", $u);
                    foreach($strarr as $s) {
                        $strarr2 = explode("_", $s);
                        $row3 =mysql_fetch_object( mysql_query("SELECT Ddata FROM device WHERE D_fid = '$Fid' AND getType = '$strarr2[0]' AND getId = '$strarr2[1]'"));
                        $data_t = $row3->Ddata;
                        $data = explode("_",$data_t);
                        if($strarr[1]=="开"){
                            if(empty($data[1])){
                                if($strarr2[0] == '9'){
                                    $Ddata = "5";
                                }else{
                                    $Ddata = "1";
                                }

                            }else if(empty($data[2])){
                                $Ddata = "1"."_".$data[1];
                            }else if(empty($data[3])){
                                $Ddata = "1"."_".$data[1]."_".$data[2];
                            }
                        }else{
                            if(empty($data[1])){
                                $Ddata = "0";
                            }else if(empty($data[2])){
                                $Ddata = "0"."_".$data[1];
                            }else if(empty($data[3])){
                                $Ddata = "0"."_".$data[1]."_".$data[2];
                            }
                        }
                        mysql_query("UPDATE device SET  Ddata = '$Ddata',flag = '1' WHERE D_fid = '$Fid' AND getType = '$strarr2[0]' AND getId = '$strarr2[1]'");
                    }
                }


                $rs = mysql_query("UPDATE family SET F_Mid = '$Mid' WHERE Fid = '$Fid'");
                if(mysql_affected_rows() <= 0){
                    echo json_encode(array("status"=>"402",'Change'=>'false'));
                    //die(mysql_error());
                    exit;
                }  else{
                    echo json_encode(array("status"=>"403",'Change'=>'true'));
                    }
            }
            mysql_free_result($rs);
            mysql_close();
?>