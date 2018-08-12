<?php
include_once('Easemob.class.php');

$options['client_id']="YXA6OW0O8AhgEeaAZ_fjmf64Nw";
$options['client_secret']="YXA6z8d7kkMjvv1JRq-kBZTWrUhYrfI";
$options['org_name']="1993666";
$options['app_name']="smartlife";
$easemob=new Easemob($options);

if(isset($_POST['username']) && isset($_POST['password'])){
	$account['username']=$_POST['username'] ;  	
	$account['password']=$_POST['password'];
	//这里处理自己服务器注册的流程
	//自己服务器注册成功后向环信服务器注册
	$result=$easemob->openRegister($account);
	
	echo $result;
}else{
	$res['status']=404;
	$res['message']="params is not right";
	echo json_encode($res);
}
?>