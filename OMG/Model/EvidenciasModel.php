<?php

require_once '../dao/EvidenciasDAO.php';
require_once '../Pojo/EvidenciasPojo.php';

class EvidenciasModel
{
    public function listarEvidencias($ID_USUARIO,$CONTRATO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $bandera = true;
            $rec = $dao->listarEvidencias($ID_USUARIO,$CONTRATO);
            // foreach($rec as $key => $value)
            // {
            //     $tempInf = $dao->obtenerPadreTema($vale["id_tema"]);
            //     if(sizeof($tempInf)!=0)
            //     {
            //         while($bandera)
            //         {
            //             $tempInf[];
            //             $tempInf = $dao->obtenerPadreTema($vale["id_tema"]);
            //             if(sizeof($tempInf)!=0)
            //             {
                            
            //             }
            //             else
            //                 $bandera = false;
            //         }
            //     }
            // }
            
            foreach ($rec as $key => $value) 
            {
                $rec[$key]['programa_cargado']= $dao->verificarSiHayCargadoProgramaGantt($value['id_evidencias']);
            }
            
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    
    public function listarEvidencia($ID_EVIDENCIA,$ID_USUARIO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencia($ID_EVIDENCIA,$ID_USUARIO);

            return $rec;
        }catch(Exception $e)
        {
            throw $e;
            return false;
        }
    }

    public function getClavesDocumentos($cadena)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->getClavesDocumentos($cadena);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }

    public function crearEvidencia($ID_USUARIO,$ID_REGISTRO,$FECHA_CREACION)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->crearEvidencia($ID_USUARIO,$ID_REGISTRO,$FECHA_CREACION);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
            return false;
        }
    }
    
    public function iniciarEnVacio($id_evidencias)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->iniciarEnVacio($id_evidencias);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function actualizarPorColumna($COLUMNA,$CONTEXTO,$ID_EVIDENCIAS,$VALOR)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec= $dao->actualizarEvidenciaPorColumna($COLUMNA,$CONTEXTO,$ID_EVIDENCIAS,$VALOR);
            if($COLUMNA=="validacion_supervisor")
            {
                $rec = $dao->actualizarFechaValidacion($ID_EVIDENCIAS);
            }
            return $rec;
        }catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
    
    public function eliminarEvidencia ($id_evidencias)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $result = $dao->eliminarEvidencia($id_evidencias);
            
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function listarRegistros($CADENA,$ID_TEMA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $data = array();
            $hijos = $dao->obtenerHijosTema($ID_TEMA);
            // var_dump($hijos);
            $data = $dao->listarRegistros($CADENA,$ID_TEMA);
            $bandera = true;
            $key = 0;
            while( $bandera )
            {
                // var_dump($hijos);
                $value = $hijos[$key];
                // var_dump($value["id_tema"]);
                $hijosTemp = $dao->obtenerHijosTema($value["id_tema"]);
                // var_dump($hijosTemp);
                if( sizeof($hijosTemp)!=0 )
                    array_push($hijos,$hijosTemp[0]);

                $dataTemp = $dao->listarRegistros($CADENA,$value["id_tema"]);
                // var_dump($dataTemp);
                if( sizeof($dataTemp)!=0 )
                    array_push($data,$dataTemp[0]);
                // echo $key;
                $key++;
                if( sizeof($hijos) == $key)
                    $bandera = false;
            }
            // var_dump($hijos);
            return $data;
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function componerTablaTemas()
    {
        try
        {
            $dao=new EvidenciasDAO();
            $data = array();
            $temas = $dao->listarTodosTemas();
            foreach($temas as $key => $value)
            {
                $hijos = $dao->obtenerHijosTema($value["id_tema"]);
                if( sizeof($hijos)!=0 )
                {
                    $tmp = array();
                    $bandera = true;
                    $key = 0;
                    while($bandera)
                    {
                        $v = $hijos[$key];
                        $dao->cambiarDatosTema($v["id_tema"],$value["id_tema"],$value["id_empleado"]);
                        $temp = $dao->obtenerHijosTema($v["id_tema"]);
                        if( sizeof($temp)!=0 )
                            array_push($hijos,$temp[0]);
                        $key++;
                        if( sizeof($hijos) == $key)
                            $bandera = false;
                    }
                }
            }
            return "TERMINO BIEN";
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function listarTemas($CADENA,$ID_USUARIO,$CONTRATO)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->listarTemas($CADENA,$ID_USUARIO,$CONTRATO);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE,$COLUMNA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE,$COLUMNA);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function checarDisponiblidad($ID_REGISTRO,$FECHA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->checarDisponiblidad($ID_REGISTRO,$FECHA);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
//    public function actualizarFechaValidacion($ID_EVIDENCIAS, $VALIDACION)
//    {
//        try
//        {
//            $dao=new EvidenciasDAO();
//            $rec= $dao->actualizarFechaValidacion($ID_EVIDENCIAS, $VALIDACION);
//            
//            return $rec;
//        } catch (Exception $ex)
//        {
//            throw $ex;
//            return false;
//        }
//    }
    
}
?>