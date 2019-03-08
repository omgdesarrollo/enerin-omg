<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <script src="../../js/jquery.js" type="text/javascript"></script>
        <script>
//            console.log("el valo "+window.top.$("#typePorSiLaSeSessionExpira").val());
            console.log("E  ",window.top.typePorSiLaSeSessionExpira);
//            console.log("d ",$("#informacion").parent().context.referrer);
//             window.location.href=""+$("#informacion").parent().context.referrer;
                window.parent.location.href="login.php?t="+window.top.typePorSiLaSeSessionExpira;
        </script>
    </head>
    <body>
  fsdfsd
    </body>
</html>
