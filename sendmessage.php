<?php

 $client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");
 
 $sender =$_GET["sender"];
 $reciever =$_GET["reciever"];
 $message= $_GET["message"];
 //echo $sender."<br>".$reciever."<br>".$message."<br>";
 $param = array("arg0"=>$sender , "arg1"=>$reciever ,"arg2"=>$message);
 $response = (array)$client->sendMessage($param);
 $result = $response['return'];
 if($result==""){echo "0";}
 else {echo "1";}

