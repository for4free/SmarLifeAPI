<?php  
    require 'conn.php';     

    $tidORuid = @$_GET['tidORuid'] ? $_GET['tidORuid'] : '';   //uid  or tid
    $fmlNu = @$_GET['fmlNu'] ? $_GET['fmlNu'] : '';
    
	if (empty($tidORuid)||empty($fmlNu)) {
  	 	echo json_encode(array("status"=>"401",'JoinFamily'=>'false'));
   	}else{
   		if(!empty($fmlNu)){
   			//$rs = mysql_query("SELECT Fid FROM family WHERE family.Fid");
   			if(is_numeric($tidORuid)){
				$rs = mysql_query("UPDATE family,user SET user.U_fid_t = '$fmlNu' WHERE family.Fid = '$fmlNu' AND user.id = '$tidORuid'");
			}else{
				$rs2 = mysql_query("SELECT Fid FROM family WHERE TerminalId = '$tidORuid'");
				if(isset($rs2)){
					$row = mysql_fetch_object($rs2);
					$rs1 = mysql_query("UPDATE family SET TerminalId = 'a0' WHERE Fid = '$row->Fid'");
				}
				$rs = mysql_query("UPDATE family SET TerminalId = '$tidORuid' WHERE Fid = '$fmlNu'");
			}
		}
		
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'JoinFamily'=>'false'));
            //die(mysql_error());
            
            exit;         
			}
			$row2 = mysql_fetch_object(mysql_query("SELECT Fname FROM family WHERE TerminalId = '$tidORuid'"));
			echo json_encode(array("status"=>"403",'JoinFamily'=>'true','Fname'=>$row2->Fname));

			// 首先需要检测目录是否存在
			if (!is_dir('upload/icloud/'.$fmlNu.'/')){
				mkdir('upload/icloud/'.$fmlNu.'/'); // 如果不存在则创建并且赋予全部权限
				chmod('upload/icloud/'.$fmlNu.'/',0777);
			}
		}

		mysql_free_result($rs);
		mysql_free_result($rs1);
		mysql_free_result($rs2);

    	mysql_close(); 
	 