<?php  
    require 'conn.php';     

    $name = @$_GET['name'] ? $_GET['name'] : '';
    $oldname = @$_GET['oldname'] ? $_GET['oldname'] : '';
  
    
	if (empty($name)||empty($oldname)) {
  	 	echo json_encode(array("status"=>"301",'mod'=>'false'));
   	}else{
   		mysql_query("update $table_user set name = '$name' where name = '$oldname'");
   		
    		if(mysql_affected_rows() <= 0){ 
            	echo json_encode(array("status"=>"302",'mod'=>'false'));
            	//die(mysql_error());
            	exit; 
				}else{
					echo json_encode(array("status"=>"303",'mod'=>'true'));  
				}	
    	
    	//�ͷŽ��  
    	//mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	}  
?>  