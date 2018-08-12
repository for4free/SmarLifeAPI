<?php  
    require 'conn.php';     

    $uid = @$_POST['uid'] ? $_POST['uid'] : '';
    $msg = @$_POST["msg"] ? $_POST["msg"] : '';
    $con = @$_POST['con'] ? $_POST['con'] : '';
    
	if (empty($uid)||empty($msg)) {
  	 	echo json_encode(array("status"=>"401",'BackMsg'=>'false'));
   	}else{
		$rs = mysql_query("INSERT INTO backmsg (B_uid,msg,contact,date) VALUES ('$uid','$msg','$con', CURDATE())");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'BackMsg'=>'false'));
            //die(mysql_error());
            exit; 
		}else{
			echo json_encode(array("status"=>"403",'BackMsg'=>'true'));  
		}	

    	//�ͷŽ��  
    	mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	}
?>  