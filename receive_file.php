<?php  
    $target_path  = "./upload/img/";//接收文件目录  
    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);  
    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {  
       //echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded"; 
       echo json_encode(array("status"=>"303",'upload'=>'true')); 
    }  else{  
      // echo "There was an error uploading the file, please try again!" . $_FILES['uploadedfile']['error'];  
       echo json_encode(array("status"=>"302",'upload'=>'false'));
    }  
    ?>  