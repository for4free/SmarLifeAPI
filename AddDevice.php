<?php  
    require 'conn.php';     

    $uidORtid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
    $getId = @$_GET['getId'] ? $_GET['getId'] : '';
    $getName = @$_GET['getName'] ? $_GET['getName'] : '';
    
	if (empty($uidORtid )||empty($getType)||empty($getId)||empty($getName)) {
  	 	echo json_encode(array("status"=>"401",'AddDevice'=>'false'));
   	}else{
   		
   		$rest = mysql_query("SELECT user.id FROM user,family WHERE (user.U_fid = family.Fid AND user.id = '$uidORtid') OR (family.TerminalId = '$uidORtid')");	
   		if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"400",'AddDevice'=>'false'));
    		mysql_free_result($rest);
            exit; 
		}else{
			if($getType == 'a1'){
				$data = "0_0";
				$flag = '0';
			}
			else if($getType == '5'){
				$data = "0_0";
				$flag = '1';
			}else if($getType == 'a3' || $getType == 'a2'){
				$data = "0_0_0";
				$flag = '0';
			}else{
				$data = "0";
				$flag = '0';
			}
			$rs = mysql_query("INSERT INTO device (device.Dname,device.D_fid,device.getType,device.getId,device.Ddata,device.flag) SELECT '$getName',MAX(family.Fid),'$getType','$getId','$data','$flag' FROM family,user WHERE ((user.id = '$uidORtid' AND user.U_fid = family.Fid) OR (family.TerminalId = '$uidORtid'))");
	    	if(mysql_affected_rows() <= 0){ 
	            echo json_encode(array("status"=>"402",'AddDevice'=>'false'));
	            //die(mysql_error());
	            exit; 
			}else{
				echo json_encode(array("status"=>"403",'AddDevice'=>'true'));  
			}
			mysql_free_result($rest);
    	mysql_free_result($rs);   
		}
    	mysql_close(); 
	}
?>  