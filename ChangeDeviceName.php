<?php  
    require 'conn.php';     

    $uidORtid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
    $getId = @$_GET['getId'] ? $_GET['getId'] : '';
    $newName  = @$_GET['newName'] ? $_GET['newName'] : '';
    
	if (empty($uidORtid)||empty($getType)||empty($getId)||empty($newName)) {
  	 	echo json_encode(array("status"=>"401",'ChangeDeviceName'=>'false'));
   	}else{
   
   		$rs = mysql_query("UPDATE device,family,user SET device.Dname = '$newName' WHERE device.getType = '$getType' AND device.getId = '$getId' AND (family.TerminalId = '$uidORtid' OR (user.id = '$uidORtid' AND user.U_fid = family.Fid)) AND family.Fid = device.D_fid");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'ChangeDeviceName'=>'false'));
            //die(mysql_error());
            exit; 
			}else{
				echo json_encode(array("status"=>"403",'ChangeDeviceName'=>'true'));  
		}	
    	
    	mysql_free_result($rs);  
    	mysql_close(); 
	}  
?>  