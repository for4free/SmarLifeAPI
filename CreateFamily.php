<?php  
    require 'conn.php';     

    $uid = @$_GET['uid'] ? $_GET['uid'] : '';   //uid  or tid
    $fmlName = @$_GET['fmlName'] ? $_GET['fmlName'] : '';
    
	if (empty($uid)||empty($fmlName)) {
  	 	echo json_encode(array("status"=>"401",'CreateFamily'=>'false'));
   	}else{
		$rs = mysql_query("INSERT INTO family (CreatorId,Fname,F_time) VALUES ('$uid','$fmlName',CURDATE())");

		$rs = mysql_query("SELECT Fid FROM family WHERE CreatorId = '$uid' ORDER BY Fid");

		class Data{
			public $Fid;
		}
		//$data=array();
		while($row=mysql_fetch_object($rs)){
			$s=new Data();
			$s->Fid = $row->Fid;
			//	$data[]=$s;
		}
		//$rs = mysql_query("UPDATE family,user SET user.U_fid = (select Fid FROM family WHERE CreatorId = '$uid') WHERE family.Fid = (select Fid FROM family WHERE CreatorId = '$uid') AND user.id = '$uid'");
		//$rs = mysql_query("UPDATE family,user SET user.U_fid");
		$rs = mysql_query("UPDATE user SET user.U_fid = ($s->Fid) WHERE id = '$uid'");

    	if(mysql_affected_rows() <= 0){
            echo json_encode(array("status"=>"402",'CreateFamily'=>'false'));
            //die(mysql_error());
            exit; 
		}else{
			echo json_encode(array("status"=>"403",'CreateFamily'=>'true'));
		}	

    	mysql_free_result($rs);  

    	mysql_close(); 
	}
	  
?>  