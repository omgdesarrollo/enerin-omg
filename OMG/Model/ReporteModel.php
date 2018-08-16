<?php
require_once '../dao/ReporteDao.php';
  class ReporteModel{
        public function listarReportes($CONTRATO)
        {
            try
            {
                $dao=new ReporteDao();
                $lista= $dao->listarReportes($CONTRATO);   
                return $lista;
            }catch (Exception $ex)
            {
                throw $ex;
                return -1;
            }
        }
    }
<<<<<<< HEAD
=======
    
    
    
   public static function checar($v1){
    
//       if($v1==1){
////           self::$v=0;      
//       }
//       else{
//           return  self::$v+=1;
//       }
              
              return  self::$v+=2;

    }
    
    public function listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $rec= $dao->listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CONTRATO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}
>>>>>>> 8a4b53adb18f60018450ea9d75b3040e8d658773
?>
