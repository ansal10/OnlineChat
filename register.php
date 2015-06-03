<html>
    <head>
        <script>
            function f()
            {
                alert("Successfully registered \n login now");
                window.location="index.php";
            }
        </script>
         
    </head>
    <body>
        <?php

        $client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");

        $user = $_POST["username"];
        $pass = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $sex = $_POST["sex"];
        $phone = $_POST["phone"];
        $param = array("arg0"=>$user ,
                "arg1"=>$pass,
                "arg2"=>$name,
                "arg3"=>$email,
                "arg4"=>$age,
                "arg5"=>$sex,
                "arg6"=>$phone);
        $response = (array)$client->Register($param);
            echo $response['return'];
    ?>
        <script>
            f();
        </script>
    </body>
</html>