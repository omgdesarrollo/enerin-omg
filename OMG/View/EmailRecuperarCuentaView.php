<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Recuperacion de Contraseña</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>
    <body style="margin: 0; padding: 0;">
     
        
        <table align="center" border="1" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
            <tr>

                <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                  <img src="https://cdn6.aptoide.com/imgs/d/4/e/d4e6d73b7562eb1624c72205668d5311_icon.png?w=240"  width="80" height="60" style="display: block;" />

             </td>

            </tr>
            <tr>
                <td>
                      Han solicitado reseteo de password si usted no hizo la peticion elimine el mensaje en caso de que usted
                           acepte la contraseña sera su correo  
                    
                </td>
                  
            </tr>
            <tr>
                <td>
                    
                    <a href="<?php echo $value["urlResetearPassword"]."&baseUri=".$value["baseUri"]."&usuario=".$value["usuario"]."&correo=".$value["correo"]."&cliente=".$value["cliente"] ?>">Selecciona Aqui Para Resetear Su Password   Su Contraseña Sera Su Correo </a>
                </td>
                
            </tr>
            
        </table>
     
       <?php
//       echo $mensaje;
       
       ?>
        
    </body>
</html>
