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
			//转换为对象，处理数据  
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
        		//填充数组  
        	   	$data[]=$s; 	 
    		}  
				//exit(json_encode($data));
				echo json_encode(array("status"=>"403",'getFamilyNum'=>'true','Fid'=>$fid,'Fname'=>$fname,'result'=>$data)); 
		}	
    	
    	//释放结果  
    	mysql_free_result($rs);  
    	//关闭连接  
    	//通常不需要使用 mysql_close()，因为已打开的非持久连接会在脚本执行完毕后自动关闭  
    	mysql_close(); 
	}  
?>  