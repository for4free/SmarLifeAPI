<?php  
    require 'conn.php';     
	include_once('Easemob.class.php');
	
    $name = @$_GET['name'] ? $_GET['name'] : '';
    $pass = @$_GET['pass'] ? $_GET['pass'] : '';
   // $id = @$_GET['id'] ? $_GET['id'] : '';
    //$oldpass = @$_GET['oldpass'] ? $_GET['oldpass'] : '';
    
   // $options['client_id']="YXA6OW0O8AhgEeaAZ_fjmf64Nw";	
//	$options['client_secret']="YXA6z8d7kkMjvv1JRq-kBZTWrUhYrfI";
//	$options['org_name']="1993666";
//	$options['app_name']="smartlife";
//	$easemob=new Easemob($options);

    
	if (empty($name)||empty($pass)) {
  	 	echo json_encode(array("status"=>"301",'mod'=>'false'));
   	}else{
   			mysql_query("update $table_user set pass = '$pass' where name = '$name'");
   		
    		if(mysql_affected_rows() <= 0){ 
            	echo json_encode(array("status"=>"302",'mod'=>'false'));
            	//die(mysql_error());
            	exit; 
				}else{
					

					
					echo json_encode(array("status"=>"303",'mod'=>'true','huanxin'=>$result,'$account'=>$account)); 
				}	
    	

    	mysql_free_result($rs);

    	mysql_close(); 
	}  
?>  