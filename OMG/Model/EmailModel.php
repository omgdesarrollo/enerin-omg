<?php
require_once '../dao/EmailDao.php';
/*
 * @autor francisco reyes vazconcelos fvazconcelos@enerin.mx
 * 
 * 
 */
class EmailModel {
       public function verificarUsuarioExiste($value){
        try{
            $dao=new EmailDao();
            $rec= $dao->verificarUsuarioExiste($value) ;
//           echo "d ". json_encode($rec);
            if($rec[0]["existeusuario"]==1){
//                $value["usuario"]=$rec[0]["correo"];//al usuario se le asigna el correo 
                $value=array("from_email"=>"soporteomgapps@enerin.mx'","usuario"=>$value["usuario"],"correo"=>$rec[0]["correo"],"subject"=>"Resetear Contraseña","message"=>"Restablecer Cuenta","baseUri"=>$value["baseUri"],"urlResetearPassword"=>$value["urlResetearPassword"],"cliente"=>$value["cliente"]);
                self::estructuraMensajeCorreo($value);
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }
     } 
     
     private static function estructuraMensajeCorreo($value){
         try{
//                $cliente=$value["cliente"];
                $from_email = $value["from_email"]; // $_POST[email]
                $usuario=$value["usuario"];// a quien le va enviar el mensaje
                $correo=$value["correo"];
                $subject = $value["subject"];
                $mensaje="".$value["message"];      
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .='From:'.$from_email."\r\n";
                ob_start();
                require_once '../../OMG/View/EmailRecuperarCuentaView.php';
                $content= ob_get_clean();
                //echo json_encode( Session::getSesion("user"));
                mail($correo,$subject,$content, $headers);
                
             
         } catch (Exception $ex) {
             throw $ex;
            return false;
         }
     }
     
      public function resetearPassword($value){
        try{
            $dao=new EmailDao();
            $rec= $dao->verificarUsuarioExiste($value) ;
            if($rec[0]["existeusuario"]==1){
//                echo "el usuario cambio";
                        $dao->resetearPassword($value);
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            throw $ex;
            return false;
        }    
      }
}
