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
    	
    	//释放结果  
    	//mysql_free_result($rs);  
    	//关闭连接  
    	//通常不需要使用 mysql_close()，因为已打开的非持久连接会在脚本执行完毕后自动关闭  
    	mysql_close(); 
	}  
?>  