<?php
    session_start();
    require_once '../util/Session.php';
    
    $Usuario=  Session::getSesion("user");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title></title>

    <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- text fonts -->
	<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
    <!--Inicia para el spiner cargando-->
    <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/loaderanimation.js" type="text/javascript"></script>
    <!--Termina para el spiner cargando-->
    <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../assets/probando/js/ace-extra.min.js"></script>              
    <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
    <!-- Alertas-->
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
    <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <!--Aqui cierra Alertas-->
    <!--Modales-->
    <script src="../../assets/probando/js/bootstrap.min.js"></script>
    <!--Aqui cierra modales-->

    <style>
        .modal
        {
            overflow: hidden;
        }
        .modal-dialog{
            margin-right: 0;
            margin-left: 0;
        }
        .modal-header{
            height:30px;background-color:#444;
            color:#ddd;
        }
        .modal-title{
            margin-top:-10px;
            font-size:16px;
        }
        .modal-header .close{
            margin-top:-10px;
            color:#fff;
        }
        .modal-body{
            color:#888;
            /*max-height: calc(100vh - 210px);*/
            max-height: calc(100vh - 110px);
            overflow-y: auto;
        }
        .modal-body p {
            text-align:center;
            padding-top:10px;
        }
        .validar_formulario{
            background: blue; 
            width: 120px; 
            color: white; 
        }
        .table-fixed-header{
            display: table; /* 1 */
            position: relative;
            padding-top: calc(~'2.5em + 2px'); /* 2 */
    
            table{
                margin: 0;
                margin-top: calc(~"-2.5em - 2px"); /* 2 */
            }
            thead th{
                white-space: nowrap;
                &:before{
                    content: attr(data-header);
                    position: absolute;
                    top: 0;
                    padding: .5em 1em; /* 3 */
                    margin-left: -1em; /* 4 */
                }
            }
        }
        .table-container {
            max-height: 70vh; /* 5 */
            overflow-y: auto; /* 5 */
            &:before{
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                min-height: 2.5em;             /* 6 */
                border-bottom: 2px solid #DDD; /* 6 */
                background: #f1f1f1;           /* 6 */
            }
        }
        </style>

</head>
<body>
<!-- <body class="no-skin" onload="loadSpinner()"> -->
    <!-- <div id="loader"></div> -->
    <?php
        require_once 'EncabezadoUsuarioView.php';
        $filtrosArray = array(
            array("name"=>"Clave","column"=>0),
            array("name"=>"Nombre Documento","column"=>1),
            array("name"=>"Responsable","column"=>2),
            array("name"=>"Clasificación","column"=>6),
            // array("name"=>"Clave Evidencia","column"=>"text"),
        );
        $titulosTable = 
            array("Clave","Nombre Documento","Responsable Documento","Registros","Documento Adjunto",
                "Fecha Registro","Clasificación","Desviación","Acción Correctiva Inmediata","Validación",
                "Plan de Acción","Ingresar Oficio Atención","Oficio de Atención");
    ?>
    <div style="position: fixed;">

        <button onClick="DocumentoArchivoAgregarModalF();" type="button" 
        class="btn btn-success" data-toggle="modal" data-target="#create-item">
            Agregar Nuevo Registro
        </button>

        <button id="btnAgregarOperacionesRefrescar" type="button" 
        class="btn btn-info " onclick="refresh();" >
            <i class="glyphicon glyphicon-repeat"></i> 
        </button>

        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
    
        <?php foreach($filtrosArray as $value)
        { ?>
        <input type="text" onkeyup="filterTable(this)" 
        placeholder="<?php echo $value['name'] ?>" style="width: 120px;">
        <?php } ?>

    <div style="height: 50px"></div>

    <div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom">
        <div class="table-container">
            <table id="idTable" class="tbl-qa">
                <tr>
                <?php foreach($titulosTable as $value)
                { ?>
                    <th class="table-header"><?php echo $value ?></th>
                <?php } ?>
                </tr>
                <tbody id="bodyTable">

                </tbody>
            </table>
        </div>
    </div>

    </div>
</body>
<script>
    var data="";
    var dataTemp="";
    function refresh()
    {
        // consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
        window.location.href="OperacionesView.php";
    }
    function filterTable(Obj)
    {
        console.log($(Obj).attr("placeholder"));
        // console.log($(Obj).attr("type"));
        // console.log(columna);

    }
    function loadSpinner()
    {
        // alert("se cargara otro ");
        myFunction();
    }
    function getClavesDocumentos()
    {
        $.ajax
        ({
            url: '../Controller/OperacionesController.php?Op=getClavesDocumentos',
            type: 'GET',
            success:function(data)
            {

            })
        });
    }
    function filterTableAsunt()
    {
        var input, filter, table, tr, td, i;
        input = document.getElementById("idInputAsunto");
        filter = input.value.toUpperCase();
        table = document.getElementById("idTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++)
        {
            td = tr[i].getElementsByTagName("td")[4];
            if (td)
            {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
                {
                    tr[i].style.display = "";
                }else
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function getDataTable()
    {        
        // $('#bodyTable').html(data);
        $.ajax
        ({
            url: '../Controller/OperacionesController.php?Op=getDataTable',
            type: 'GET',
            // data: '',
            success:function(dataT)
            {
                reconstruirTable(dataT);
            }
        });
    }
    function reconstruirTable(data)
    {
        $.each(data,function(index,value)
        {
            tempData += "<tr>";
            tempData += "<td>"+value.Clave+"</td>";
            tempData += "<td>"+value.Nombre_documento+"</td>";
            tempData += "<td>"+value.Responsable_documento+"</td>";
            tempData += "<td>"+value.Registros+"</td>";
            tempData += "<td><button onClick='mostrar_urls();'";
            tempData += "type='button' class='btn btn-success' data-toggle='modal' data-target='#create-itemUrls'>";
            tempData += "Mostrar Documentos</button></td>";
            tempData += "<td>"+value.Fecha_Registro+"</td>";
            tempData += "<td>"+value.Desviación+"</td>";
            tempData += "<td>"+value.Acción_Correctiva_Inmediata+"</td>";
            tempData += "<td>"+value.Validación+"</td>";
            tempData += "<td>"+value.PlanAcción+"</td>";
            tempData += "<td>"+value.ingresar_Oficio_Atención+"</td>";
            tempData += "<td>"+value.Oficio_Atención+"</td>";
            tempData += "</tr>";
        });
        $('#bodyTable').html(data);
    }
</script>
</html>