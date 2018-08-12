<?php  
    require 'conn.php';     

    $tidORuid = @$_GET['tidORuid'] ? $_GET['tidORuid'] : '';   //uid  or tid
    $setLong = @$_GET['setLong'] ? $_GET['setLong'] : '';
    $setLat = @$_GET['setLat'] ? $_GET['setLat'] : '';
    
	if (empty($tidORuid)) {
  	 	echo json_encode(array("status"=>"401",'GetInfo'=>'false'));
   	}else{
   		
	$rs = mysql_query("SELECT * FROM tempinfo,family,user WHERE (user.id = '$tidORuid' AND user.U_fid = tempinfo.TI_fid) OR (tempinfo.TI_fid = family.Fid AND family.TerminalId = '$tidORuid')");
		
		
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'GetInfo'=>'false'));
            //die(mysql_error());
            exit;       
            }  else{

			
    		class Data{  
       	 		public $lon;
       	 		public $lat;    
    		}  
    		
    		//$data=array();
      
    		while($row=mysql_fetch_object($rs)){  
        		$s=new Data();
        		$s->lon = $row->lon;
        		$s->lat = $row->lat;
        
        	   //	$data[]=$s; 	 
    		}  	
			echo json_encode(array("status"=>"403",'GetInfo'=>'true','lon'=>$s->lon,'lat'=>$s->lat));
		}
			//�ͷŽ��  
    	mysql_free_result($rs);  	
	}
    	
    
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	  
?>  