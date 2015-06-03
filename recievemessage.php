<?php
$rst="";
try {
  $client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");

$param=array("arg0"=>$_GET["username"]);
$res = (array)$client->getMessage($param);

if(count($res,1)==1)
{
    $temp = (array)$res['return'];
     $rst = $rst."<h3>".$temp['name']."::<br>".$temp['message']."</h3>"."<h4>".$temp['time']."</h4>";
}
else if(count($res,1)>1)
{
    for($i = 0 ; $i < count($res['return'] ) ; $i++)
    {
    $temp = (array)$res['return'][$i];
    $rst = $rst."<h4>".$temp['name']."::<br>".$temp['message']."</h4>"."<h6>".$temp['time']."</h6>";
    }
}

/*for($i = 0 ; $i < count($res ) ; $i++)
{
    $temp = (array)$res['return'][$i];
    $rst = $result.$temp['name']."::<br>".$temp['message']."<br><br>";
}*/

echo $rst;  
} catch (Exception $ex) {
    echo $rst."<br></h4>please press clear screen button<br></h4>";
}
