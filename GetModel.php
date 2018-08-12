<?php
        require 'conn.php';

        $uid = @$_GET['uid'] ? $_GET['uid'] : '';
        $tid = @$_GET['tid'] ? $_GET['tid'] : '';
        //$setLong = @$_GET['setLong'] ? $_GET['setLong'] : '';
        //$setLat = @$_GET['setLat'] ? $_GET['setLat'] : '';

        if (empty($uid)&&empty($tid)) {
            echo json_encode(array("status"=>"401",'Get'=>'false'));
        }else{
            if(empty($tid)){
                $row =mysql_fetch_object( mysql_query("SELECT U_fid FROM user WHERE id = '$uid'"));
                $fid = $row->U_fid;
            }else{
                $row =mysql_fetch_object( mysql_query("SELECT Fid FROM family WHERE TerminalId = '$tid'"));
                $fid = $row->Fid;
            }

            $row2 = mysql_fetch_object(mysql_query("SELECT F_Mid FROM family WHERE Fid = '$fid'"));
            $row3 = mysql_fetch_object(mysql_query("SELECT Mname,Mid FROM model WHERE Mid = '$row2->F_Mid'"));

            $rs = mysql_query("SELECT * FROM model WHERE M_fid = '$fid'");


            if(mysql_affected_rows() <= 0){
                echo json_encode(array("status"=>"402",'Get'=>'false'));
                //die(mysql_error());
                exit;
            }  else{

                class Mdata{
                    public $Dtype;
                    public $Did;
                    public $Dname;
                    public $doThing;
                }
                class Data{
                    public $Mid;
                    public $Mname;
                    public $ModelTotal;
                    public $Mdata;
                }

                $data=array();

                while($row5=mysql_fetch_object($rs)){

                    $s = new Data();
                    $s->Mid = $row5->Mid;
                    $s->Mname = $row5->Mname;

                    $str =  $row5->Mdata;
                    $arr = explode("=",$str);
                    $mdata=array();

                    $i= 0;//计数

                    foreach($arr as $u){
                        $m = new Mdata();
                        $strarr = explode("+",$u);

                        $arr2 = explode("_",$strarr[0]);
                        $m->Dtype = $arr2[0];
                        $m->Did = $arr2[1];
                        $row4 =mysql_fetch_object( mysql_query("SELECT Dname FROM device WHERE D_fid = '$row->U_fid' AND getType = '$arr2[0]' AND getId = '$arr2[1]'"));


                        if($arr2[0]!="0"&&!empty($arr2[0])){
                            $i++;
                            $m->Dname = $row4->Dname;
                            $m->doThing = $strarr[1];
                            $mdata[]=$m;
                        }

                        $s->ModelTotal = $i;
                    }

                    $s->Mdata = $mdata;

                    $data[]=$s;
                }
                echo json_encode(array("status"=>"403",'Get'=>'true','MODEL'=>$row3->Mname,'MODELID'=>$row3->Mid,'data'=>$data));
            }

            mysql_free_result($rs);
        }


        mysql_close();

?>