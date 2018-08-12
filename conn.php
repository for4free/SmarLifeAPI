<?php
 $conn=mysql_connect('127.0.0.1','root','mfeng19931004');  
    if(!$conn){ 
  	 	echo json_encode(array("status"=>"001",'conn'=>'false'));  
        exit;  
    }else{
		$sql='use smartlife_data';  
    	mysql_query($sql,$conn);  
    	$sql="set names utf8";  
   		mysql_query($sql,$conn);
   		$table_user='user';

		//统计API调用次数
		$rs = mysql_query("select * from api_data where date_data = CURDATE()");
		if(mysql_affected_rows() <= 0){
			$rs = mysql_query("INSERT INTO api_data (date_data) VALUES (CURDATE())");
		}
		$rs = mysql_query("UPDATE api_data SET num_data = num_data+1 WHERE date_data = CURDATE()");


	}
?>