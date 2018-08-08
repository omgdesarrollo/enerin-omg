function construirFiltros()
{
    // tempData = "<i class='ace-icon fa fa-search' style='color: #0099ff;font-size: 20px;'></i>";
    // tempData = "";
    $('.jsgrid-filter-row').removeAttr("style",'display:none');
    $('.jsgrid-filter-row').addClass("display-none");
    $(".jsgrid-filter-row").html("");
    $("#headerOpciones").append("<button type='button' class='btn btn-info' onClick='mostrarFiltros()'><i class='ace-icon fa fa-search'></i></button>");

    $.each(filtros,function(index,value)
    {
        // tam = value.width - 10;
        tempData = "<td class='jsgrid-cell'>";
        if(value.type == "date")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='pressEnter()' style='width: 100%;display:none;'>";
            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' style='width:100%;margin:2px;'>";
        }
        if(value.type == "text")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='pressEnter()' value='' style='width:100%;'>";
        }
        if(value.type == "combobox")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='pressEnter(event)' style='width:100%;display:none'>";
            tempData += construirFiltrosCombobox(value.data,value.name,value.id,value.descripcion);
        }
        if(value.type == "opcion")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='pressEnter()' style='width:100%;display:none'>";
            tempData += "<input class='jsgrid-button jsgrid-clear-filter-button' type='button' onClick='limpiarFiltros()'>";
            tempData += "<input class='jsgrid-button jsgrid-search-button' type='button' title='Search' onClick='filtroSupremo()'>";
        }
        tempData += "</td>"
        $(".jsgrid-filter-row").append(tempData);
    });
    // $("#headerFiltros").html(tempData);
    // $(".jsgrid-filter-row").html(tempData);jaja
}

function construirFiltrosCombobox(datos,name,id,descripcion)
{
    // console.log(datos);
    tempData="";
    tempData = "<select onChange='construirFiltroSelect(this,\""+id+"\")' style='margin:2px;'>";
    tempData += "<option value='-1'> -> Todos <- </option>";
    $.each(datos,function(index,value)
    {
            tempData += "<option value='"+value[id]+"'>"+value[descripcion]+"</option>";
    });
    tempData += "</select>";
    return tempData;
}

function construirFiltroSelect(Obj,id)
{
    // console.log(Obj,id);
    val = $(Obj).val();
    if(val=="-1")
        $("#"+id).val("");
    else
    {
        $("#"+id).val(val);
    }
    // filtroSupremo();
}

function pressEnter(ev)
{
    if(ev.keyCode == 13)
    {
        filtroSupremo();
    }
}

function filtroSupremo()
{
    // $("#loader").show();
    $("#jsGrid").jsGrid("cancelEdit");
    newData = [];
    $.each(filtros,function(index,value)
    {
        ($("#"+value.id).val()!="") ? newData.push(value):console.log();
    });
    DataFinal=dataListado;
    $.each(newData,function(index,value)
    {
        DataTemp=[];
        $.each(dataListado,function(indexList,valueList)
        {
            $.each(valueList,function(ind,val)
            {
                if(ind==value.id)
                {
                    ( val.toLowerCase().indexOf( $("#"+value.id).val().toLowerCase() ) != -1 ) ? DataTemp.push(valueList) :  console.log();
                }
            });
        });

        dataT=[];
        $.each(DataFinal,function(indF,valF)
        {
            $.each(DataTemp,function(indT,valT)
            {
                ( JSON.stringify(valF).indexOf( JSON.stringify(valT) ) != -1 ) ?  dataT.push(valF): console.log();
            });
        });
        if(DataFinal.length!=0)
            DataFinal=dataT;
    });
    aplicarFiltro(DataFinal);
}

function aplicarFiltro(DataFinal)
{
    console.log(DataFinal);
    __datos=[];
    $.each(DataFinal,function (index,value)
        {
            __datos.push( reconstruir(value,index++) );
        });
    DataGrid=__datos;
    gridInstance.loadData();
}

function mostrarFiltros()
{
    if($('.jsgrid-filter-row').hasClass("display-none"))
    {
        $('.jsgrid-filter-row').removeClass("display-none");
        $('.jsgrid-filter-row').addClass("display-view");
    }
    else
    {
        $('.jsgrid-filter-row').removeClass("display-view");
        $('.jsgrid-filter-row').addClass("display-none");
    }
}

function limpiarFiltros()
{
    $.each(filtros,function(index,value)
    {
        // console.log(value.id);
        // console.log($("#"+value.id).val());
        $("#"+value.id).val("");
    });
    filtroSupremo();
}