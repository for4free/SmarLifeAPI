<?php  
    require 'conn.php';     

    $uidORtid = @$_GET['uidORtid'] ? $_GET['uidORtid'] : '';
    //$getTyp = @$_GET['getType'] ? $_GET['getType'] : '';
    //$getId = @$_GET['getId'] ? $_GET['getId'] : '';
    
	if (empty($uidORtid)) {
  	 	echo json_encode(array("status"=>"401",'getFamilyNum'=>'false'));
   	}else{
   		
   		$rs = mysql_query("select id,Fid,Fname,name FROM family,user WHERE user.U_fid = (SELECT family.Fid FROM family,user WHERE user.id = '$uidORtid' AND user.U_fid = family.Fid)");
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'getFamilyNum'=>'false'));
            //die(mysql_error());
            exit; 
			}else{
			//ת��Ϊ���󣬴�������  
    		class Data{  
       	 		//public $Fid;
       	 		//public $Fname;
       	 		public $id;  
       	 		public $name;  
        		
    		}  
    		
    		$data=array();
    		
      
    		while($row=mysql_fetch_object($rs)){  
        		$s=new Data();
        		//$s->Fid = $row->Fid;
        		//$s->Fname = $row->Fname; 
        		$s->id = $row->id;    
        		$s->name = $row->name; 
        		  
        		$fname = $row->Fname;
        		$fid = $row->Fid;
        		//�������  
        	   	$data[]=$s; 	 
    		}  
				//exit(json_encode($data));
				echo json_encode(array("status"=>"403",'getFamilyNum'=>'true','Fid'=>$fid,'Fname'=>$fname,'result'=>$data)); 
		}	
    	
    	//�ͷŽ��  
    	mysql_free_result($rs);  
    	//�ر�����  
    	//ͨ������Ҫʹ�� mysql_close()����Ϊ�Ѵ򿪵ķǳ־����ӻ��ڽű�ִ����Ϻ��Զ��ر�  
    	mysql_close(); 
	}  
?>  