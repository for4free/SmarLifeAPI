<?php  
    require 'conn.php';     

    $name = @$_GET['name'] ? $_GET['name'] : '';
    $pass = @$_GET['pass'] ? $_GET['pass'] : '';
    
	if (empty($name)||empty($pass)) {
  	 	echo json_encode(array("status"=>"201",'reg'=>'false'));
   	}else{
    		if(!mysql_query("delete from $table_user where name = '$name' AND pass = '$pass'")){ 
            	echo json_encode(array("status"=>"202",'reg'=>'false'));
            	//die(mysql_error());
            	exit; 
			}
			
					 	
			echo json_encode(array("status"=>"203",'reg'=>'true'));  	
    	
    	//�ͷŽ��  
    	mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	}  
?>  