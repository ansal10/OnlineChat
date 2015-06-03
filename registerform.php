<html>
    <head>
        <title> Register Form </title>
    </head>
    <body>
        <script>
            function validateRegisterForm()
            {
                if(document.register.phone.value.length !== 10)
                {
                    alert("enter valid number");
                    return false;
                }
                if(document.register.password.value.length == 0)
                {
                    alert("enter password\n");
                    return false;
                }
                if(document.register.password.value !== document.register.repassword.value)
                {
                   alert("password not matched");
                   return false;
                }
                
                return true;
            }
        </script>
        <form name="register" action="register.php" method ="POST" onsubmit="return validateRegisterForm()">
           
            USERNAME:  <input type ="text" name="username"><br>
            PASSWORD: <input type="password" name ="password">
            RE ENTER PASSWORD <input type="password" name ="repassword"><br>
            NAME: <input type ="text" name ="name"><br>
            EMAIL: <input type="text" name ="email"><br>
            AGE: <input type="text" name="age"><br>
            SEX: <input type="radio" name="sex" value="F">Female
            <input type="radio" name="sex" value="M">Male <br>
            MOBILE: <input type="text" name="phone" ><br>
            <input type="submit" value="Register Now">
               
        </form>        
    </body>
        
</html>
