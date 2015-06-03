<html>
    <head>
        <title>welcome User</title>
<style>
    .ex
    {
    position: fixed;
    
    width:220px;
    padding:10px;
    border:5px solid green;
    margin:0px;

    height:100px;
    padding:10px;
    border:5px solid green;
    margin:0px;
    overflow: auto;
    
    }
    .successalign
    {
        color: green;
        text-align: right;
        line-height: 80%;
    }
    .failedalign
    {
        color: red;
        text-align: right;
        line-height: 80%;
    }
    .chat
    {
    
        
    width:600px;
    padding:10px;
    border:5px solid gray;
    margin:0px;

    height:350px;
    padding:10px;
    border:5px solid gray;
    margin:0px;
    
    overflow: auto;
    
    }
    .pos
    {
        position: fixed;
        top:30px;
        right:100px;
    }
    .textareasize
    {
        height:100px;
        width: 500px;
    }
    .clearchatbox
    {
        position: fixed;
        top: 410px;
        left: 520px;
        height: 20px;
        width: 100px;
           
    }
    .logout
    {
        position:fixed;
        top:5px;
        right:100px;
    }
    .registereduser
    {
        position: fixed;
        top:50px;
        right: 500px;
            
        width:180px;
        padding:10px;
        border:5px solid gray;
        margin:0px;

        height:320px;
        padding:10px;
        border:5px solid gray;
        margin:0px;

        overflow: auto;
    }
    .sendto
    {
        position:fixed;
        top: 7px;
        right: 620px;
    }
</style>

    </head>
    <body>
        <?php
        $result = "0";
        try{
        $name=$_POST["user"];
        $pass = $_POST["pass"];
        $param = array("arg0"=>$name , "arg1"=>$pass);
       // print_r($param);
        $client = new SoapClient("http://anas-pc:8080/OnlineChatting/OnlineChattingService?wsdl");
        $response =(array) $client->checkLogin($param);
        $result = $response['return'];
        }catch(Exception $e){$result="0";}

        ?>
        <?php
       
       $r = (array)$client->getUserDetails($param);
       $rs = (array)$r['return'];
       ?>
        
        <script>
            function redirect(){
                window.location = "index.php";
            }
            var r = '<?php echo $result ?>';
                if(r!=="1"){
                alert("USERNAME OR PASSWORD NOT MATCHED");
                redirect();
                }
        function sendmessage(){
                var x=document.getElementById("messege").value;
                // document.getElementsById("messege").value="";
                  if(x==="")alert("enter message");
                  else{
                      var rates = document.getElementsByName("user");
                        var reciever="";
                             for(var i = 0; i < rates.length; i++)
                                 {
                                     if(rates[i].checked){
                                        reciever = rates[i].value;
                                         }
                                 }
                       if(reciever==="")alert("select the user");
                       else{
                document.getElementById("messege").value="";
     
                
                
                        var xmlhttp;
                        xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function()
                          {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                            var response=xmlhttp.responseText;
                          
                            if(response==="0"){
                               document.getElementById("chatbox").innerHTML=document.getElementById("chatbox").innerHTML+"<h4 class='failedalign'>You:<br>"+x+"</h4>"+"<h6 class='failedalign' >sending failed</h6>" ;
                                }
                            else{
                                document.getElementById("chatbox").innerHTML=document.getElementById("chatbox").innerHTML+"<h4 class='successalign'>You:<br>"+x+"</h4>"+"<h6 class='successalign'>send successfull</h6>";
                                }
                                
                            }
                          };
                         
                        var url = "sendmessage.php?sender="+username+"&reciever="+reciever+"&message="+x;
                      
                        xmlhttp.open("GET",url,true);
                        xmlhttp.send();
                    }
                }
        }
        var getmessageinterval=2000;
           
           function clearchatbox(){
               document.getElementById("chatbox").innerHTML="";
           }
           function getmessage(){
               
               var xmlhttp;
                        xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function()
                          {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                            var res=xmlhttp.responseText;
                               document.getElementById("chatbox").innerHTML = document.getElementById("chatbox").innerHTML + res;                                       
                               if(res==="<h3>please press clear screen button</h3>")
                               {
                                   getmessageinterval+=2000;
                               }
                               else
                               {
                                   getmessageinterval=2000;
                               }
                             }
                          };
                         
                        
                        var url = "recievemessage.php?username="+username+"&hoeifh="+Math.random()*156451586941536241891;
                        xmlhttp.open("GET",url,true);
                        xmlhttp.send();
           }
           function getalert(){
               alert("hello");
           }
           
           {var username = '<?php echo $rs["username"] ?>';
       var name = '<?php echo $rs['name'] ?>';
       var email = '<?php echo $rs['email'] ?>';
       var age = '<?php echo $rs['age'] ?>';
       var sex = '<?php echo $rs['sex'] ?>';
       var phone = '<?php echo $rs['phone'] ?>';
       alert("Login Successfull");}
       function f(){
           var x ="<b class='align'>"+username.toUpperCase()+"</b><br>";
           x+="<b class='align'>"+name.toUpperCase()+"</b><br>";
           x+="<b class='align'>"+email.toUpperCase()+"</b><br>";
           x+="<b class='align'>"+age.toUpperCase()+"</b><br>";
           x+="<b class='align'>"+sex.toUpperCase()+"</b><br>";
           x+="<b class='align'>"+phone.toUpperCase()+"</b><br>";
          
           //x.fontcolor("red");
           document.getElementById("userdetails").innerHTML=x;
       }
       function logout(){
           var x = confirm("Are u sure to logout");
           if(x===true)
           {    window.location="index.php";}
           
       }
       function setusers(){
                        var xmlhttp;
                        xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function()
                          {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200)
                            {
                            var res=xmlhttp.responseText;
                              document.getElementById("allusers").innerHTML=res; 
                             }
                          };
                        var url = "getallusers.php?hoeifh="+Math.random()*156451586941536241891;
                        xmlhttp.open("GET",url,true);
                        xmlhttp.send();
           
       }
       </script>
       <p class="sendto" style="font-size: larger">SEND TO:</p>
       <div id="userdetails" class="ex pos" style="color: darkgreen; font-style: oblique;font-size: large" ></div>
         
       <div class="chat" id="chatbox"></div> <br>
       
       <textarea class ="textareasize" id="messege" placeholder="enter your text here"></textarea>
       <input  type="button" onclick="sendmessage()" value="Send Message"><br>
      
       <input type="button" class="clearchatbox" onclick="clearchatbox()" value="clear screen">
       <input type="button" class="logout" onclick="logout()" value="logout">   
       <div id="allusers" class="registereduser"></div>
       
       
       <script>
           f();
           setusers();
       
           setInterval(function(){getmessage();} , getmessageinterval);
       </script>
    </body>
</html>

 