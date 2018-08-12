<?php  
    require 'conn.php';     

    $name = @$_GET['name'] ? $_GET['name'] : '';
    $pass = @$_GET['pass'] ? $_GET['pass'] : '';
    
	if (empty($name)||empty($pass)) {
  	 	echo json_encode(array("status"=>"201",'reg'=>'false'));
   	}else{
    		if(!mysql_query("insert into $table_user (name,pass,U_date) values ('$name','$pass',CURDATE())")){
            	echo json_encode(array("status"=>"202",'reg'=>'false'));
            	//die(mysql_error());
            	exit; 
			}
			
			$rs = mysql_query("select id FROM $table_user WHERE name = '$name' AND pass = '$pass'");	
    		class Data{  
       	 		public $id;  
    		}  
    		
    		$data=array();
      		
    		while($row=mysql_fetch_object($rs)){  
        		$s=new Data();
        		$s->id = $row->id;

        	   	$data[]=$s; 	 
    		}  
					 	
			echo json_encode(array("status"=>"203",'reg'=>'true','id'=>$s->id));  	
    	

    	mysql_free_result($rs);  

    	mysql_close(); 
	}  
?>  