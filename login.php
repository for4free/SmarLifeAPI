    <?php  
    require 'conn.php';     

    $arr=array();
    //$output = array();
    //$a = @$_GET['a'] ? $_GET['a'] : '';
    $name = @$_GET['name'] ? $_GET['name'] : '';
    $pass = @$_GET['pass'] ? $_GET['pass'] : '';
    
	if (empty($name)||empty($pass)) {
   		$arr = array("status"=>"101",'login'=>'false');
  	 	echo json_encode($arr);
   	}else{
    		$sql="select id,name,U_fid,U_fid_t,vs from $table_user,vs WHERE (name = '$name' or id = '$name')and pass = '$pass'";
    		$rs=mysql_query($sql);  
    		$row = mysql_fetch_array($rs);  
        	if(!$row or empty($row)){  
            		$arr = array("status"=>"102",'login'=>'false'); 
            		echo json_encode($arr);
            		exit; 
        	}   
      		$rs=mysql_query($sql); 

    	class UserId{  
       	 	public $name;  
        	public $id; 
        	public $easepass;  
        	public $U_fid;
		public $U_fid_t;
		public $vs;
		}
      
    	while($row=mysql_fetch_object($rs)){  
        	$s=new UserId();
        	$s->id=$row->id;    
        	$s->name=$row->name; 
        	$s->U_fid=$row->U_fid; 	
		$s->U_fid_t=$row->U_fid_t;
		$s->vs=$row->vs;
    	}

    	echo json_encode(array("status"=>"103",'login'=>'true','id'=>$s->id,'name'=>$s->name,'fid'=>$s->U_fid,'fid_t'=>$s->U_fid_t,'vs'=>$s->vs));
      
    	
    	mysql_free_result($rs);  

    	mysql_close(); 
	}  
    ?>  