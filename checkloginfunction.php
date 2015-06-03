<?php
        $client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $param = array("arg0"=>$user , "arg1"=>$pass);
        $response = (array)$client->CheckLogin($param);
        if($response['return']==""){echo "FALSE";}
        else {echo "TRUE";}
        