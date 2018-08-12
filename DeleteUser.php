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
    	
    	//释放结果  
    	mysql_free_result($rs);  
    	//关闭连接  
    	//通常不需要使用 mysql_close()，因为已打开的非持久连接会在脚本执行完毕后自动关闭  
    	mysql_close(); 
	}  
?>  