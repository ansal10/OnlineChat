<html>
    <head>
        <title>Welcome to Online Chat Service</title>
        <script>
            function validateLoginForm(){
                   var username = document.forms["loginform"]["user"].value;
                   var password = document.loginform.pass.value;
                   if(username==="")
                   {
                       alert("enter username");
                       return false;
                   }
                   if(password==="")
                   {
                       alert("enter password");
                       return false;
                   }
                   
                   return true;
            }
            function register(){
            
                window.location="registerform.php";
            }
        </script>
    </head>
<body>
     <br><br><br> 
    <form name = "loginform" action="login.php?" method="POST" onsubmit="return validateLoginForm()">
        USERNAME : <input type="text" name="user" size="20"> <br>
         PASSWORD : <input type="password" name ="pass">
         <input type ="submit" value="login" >
         
         <br><br><br>     
        New User ?? <br>Register Here!<input type="button" value ="REGISTER" onclick="register()">
    </form>
    <form action="register.php" >
        
    </form>
</body>
</html>