<?php  
    require 'conn.php';     

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';
    $getType = @$_GET['getType'] ? $_GET['getType'] : '';
   //$getId = @$_GET['getId'] ? $_GET['getId'] : '';
    
	if (empty($uid)||empty($getType)) {
  	 	echo json_encode(array("status"=>"401",'getData'=>'false'));
   	}else{
   		$rs = mysql_query("select getType,getId,Dname,Ddata FROM device,user WHERE user.id = $uid AND user.U_fid = device.D_fid AND device.getType = $getType");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'getData'=>'false'));
            //die(mysql_error());
            exit; 
			}else{
			//ת��Ϊ���󣬴�������  
    		class Data{  
       	 		public $Dname;
       	 		public $getType;
       	 		public $getId;  
        		public $Ddata;  
    		}  
    		
    		$data=array();
      
    		while($row=mysql_fetch_object($rs)){  
        		$s=new Data();
        		$s->getType = $row->getType;
        		$s->getId = $row->getId;
        		$s->Dname = $row->Dname;    
        		$s->Ddata = $row->Ddata;   
        		//�������  
        	   	$data[]=$s; 	 
    		}  
				//exit(json_encode($data));
				echo json_encode(array("status"=>"403",'getData'=>'true','result'=>$data)); 
		}	
    	
    	//�ͷŽ��  
    	mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	}  
?>  