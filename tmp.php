<html>
    <head>
       <script>
        var i = 2;
        function f()
        {
               var x = document.getElementById("text1").value ;
        var y = document.getElementById("text2").value;  
       confirm(x);
        confirm(y);
        }
        
</script>
    </head>
    <body>
        
       Insert Name 1: <input id="text1" type="text" value="" >

Insert Name 2:<input id="text2" type="text" >

<input onclick="f()" type="button" value="click me" >
    </body>
</html>
