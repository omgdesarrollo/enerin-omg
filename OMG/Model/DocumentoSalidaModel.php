<?php

require_once '../dao/DocumentoSalidaDAO.php';
require_once '../Pojo/DocumentoSalidaPojo.php';

class DocumentoSalidaModel {
    //put your code here
    public function  listarDocumentosSalida($CONTRATO){
        try{
            $lista=[];
            $dao=new DocumentoSalidaDAO();
            $rec1=$dao->mostrarDocumentosSalida($CONTRATO);
            $rec2=$dao->mostrarDocumentosSalidaSinFolio($CONTRATO);
            $contador=0;
            foreach($rec1 as $key => $value)
            {
                $lista[$contador]=$value;
                $contador++;
            }
            foreach($rec2 as $key => $value)
            {
                $lista[$contador]=$value;
                $contador++;
            }
            return $lista;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    public function listarFoliosDeEntrada()
    {
        try{
            $dao=new DocumentoSalidaDAO();
            $rec=$dao->listarFoliosDeEntrada();
            
            
            return $rec;
        }  catch (Exception $ex){
            throw  $ex;
            return -1;
        }
        
    }


    public function insertar($pojo){
        try{
            $dao=new DocumentoSalidaDAO();
            $lista=array();
            $contador=0;
            
           $exito= $dao->insertarDocumentosSalida($pojo->getId_documento_entrada(),$pojo->getFolio_salida(),$pojo->getFecha_envio(),
                                          $pojo->getAsunto(),$pojo->getDestinatario(),$pojo->getObservaciones());
           
            if($exito[0] = 1)
            {
                $rec= $dao->mostrarDocumentoSalida($exito['id_nuevo']);
//                echo "valor rec: ".json_encode($rec);              
                foreach($rec as $value)
                {
                    $lista[$contador]= array(
                        "id_documento_salida"=>$value["id_documento_salida"],
                        "id_documento_entrada"=>$value["id_documento_entrada"],
                        "documento"=>$value["documento"],
                        "folio_entrada"=>$value["folio_entrada"],
                        "folio_salida"=>$value["folio_salida"],
                        "fecha_envio"=>$value["fecha_envio"],
                        "asunto"=>$value["asunto"],
                        "clave_autoridad"=>$value["clave_autoridad"],
                        "destinatario"=>$value["destinatario"],
                        "nombre_empleado"=>$value["nombre_empleado"],
                        "apellido_paterno"=>$value["apellido_paterno"],
                        "apellido_materno"=>$value["apellido_materno"],
                        "documento"=>$value["documento"],
                        "observaciones"=>$value["observaciones"]    
                    );
    //                $cont++;
                    $contador++;
                }
            return $lista;
            } 
            else
//                return $exito[0];
            return $lista;
           
        } catch (Exception $ex) {
                throw $ex;
                return -1;
        }
    }
    
    
    
    public function actualizar($pojo){
        try{
            $dao= new ClausulaDAO();
        $dao->actualizarClausula($pojo->getIdClausula(),$pojo->getClausula(),$pojo->getSubClausula(),
                $pojo->getDescripcionClausula(),$pojo->getDescripcionSubClausula(),$pojo->getTextoBreve(),
                $pojo->getDescripcion(),$pojo->getPlazo());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO_SALIDA){
        try{
            $dao=new DocumentoSalidaDAO();
            $rec= $dao->actualizarDocumentoSalidaPorColumna($COLUMNA, $VALOR, $ID_DOCUMENTO_SALIDA);
            
        } catch (Exception $ex) {

        }
    }
    
    
    
    public function eliminarDocumentoSalidaConFolio($ID_DOCUMENTO)
    {
        try
        {
            $dao=new DocumentoSalidaDAO();
            $rec= $dao->eliminarDocumentoSalidaConFolio($ID_DOCUMENTO);

            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function responsablesDelTemaCombobox()
    {
        try 
        {
            $dao=new DocumentoSalidaDAO();
            $rec= $dao->responsablesDelTemaCombobox();
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }

    
    public function responsableDelTemaParaFiltro($CONTRATO)
    {
        try 
        {
            $dao=new DocumentoSalidaDAO();
            $rec1= $dao->responsableDelTemaParaFiltroConFolio($CONTRATO);
            $rec2= $dao->responsableDelTemaParaFiltroSinFolio($CONTRATO);
            $lista=[];
            $contador=0;
            
            foreach ($rec1 as $key => $value) 
            {
                $lista[$contador]= $value;
                $contador++;        
            }
            echo json_encode($rec2);
            foreach ($rec2 as $key => $value) 
            {
                if($rec2[0]['id_empleado'] == $rec1[0]['id_empleado'])
                {
                    
                } else{
                    $lista[$contador]= $value;
                $contador++;                     
                }
                    
            }
            
            return $lista;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }

    
    //    AREA DEL DOCUMENTO DE SALIA SIN FOLIO DE ENTRADA
    
    public function eliminarDocumentoSalidaSinFolio($ID_DOCUMENTO)
    {
        try
        {
            $dao=new DocumentoSalidaDAO();
            $rec= $dao->eliminarDocumentoSalidaSinFolio($ID_DOCUMENTO);

            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
    
    
}

?>