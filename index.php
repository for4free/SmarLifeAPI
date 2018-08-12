<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>SmartLife API开发文档</title>
</head>
<body>
<?php
if($_SERVER['HTTP_REFERER'] != "http://2naive.cn/Smart/ui-elements.php"){
    header("location:http://2naive.cn/Smart/");
}
?>
<table class="bordered">
    <thead>
    <tr>
        <th>文件</th>   
        <th>获取数据示例</th>     
        <th>状态值信息</th>
        <th>功能说明</th>
    </tr>
    </thead>
    <tr>
        <td>login.php</td>      
        <td>URL:<a href="./login.php?name=昵称或ID&pass=密码" target="_black">/login.php?name=昵称或ID&pass=密码</a></td>  
        <td>001	数据库链接失败<br/>
        	101	传入空值<br/>
			102 未查询到结果/账号或密码错误<br/>
			103 校对成功<br/></td>
        <td>登陆功能<br/>
        	成功则返回用户的昵称和id</td>
    </tr>        
    <tr>
        <td>reg.php</td>   
        <td>URL:<a href="./reg.php?name=要注册的昵称&pass=密码" target="_black">/reg.php?name=要注册的昵称&pass=密码</a></td>      
        <td>201	传入空值<br/>
			202 注册失败/账号冲突<br/>
			203 注册成功<br/></td>
        <td>注册账号<br/>
        	</td>
    </tr>
    <tr>
        <td>DeleteUser.php</td>   
        <td>URL:<a href="./DeleteUser.php?name=昵称&pass=密码" target="_black">/DeleteUser.php?name=昵称&pass=密码</a></td>      
        <td>201	传入空值<br/>
			202 删除失败<br/>
			203 删除成功<br/></td>
        <td>删除账号<br/>
        	</td>
    </tr>
    <tr>
        <td>modpass.php</td>    
        <td>URL:<a href="./modpass.php?name=昵称&pass=新密码" target="_black">/modpass.php?name=昵称&pass=新密码</a></td>     
        <td>301	传入空值<br/>
			302 修改出错<br/>
			303 修改成功<br/></td>
        <td>修改密码<br/>未传入原密码，存在安全问题<br/>
    </tr>    
    <tr>
        <td>modnic.php</td> 
        <td>URL:<a href="./modnic.php?name=新昵称&oldname=原昵称" target="_black">/modnic.php?name=新昵称&oldname=原昵称</a></td>        
        <td>301	传入空值<br/>
			302 修改出错<br/>
			303 修改成功<br/></td>
        <td>修改昵称<br/>
    </tr>
    <tr>
        <td>receive_file.php</td> 
        <td>URL:/receive_file.php</td>        
        <td>302 上传失败<br/>
			303 上传成功<br/></td>
        <td>上传头像<br/>POST方式
    </tr>
    <tr>
        <td>天气接口</td> 
        <td>URL:<a href="http://wiki.swarma.net/index.php/%E5%BD%A9%E4%BA%91%E5%A4%A9%E6%B0%94API/v2" target="_black">接口文档</a></td>        
        <td></td>
        <td>实时天气查询<br/>天气预报查询（小时级别）
    </tr>
    <tr>
        <td>CGetData.php</td> 
        <td>URL:<a href="./CGetData.php?uid=用户ID&getType=设备类型" target="_black">/CGetData.php?uid=用户ID&getType=设备类型</a></td>        
        <td>401	传入空值<br/>
			402 获取数据失败<br/>
			403 获取数据成功<br/></td>
        <td>手机APP获取设备的数据<br/>设备类型为空则获取全部数据
    </tr>  
    <tr>
        <td>CSetData.php</td> 
        <td>URL:<a href="./CSetData.php?uid=用户ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位" target="_black">/CSetData.php?uid=用户ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位</a></td>        
        <td>401	传入空值<br/>
			402 数据未更改/更改失败<br/>
			403 更新成功<br/></td>
        <td>手机APP更新指定设备数据<br/>
    </tr>  
    <tr>
        <td>TSetData.php</td> 
        <td>URL:<a href="./TSetData.php?Tid=终端标识ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位" target="_black">/TSetData.php?Tid=终端标识ID&getType=传感器类型&getId=传感器ID&newData=新数据&flag=状态改变标志位</a></td>        
        <td>401	传入空值<br/>
			402 数据未更改/更改失败<br/>
			403 更新成功<br/></td>
        <td>室内终端更新指定设备数据<br/>
    </tr>
    <tr>
        <td>TGetData.php</td> 
        <td>URL:<a href="./TGetData.php?tid=终端设备ID&getType=设备类型" target="_black">/TGetData.php?tid=终端ID&getType=设备类型</a></td>        
        <td>401	传入空值<br/>
			402 获取数据失败<br/>
			403 获取数据成功<br/></td>
        <td>室内终端获取设备的数据<br/>设备类型为空则获取全部数据
    </tr> 
    <tr>
        <td>BakcMsg.php</td> 
        <td>URL:/BackMsg.php</td>        
        <td>401	传入空值<br/>
			402 反馈失败<br/>
			403 反馈成功<br/></td>
        <td>反馈建议消息<br/>POST方式
    </tr>
    <tr>
        <td>DeleteDevice.php</td> 
        <td>URL:<a href="./DeleteDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型" target="_black">/DeleteDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型</a></td>        
        <td>401	传入空值<br/>
			402 删除失败<br/>
			403 删除成功<br/></td>
        <td>家庭创建者或者室内终端删除设备<br/>
    </tr>
    <tr>
        <td>AddDevice.php</td> 
        <td>URL:<a href="./AddDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&getName=要显示的名称" target="_black">/AddDevice.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&getName=要显示的名称</a></td>        
        <td>400	未加入家庭<br/>
        	401	传入空值<br/>
			402 添加失败<br/>
			403 添加成功<br/></td>
        <td>添加新设备<br/>
    </tr>
    <tr>
        <td>SetInfo.php</td> 
        <td>URL:<a href="./SetInfo.php?tidORuid=用户ID或终端设备ID&setLong=经度&setLat=纬度" target="_black">/SetInfo.php?tidORuid=用户ID或终端设备ID&setLong=经度&setLat=纬度</a></td>        
        <td>401	传入空值<br/>
			402 设置失败<br/>
			403 设置成功<br/></td>
        <td>设置一些配置信息<br/>
    </tr>
    <tr>
        <td>GetInfo.php</td> 
        <td>URL:<a href="./GetInfo.php?tidORuid=用户ID或终端设备ID" target="_black">/GetInfo.php?tidORuid=用户ID或终端设备ID</a></td>        
        <td>401	传入空值<br/>
			402 获取失败<br/>
			403 获取成功<br/></td>
        <td>获取一些配置信息<br/>
    </tr>
    <tr>
        <td>ChangeDeviceName.php</td> 
        <td>URL:<a href="./ChangeDeviceName.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&newName=新名称" target="_black">/ChangeDeviceName.php?uidORtid=用户ID或终端设备ID&getId=设备ID&getType=设备类型&newName=新名称</a></td>
        <td>401	传入空值<br/>
			402 更改失败<br/>
			403 更改成功<br/></td>
        <td>更改设备名称<br/>
    </tr>
    <tr>
        <td>JoinFamily.php</td> 
        <td>URL:<a href="./JoinFamily.php?tidORuid=用户ID或终端设备ID&fmlNu=家庭ID" target="_black">/JoinFamily.php?tidORuid=用户ID或终端设备ID&fmlNu=家庭ID</a></td>
        <td>401	传入空值<br/>
			402 加入失败<br/>
			403 加入成功<br/></td>
        <td>加入家庭<br/>
    </tr>
    <tr>
        <td>CGetFamilyNum.php</td> 
        <td>URL:<a href="./CGetFamilyNum.php?uid=用户ID" target="_black">/CGetFamilyNum.php?uid=用户ID</a></td>        
        <td>401	传入空值<br/>
			402 获取数据失败<br/>
			403 获取数据成功<br/></td>
        <td>APP端获取家庭数据
    </tr> 
    <tr>
        <td>BKFml.php</td> 
        <td>URL:<a href="./BKFml.php?tidORuid=用户ID" target="_black">/BKFml.php?tidORuid=用户ID</a></td>
        <td>401	传入空值<br/>
			402 退出失败<br/>
			403 退出成功<br/></td>
        <td>退出家庭<br/>
    </tr>
    <tr>
        <td>CreateFamily.php</td> 
        <td>URL:<a href="./CreateFamily.php?uid=用户ID&fmlName=家庭名称" target="_black">/CreateFamily.php?uid=用户ID&fmlName=家庭名称</a></td>
        <td>401	传入空值<br/>
			402 创建失败<br/>
			403 创建成功<br/></td>
        <td>创建家庭<br/>
    </tr>
