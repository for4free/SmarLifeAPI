<?php  
    require 'conn.php';     

    $tidORuid = @$_GET['tidORuid'] ? $_GET['tidORuid'] : '';   //uid  or tid
    $setLong = @$_GET['setLong'] ? $_GET['setLong'] : '';
    $setLat = @$_GET['setLat'] ? $_GET['setLat'] : '';
    
	if (empty($tidORuid)) {
  	 	echo json_encode(array("status"=>"401",'SetInfo'=>'false'));
   	}else{
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'SetInfo'=>'false'));
            //die(mysql_error());
            exit;         
			}		
			echo json_encode(array("status"=>"403",'SetInfo'=>'true'));
		}	

    	mysql_free_result($rs);  

    	mysql_close(); 
	  
?>  