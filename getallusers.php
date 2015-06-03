<?php

$client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");
$response =(array) $client->getUsers();
//print_r($response);
$result ="";
    for($i = 0 ; $i < count($response['return']) ; $i++)
    {
        $temp = (array)$response['return'][$i];
        $user = $temp['username'];
        $name = $temp['name'];
        $result=$result."<input  type='radio' name='user' value='".$user."'>".$name." ( ".$user." ) "."<br>";
    }
    echo $result;


