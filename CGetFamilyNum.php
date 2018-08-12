<?php  
    require 'conn.php';     

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';
    //$getTyp = @$_GET['getType'] ? $_GET['getType'] : '';
    //$getId = @$_GET['getId'] ? $_GET['getId'] : '';F
    
	if (empty($uid)) {
  	 	echo json_encode(array("status"=>"401",'getFamilyNum'=>'false'));
   	}else{
		$rs = mysql_query("SELECT U_fid FROM user WHERE id = '$uid'");
		$row = mysql_fetch_object($rs);
   		$rs = mysql_query("SELECT F_Mid,U_fid,id,name,Fid,CreatorId,Fname FROM family,user WHERE (U_fid = '$row->U_fid' AND U_fid = Fid) OR (U_fid_t = '$row->U_fid' AND U_fid_t = Fid)");
   		
   		
    	if(mysql_affected_rows() <= 0){ 
            echo json_encode(array("status"=>"402",'getFamilyNum'=>'false'));
            //die(mysql_error());
            exit; 
			}else{

    		class Data{  
       	 		//public $Fid;
       	 		public $id;
				public $passFid;
       	 		public $name;
    		}  
    		
    		$data=array();
			
    		while($row=mysql_fetch_object($rs)){  
        		$s=new Data();
        		//$s->Fid = $row->Fid;
        		//$s->Fname = $row->Fname; 
        		$s->id = $row->id;    
        		$s->name = $row->name; 
				$s->passFid = $row->U_fid;
				$s->F_Mid = $row->F_Mid;
        		$fname = $row->Fname;
        		$fid = $row->Fid;
				$CreatorId = $row->CreatorId;

        	   	$data[]=$s; 	 
    		}  
				//exit(json_encode($data));
				echo json_encode(array("status"=>"403",'getFamilyNum'=>'true','Fid'=>$fid,'ModelID'=>$s->F_Mid,'Fname'=>$fname,'CreatorId'=>$CreatorId,'result'=>$data));
		}
    	mysql_free_result($rs);
    	mysql_close(); 
	}  
?>  