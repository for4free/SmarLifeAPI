<?php  
    require 'conn.php';     

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
    $getId = @$_GET['getId'] ? $_GET['getId'] : '';
    $newData  = @$_GET['newData'] ? $_GET['newData'] : 0;
    $flag  = @$_GET['flag'] ? $_GET['flag'] : 0;
    
	if (empty($uid)||empty($getType)||empty($getId)) {
  	 	echo json_encode(array("status"=>"401",'setData'=>'false'));
   	}else{
   	
   		$rs = mysql_query("UPDATE device,user SET Ddata = '$newData',flag = '$flag' WHERE device.getType = '$getType' AND device.getId = '$getId' AND user.id = '$uid' AND user.U_fid = device.D_fid");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'setData'=>'false'));
            //die(mysql_error());
            exit; 
			}else{
				echo json_encode(array("status"=>"403",'setData'=>'true'));  
		}	
    	
    	//ʍ�Žṻ  
    	mysql_free_result($rs);  
    	//�رՁ��Ӡ 
    	//ͨ����ШҪʹӃ mysql_close()��ҲΪґ�����ķǳ־Á��ӻᔚ�ű�ִАͪ�Ϻ�ה���رՠ 
    	mysql_close(); 
	}  
?>  