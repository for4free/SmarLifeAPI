<?php  
    require 'conn.php';     

    $uidORtid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
    $getId = @$_GET['getId'] ? $_GET['getId'] : '';
    
	if (empty($uidORtid)||empty($getId)||empty($getType)) {
  	 	echo json_encode(array("status"=>"401",'DeleteDevice'=>'false'));
   	}else{
		$rs = mysql_query("delete device from device,family where device.getId = '$getId' AND device.getType = '$getType' AND device.D_fid = family.Fid AND (family.CreatorId = '$uidORtid' OR family.TerminalId = '$uidORtid')");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'DeleteDevice'=>'false'));
            //die(mysql_error());
            exit;         
			}		
			echo json_encode(array("status"=>"403",'DeleteDevice'=>'true'));
		}	
    	
    	//�ͷŽ��  
    	mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	  
?>  