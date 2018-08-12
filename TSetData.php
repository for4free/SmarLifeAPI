<?php  
    require 'conn.php';     

    $Tid = @$_GET['Tid'] ? $_GET['Tid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
    $getId = @$_GET['getId'] ? $_GET['getId'] : '';
    $newData  = @$_GET['newData'] ? $_GET['newData'] : 0;
    $flag  = @$_GET['flag'] ? $_GET['flag'] : 0;
    
	if (empty($Tid)||empty($getType)||empty($getId)) {
  	 	echo json_encode(array("status"=>"401",'setData'=>'false'));
   	}else{
   
   		$rs = mysql_query("UPDATE device,family SET Ddata = '$newData',flag = '$flag' WHERE device.getType = '$getType' AND device.getId = '$getId' AND family.TerminalId = '$Tid' AND family.Fid = device.D_fid");
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