</table>
<p align="right">*通过访问带参的链接返回JSON数据；GET方法获取数据安全性相对较低，后期有时间将改为POST方法。</p>
</body>
<style>

body {
    width: 100%;
    margin: 0px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 14px;
    color: #444;
}

table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
    border-radius: 0px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
 
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 0px 0 0 0;
    -webkit-border-radius: 0px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 0px 0 0;
    -webkit-border-radius: 0 0px 0 0;
    border-radius: 0 0px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 0px 0px 0 0;
    -webkit-border-radius: 0px 0px 0 0;
    border-radius: 0px 0px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 0px;
    -webkit-border-radius: 0 0 0 0px;
    border-radius: 0 0 0 0px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 0px 0;
    -webkit-border-radius: 0 0 0px 0;
    border-radius: 0 0 0px 0;
}



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 0px 0 0 0;
    -webkit-border-radius: 0px 0 0 0;
    border-radius: 0px 0 0 0;
}

.zebra th:last-child {
    -moz-border-radius: 0 0px 0 0;
    -webkit-border-radius: 0 0px 0 0;
    border-radius: 0 0px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 0px 0px 0 0;
    -webkit-border-radius: 0px 0px 0 0;
    border-radius: 0px 0px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 0px;
    -webkit-border-radius: 0 0 0 0px;
    border-radius: 0 0 0 0px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 0px 0;
    -webkit-border-radius: 0 0 0px 0;
    border-radius: 0 0 0px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 0px 0px;
    -webkit-border-radius: 0 0 0px 0px
    border-radius: 0 0 6px 0px
}
  
</style>
</html>
