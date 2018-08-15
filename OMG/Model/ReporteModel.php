<?php
require_once '../dao/ReporteDao.php';
  class ReporteModel{

    public function listarReportes($CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
//              $nuevafecha = date('Y-m-j');
            
        
//        echo json_encode($nuevafecha);
              
        
          
//                for($v=1;$v<500000;$v++){
                        
//            $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
//            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                        $lista= $dao->listarReportes($CONTRATO);
//                }
          
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    
   public static function checar($v1){
    
//       if($v1==1){
////           self::$v=0;      
//       }
//       else{
//           return  self::$v+=1;
//       }
              
              return  self::$v+=2;

    }
}
?>
