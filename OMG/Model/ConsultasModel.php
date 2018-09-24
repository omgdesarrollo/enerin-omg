<?php
require_once '../dao/ConsultasDAO.php';

class ConsultasModel{
    
    public function listarConsultas($CONTRATO)
    {
        try
        {
            date_default_timezone_set("America/Mexico_city");
            $dao=new ConsultasDAO();
            $lista= $dao->listarConsultas($CONTRATO);
            $hoy = new Datetime();
	        $al = strftime("%d - %B - %y");
            $hoy = new Datetime($al);
            foreach($lista as $key=>$value)
            {
                // $dias = 0;
                if($value["fecha_inicio"] != "0000-00-00")
                {
                    $fecha_inicio = new Datetime($value["fecha_inicio"]);
                    $frecuencia = $value["frecuencia"];
                    if($frecuencia == "DIARIO")
                    {
                        $dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$fecha_inicio -> getTimestamp()));
                        $diario = $dias / 86400;
                        // $lista[$key]["CANTIDAD_REALIZAR"] = $year;
                        $lista[$key]["evidencias_realizar"] = $diario+1;
                    }
                    if($frecuencia == "SEMANAL")
                    {
                        $dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$fecha_inicio -> getTimestamp()));
                        $dias = $dias / 86400;
                        $semanas = $dias/7;
                        $lista[$key]["evidencias_realizar"] = floor($semanas);
                    }
                    if($frecuencia == "MENSUAL")
                    {
                        $cantidad_a_realizar = 0;
                        $dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$fecha_inicio -> getTimestamp()));
                        $dias = $dias / 86400;
                        $mesInicio = strftime("%m",$fecha_inicio->getTimestamp());
                        $yearInicio = strftime("%Y",$fecha_inicio->getTimestamp());
                        $finWhile=true;
                        while($finWhile)
                        {
                            $mensual = cal_days_in_month(CAL_GREGORIAN,$mesInicio,$yearInicio);
                            if($mesInicio==12)
                            {
                                $mesInicio=0;
                                $yearInicio++;
                            }
                            if($dias > 0)
                            {
                                $cantidad_a_realizar++;
                            }
                            if($dias < 0)
                            {
                                $finWhile=false;
                            }
                            if($dias == 0)
                            {
                                $finWhile=false;
                                $cantidad_a_realizar++;
                            }
                            $mesInicio++;
                            $dias = $dias - $mensual;
                        };
                        $lista[$key]["evidencias_realizar"] = $cantidad_a_realizar;
                    }
                    if($frecuencia == "BIMESTRAL")
                    {
                        $cantidad_a_realizar = 0;
                        $dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$fecha_inicio -> getTimestamp()));
                        $dias = $dias / 86400;
                        $mesInicio = strftime("%m",$fecha_inicio->getTimestamp());
                        $yearInicio = strftime("%Y",$fecha_inicio->getTimestamp());
                        $finWhile=true;
                        while($finWhile)
                        {
                            $mensual = cal_days_in_month(CAL_GREGORIAN,$mesInicio,$yearInicio);
                            $mensual = $mensual + cal_days_in_month(CAL_GREGORIAN,$mesInicio+1,$yearInicio);

                            if($mesInicio==11)
                            {
                                $mesInicio=-1;
                                $yearInicio++;
                            }
                            else
                            {
                                if($mesInicio==12)
                                {
                                    $mesInicio=0;
                                    $yearInicio++;
                                }
                            }
                            if($dias > 0)
                            {
                                $cantidad_a_realizar++;
                            }
                            if($dias < 0)
                            {
                                $finWhile=false;
                            }
                            if($dias == 0)
                            {
                                $finWhile=false;
                                $cantidad_a_realizar++;
                            }
                            $mesInicio+=2;
                            $dias = $dias - $mensual;
                        };
                        $lista[$key]["evidencias_realizar"] = $cantidad_a_realizar;
                    }
                    if($frecuencia == "ANUAL")
                    {
                        $cantidad_a_realizar = 0;
                        $yearInicio = strftime("%Y",$fecha_inicio->getTimestamp());
                        $yearHoy = strftime("%Y",$hoy->getTimestamp());
                        $diasInicio = strftime("%d",$fecha_inicio->getTimestamp());
                        $diasHoy = strftime("%d",$hoy->getTimestamp());
                        if($diasInicio < $diasHoy)
                        {
                            $cantidad_a_realizar++;
                            $yearInicio++;
                        }
                        if($diasInicio == $diasHoy)
                        {
                            $cantidad_a_realizar++;
                        }
                        $finWhile=true;
                        while($finWhile)
                        {
                            if($yearInicio >= $yearHoy)
                            {
                                $finWhile=false;
                            }
                            else
                            {
                                $yearInicio++;
                                $cantidad_a_realizar++;
                            }
                        }
                        $lista[$key]["evidencias_realizar"] = $cantidad_a_realizar;
                    }
                    if($frecuencia == "TIEMPO INDEFINIDO")
                    {
                        $lista[$key]["evidencias_realizar"] = -1;
                    }
                }
                else
                {
                    $lista[$key]["evidencias_realizar"] = "X";
                }
                if($value["id_registro"]==null)
                {
                    $lista[$key]["evidencias_realizar"] = "X";
                }
            }
            // var_dump($lista);
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return-1;
        }
    }
    public function calcular($lista)
    {
        try
        {
            $id_registro=-1;
            $bandera=0;
            $banderaTema=0;
            $divisor_requisito=0;
            $cumplimiento_requisito=0;
            $id_requisito=0;
            $id_tema=0;
            $cumplimiento_tema=[];
            // $cumplimiento_porTema;
            foreach($lista as $key=>$value)
            {
                if($value["fecha_inicio"] != "0000-00-00")
                {
                    if($value["id_registro"]!=null)
                    {
                        if($bandera == 0)
                        {
                            $id_tema = $value["id_tema"];
                            $id_requisito = $value["id_requisito"];
                            $bandera = 1;
                        }
                        if($id_requisito == $value["id_requisito"])
                        {
                            // $lista[$key]["evidencias_proceso"] = $value["evidencias_totales"]-$value["evidencias_validadas"];
                            // $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            $cumplimiento_requisito += ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            $divisor_requisito++;
                            $lista[$key]["cumplimiento_requisito"] = $cumplimiento_requisito/$divisor_requisito;
                            // $lista[$key]["divisor_requisito"] = $divisor_requisito;
                            // if(!isset($cumplimiento_tema[$value["id_tema"]]))
                            // {
                                
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito/$divisor_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"] = 1;
                            // }
                            // else
                            // {
                            //     $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito;
                            //     // $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                            // }
                        }
                        else
                        {

                            $id_registro = $value["id_registro"];
                            $id_requisito = $value["id_requisito"];
                            $divisor_requisito = 0;
                            $cumplimiento_requisito = 0;
                            // $lista[$key]["evidencias_proceso"] = $value["evidencias_totales"]-$value["evidencias_validadas"];
                            // $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            if($value["evidencias_realizar"]!=0)
                                $cumplimiento_requisito += ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            else
                                $cumplimiento_requisito += ($value["evidencias_validadas"]/1)*100;
                            $divisor_requisito++;
                            $lista[$key]["cumplimiento_requisito"] = $cumplimiento_requisito/$divisor_requisito;
                            if($id_tema != $value["id_tema"])
                            {
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"] = 1;
                            }
                            else
                            {
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]+=$cumplimiento_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                            }
                                // $cumplimiento_tema[$id_tema]]["cumplimiento"]+=$cumplimiento_requisito;
                                // if(isset($cumplimiento_tema[$value["id_tema"]]))
                                // {
                                //     $cumplimiento_tema[$id_tema]["divisor"]++;
                                // }
                                // else
                                //     $cumplimiento_tema[$id_tema]["divisor"]++;
                                $id_tema=$value["id_tema"];
                            // }
                        }
                        // if($id_tema == $value["id_tema"])
                        // {

                        // }
                        // else
                        // {
                            // $id_tema = $value["id_tema"];
                            // if(!isset($cumplimiento_tema[$id_tema]))
                            // {
                                // $cumplimiento_tema[$id_tema]["cumplimiento"]=$cumplimiento_requisito;
                                // $cumplimiento_tema[$id_tema]["divisor"] = 1;
                            // }
                            // else
                            // {
                            //     $cumplimiento_tema[$id_tema]["cumplimiento"]+=$cumplimiento_requisito;
                            //     $cumplimiento_tema[$id_tema]["divisor"]++;
                            // }
                        // }

                        $lista[$key]["evidencias_proceso"] = $value["evidencias_totales"]-$value["evidencias_validadas"];
                        if($value["evidencias_realizar"]!=0)
                            $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                        else
                            $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/1)*100;
                    }
                    else
                    {
                        $lista[$key]["evidencias_proceso"] = 0;
                        $lista[$key]["cumplimiento_registro"] = 0;

                        if($id_requisito == $value["id_requisito"])
                        {
                            // $lista[$key]["evidencias_proceso"] = $value["evidencias_totales"]-$value["evidencias_validadas"];
                            // $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            $cumplimiento_requisito += 100;
                            $divisor_requisito++;
                            $lista[$key]["cumplimiento_requisito"] = $cumplimiento_requisito/$divisor_requisito;
                            // $lista[$key]["divisor_requisito"] = $divisor_requisito;
                            // if(!isset($cumplimiento_tema[$value["id_tema"]]))
                            // {
                                
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito/$divisor_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"] = 1;
                            // }
                            // else
                            // {
                            //     $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito;
                            //     // $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                            // }
                        }
                        else
                        {

                            $id_registro = $value["id_registro"];
                            $id_requisito = $value["id_requisito"];
                            $divisor_requisito = 0;
                            $cumplimiento_requisito = 0;
                            // $lista[$key]["evidencias_proceso"] = $value["evidencias_totales"]-$value["evidencias_validadas"];
                            // $lista[$key]["cumplimiento_registro"] = ($value["evidencias_validadas"]/$value["evidencias_realizar"])*100;
                            $cumplimiento_requisito += 100;
                            $divisor_requisito++;
                            $lista[$key]["cumplimiento_requisito"] = $cumplimiento_requisito;
                            if($id_tema != $value["id_tema"])
                            {
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"] = 1;
                            }
                            else
                            {
                                $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]+=$cumplimiento_requisito;
                                $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                            }
                                // $cumplimiento_tema[$id_tema]]["cumplimiento"]+=$cumplimiento_requisito;
                                // if(isset($cumplimiento_tema[$value["id_tema"]]))
                                // {
                                //     $cumplimiento_tema[$id_tema]["divisor"]++;
                                // }
                                // else
                                //     $cumplimiento_tema[$id_tema]["divisor"]++;
                                $id_tema=$value["id_tema"];
                            // }
                        }

                        // $lista[$key]["cumplimiento_requisito"] = 100;
                        // $cumplimiento_requisito+=100;
                        // if(!isset($cumplimiento_tema[$id_tema]))
                        // {
                        //     $cumplimiento_tema[$id_tema]["cumplimiento"]=$cumplimiento_requisito;
                        //     $cumplimiento_tema[$id_tema]["divisor"] = 1;
                        // }
                        // else
                        // {
                        //     $cumplimiento_tema[$id_tema]["cumplimiento"]+=$cumplimiento_requisito;
                        //     $cumplimiento_tema[$id_tema]["divisor"]++;
                        // }
                        // if($id_tema == $value["id_tema"])
                        // {
                            // if(!isset($cumplimiento_tema[$value["id_tema"]]))
                            // {
                            //     $cumplimiento_tema[$value["id_tema"]]["divisor"] = 1;
                            //     $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=$cumplimiento_requisito/1;
                            // }
                            // else
                            // {
                            //     $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                            //     $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]+=$cumplimiento_requisito/$cumplimiento_tema[$value["id_tema"]]["divisor"];
                            // }
                        // }
                        // else
                        // {
                        //     $id_tema = $value["id_tema"];
                        //     $cumplimiento_tema[$id_tema]["cumplimiento"]=$cumplimiento_requisito;
                        //     $cumplimiento_tema[$id_tema]["divisor"] = 1;   // }
                        // }
                        // $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=0; //en $id_tema hay que darle el value de id_tema abajo igual
                        // $cumplimiento_tema[$value["id_tema"]]["divisor"]=1;
                        // $lista[$key]["divisor_requisito"] = 0;
                    }
                }
                else
                {
                    $lista[$key]["evidencias_proceso"] = "X";
                    $lista[$key]["cumplimiento_registro"] = "X";
                    $lista[$key]["cumplimiento_requisito"] = "X";
                    // $cumplimiento_tema[$id_tema]=0;
                    // $cumplimiento_tema["divisor"]=0;
                    if(!isset($cumplimiento_tema[$value["id_tema"]]))
                    {
                        $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]="X";
                        $cumplimiento_tema[$value["id_tema"]]["divisor"] = "X";
                    }
                    // else
                    // {
                    //     $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]+=$cumplimiento_requisito;
                    //     $cumplimiento_tema[$value["id_tema"]]["divisor"]++;
                    // }
                    // $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]=0;
                    // $cumplimiento_tema[$value["id_tema"]]["divisor"]=1;
                    // $lista[$key]["divisor_requisito"] = "X";
                }
            }
            $id_registro=0;
            $bandera=0;
            // var_dump($cumplimiento_tema);
            foreach($lista as $key=>$value)
            {
                $lista[$key]["estado_tema"]=1;
                if($value["fecha_inicio"] != "0000-00-00")
                {
                    if($value["id_registro"]!=null)
                    {
                        if($bandera==0)
                        {
                            $id_registro = $value["id_registro"];
                            $bandera=1;
                        }
                        // if($value["id_registro"]==$id_registro)
                        // {
                        //     $divisor_tema++;
                        //     $cumplimiento_tema .= ($value["cumplimiento_requisito"]/$value["divisor_requisito"])*100;
                        //     $lista[$key]["cumplimiento_tema"] = $cumplimiento_tema/$divisor_tema;
                        // }
                        // else
                        // {
                        //     $divisor_tema=0;
                        //     $cumplimiento_tema=0;
                        // }
                        // $lista[$key]["cumplimiento_requisito"] = ($value["cumplimiento_requisito"]/$value["divisor_requisito"])*100;
                        if($value["evidencias_validadas"] == $value["evidencias_realizar"] )
                        {
                            $lista[$key]["estado_requisito"]="CUMPLIDO";
                        }
                        else
                        {
                            // if( ( ($value["evidencias_validadas"] + $value["evidencias_proceso"]) - $value["evidencias_realizar"] ) - )
                            if( ($value["evidencias_realizar"] - $value["evidencias_validadas"] ) >= 2)
                                $lista[$key]["estado_requisito"]="ATRASADO";
                            else
                                $lista[$key]["estado_requisito"]="EN PROCESO";
                        }
                    }
                    else
                    {
                        $lista[$key]["estado_requisito"] = "CUMPLIDO";
                        $lista[$key]["cumplimiento_tema"] = 0;
                        $lista[$key]["divisor_tema"] = 0;
                    }
                }
                else
                {
                    $lista[$key]["estado_tema"]=0;
                    $lista[$key]["estado_requisito"]="NO INICIADO";
                    $lista[$key]["cumplimiento_tema"] = 0;
                    $lista[$key]["divisor_tema"] = 0;
                }
            }
            $listaFinal;
            $bandera=0;
            $bandera2=0;
            $id_requisito=0;
            $contador=0;
            $contador2=0;
            // $cumplimiento_tema=0;
            $divisor_tema=0;
            $detalles=[];
            foreach($lista as $key=>$value)
            {
                // $lista[$key]["estado_tema"]="NO INICIADO";
                if($bandera == 0)
                {
                    $id_requisito = $value["id_requisito"];
                    $bandera = 1;
                }
                if($id_requisito == $value["id_requisito"])
                {
                    $id_requisito = $value["id_requisito"];
                    $listaFinal[$contador]["no_tema"] = $value["no"];
                    $listaFinal[$contador]["id_tema"] = $value["id_tema"];
                    $listaFinal[$contador]["nombre_tema"] = $value["nombre"];
                    $listaFinal[$contador]["id_responsable"] = $value["id_empleado"];
                    $listaFinal[$contador]["responsable_tema"] = $value["responsable"];
                    $listaFinal[$contador]["estado_tema"] = $value["estado_tema"];
                    // $cumplimiento_tema += $value["cumplimiento_requisito"];
                    // $divisor_tema++;
                    // $cumplimiento_tema[$id_tema]["divisor"]++;
                    if($cumplimiento_tema[$value["id_tema"]]["divisor"] == 0)
                        $listaFinal[$contador]["cumplimiento_tema"] = $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]/1;
                    else
                        $listaFinal[$contador]["cumplimiento_tema"] = $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]/$cumplimiento_tema[$value["id_tema"]]["divisor"];
                    $listaFinal[$contador]["requisitos_por_tema"] = $cumplimiento_tema[$value["id_tema"]]["divisor"];
                    // $listaFinal[$contador]["divisor_tema"] = $cumplimiento_tema[$value["id_tema"]];
                    // $listaFinal[$contador]["estado_tema"] = $value["estado_tema"];
                    // if($value["divisor_tema"]==0)
                    //     $divisor_tema = 1;
                    // else
                    //     $divisor_tema = $value["divisor_tema"];
                    // $listaFinal[$contador]["cumplimiento_tema"] = ($value["cumplimiento_tema"]/$divisor_tema)*100;

                    $listaFinal[$contador]["id_requisito"] = $value["id_requisito"];
                    $listaFinal[$contador]["requisito"] = $value["requisito"];
                    $listaFinal[$contador]["penalizacion"] = $value["penalizacion"];
                    $listaFinal[$contador]["cumplimiento_requisito"] = $value["cumplimiento_requisito"];
                    $listaFinal[$contador]["estado_requisito"] = $value["estado_requisito"];
                    // if($bandera2 == 0)
                    // {
                    //     $id_registro = $value["id_registro"];
                    //     $bandera2 = 1;
                    // }
                    // if($id_registro == $value["id_registro"])
                    // {
                        $detalles[$contador2]["id_registro"] = $value["id_registro"];
                        $detalles[$contador2]["registro"] = $value["registro"];
                        $detalles[$contador2]["frecuencia"] = $value["frecuencia"];
                        $detalles[$contador2]["cumplimiento_registro"] = $value["cumplimiento_registro"];
                        $detalles[$contador2]["evidencias_realizar"] = $value["evidencias_realizar"];
                        $detalles[$contador2]["evidencias_validadas"] = $value["evidencias_validadas"];
                        $detalles[$contador2]["evidencias_totales"] = $value["evidencias_totales"];
                        $detalles[$contador2]["evidencias_proceso"] = $value["evidencias_proceso"];
                        
                        $listaFinal[$contador]["detalles"] = $detalles;
                        $contador2++;
                    // }
                    // else
                    // {
                        // $detalles=[];
                        // $id_registro = $value["id_registro"];
                        // $contador2=0;
                        // $detalles[$contador2]["id_registro"] = $value["id_registro"];
                        // $detalles[$contador2]["registro"] = $value["registro"];
                        // $detalles[$contador2]["frecuencia"] = $value["frecuencia"];
                        // $detalles[$contador2]["cumplimiento_registro"] = $value["cumplimiento_registro"];
                        // $detalles[$contador2]["evidencias_realizar"] = $value["evidencias_realizar"];
                        // $detalles[$contador2]["evidencias_validadas"] = $value["evidencias_validadas"];
                        // $detalles[$contador2]["evidencias_totales"] = $value["evidencias_totales"];
                        // $detalles[$contador2]["evidencias_proceso"] = $value["evidencias_proceso"];

                        // $listaFinal[$contador]["detalles"] = $detalles;
                        // $contador2++;
                    // }
                }
                else
                {
                    $contador++;
                    $contador2=0;
                    $detalles=[];
                    // $cumplimiento_tema=0;
                    // $divisor_tema=0;
                    $id_requisito = $value["id_requisito"];
                    $listaFinal[$contador]["no_tema"] = $value["no"];
                    $listaFinal[$contador]["id_tema"] = $value["id_tema"];
                    $listaFinal[$contador]["nombre_tema"] = $value["nombre"];
                    $listaFinal[$contador]["id_responsable"] = $value["id_empleado"];
                    $listaFinal[$contador]["responsable_tema"] = $value["responsable"];
                    $listaFinal[$contador]["estado_tema"] = $value["estado_tema"];

                    // $cumplimiento_tema += $value["cumplimiento_requisito"];
                    // $divisor_tema++;
                    // $listaFinal[$contador]["cumplimiento_tema"] = $cumplimiento_tema/$divisor_tema;
                    // if($value["divisor_tema"]==0)
                    //     $divisor_tema = 1;
                    // else
                    //     $divisor_tema = $value["divisor_tema"];
                    // $listaFinal[$contador]["cumplimiento_tema"] = ($value["cumplimiento_tema"]/$divisor_tema)*100;
                    if($cumplimiento_tema[$value["id_tema"]]["divisor"] == 0)
                        $listaFinal[$contador]["cumplimiento_tema"] = $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]/1;
                    else
                        $listaFinal[$contador]["cumplimiento_tema"] = $cumplimiento_tema[$value["id_tema"]]["cumplimiento"]/$cumplimiento_tema[$value["id_tema"]]["divisor"];
                    // $listaFinal[$contador]["divisor_tema"] = $cumplimiento_tema[$value["id_tema"]]["divisor"];
                    $listaFinal[$contador]["requisitos_por_tema"] = $cumplimiento_tema[$value["id_tema"]]["divisor"];
                    
                    $listaFinal[$contador]["id_requisito"] = $value["id_requisito"];
                    $listaFinal[$contador]["requisito"] = $value["requisito"];
                    $listaFinal[$contador]["penalizacion"] = $value["penalizacion"];
                    $listaFinal[$contador]["cumplimiento_requisito"] = $value["cumplimiento_requisito"];
                    $listaFinal[$contador]["estado_requisito"] = $value["estado_requisito"];
                    
                    // if($bandera2 == 0)
                    // {
                    //     $id_registro = $value["id_registro"];
                    //     $bandera2 = 1;
                    // }
                    // if($id_registro == $value["id_registro"])
                    // {
                        $detalles[$contador2]["id_registro"] = $value["id_registro"];
                        $detalles[$contador2]["registro"] = $value["registro"];
                        $detalles[$contador2]["frecuencia"] = $value["frecuencia"];
                        $detalles[$contador2]["cumplimiento_registro"] = $value["cumplimiento_registro"];
                        $detalles[$contador2]["evidencias_realizar"] = $value["evidencias_realizar"];
                        $detalles[$contador2]["evidencias_validadas"] = $value["evidencias_validadas"];
                        $detalles[$contador2]["evidencias_totales"] = $value["evidencias_totales"];
                        $detalles[$contador2]["evidencias_proceso"] = $value["evidencias_proceso"];

                        $listaFinal[$contador]["detalles"] = $detalles;
                        $contador2++;
                    }
                    // else
                    // {
                    //     $detalles=[];
                    //     $id_registro = $value["id_registro"];
                    //     $contador2=0;
                    //     $detalles[$contador2]["id_registro"] = $value["id_registro"];
                    //     $detalles[$contador2]["registro"] = $value["registro"];
                    //     $detalles[$contador2]["frecuencia"] = $value["frecuencia"];
                    //     $detalles[$contador2]["cumplimiento_registro"] = $value["cumplimiento_registro"];
                    //     $detalles[$contador2]["evidencias_realizar"] = $value["evidencias_realizar"];
                    //     $detalles[$contador2]["evidencias_validadas"] = $value["evidencias_validadas"];
                    //     $detalles[$contador2]["evidencias_totales"] = $value["evidencias_totales"];
                    //     $detalles[$contador2]["evidencias_proceso"] = $value["evidencias_proceso"];

                    //     $listaFinal[$contador]["detalles"] = $detalles;
                    //     $contador2++;
                    // }
                // }
            }
            return $listaFinal;
        }catch(Exception $e)
        {
            throw $e;
            return -1;
        }
    }
    
}


?>