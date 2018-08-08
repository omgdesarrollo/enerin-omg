function construirFiltros()
{
    // tempData = "<i class='ace-icon fa fa-search' style='color: #0099ff;font-size: 20px;'></i>";
    // tempData = "";
    $('.jsgrid-filter-row').removeAttr("style",'display:none');
    $('.jsgrid-filter-row').addClass("display-none");
    $(".jsgrid-filter-row").html("");
    $.each(filtros,function(index,value)
    {
        tam = value.width - 10;
        tempData = "<td class='jsgrid-cell' style='min-width:"+value.width+"px;'>";
        if(value.type == "date")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width: 100%;display:none;'>";
            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' style='width:100%;margin:2px;'>";
        }
        if(value.type == "text")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:100%;'>";
        }
        if(value.type == "combobox")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:100%;display:none'>";
            tempData += construirFiltrosCombobox(value.data,value.name,value.id,value.descripcion);
        }
        tempData += "</td>"
        $(".jsgrid-filter-row").append(tempData);
    });
    // $("#headerFiltros").html(tempData);
    // $(".jsgrid-filter-row").html(tempData);
}

function construirFiltrosCombobox(datos,name,id,descripcion)
{
    // console.log(datos);
    tempData="";
    tempData = "<select onChange='construirFiltroSelect(this,\""+id+"\")' style='margin:2px;'>";
    tempData += "<option value='-1'>"+name+"</option>";
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
    console.log(val);
    if(val=="-1")
            $("#"+id).val("");
    else
            $("#"+id).val(val);
    filtroSupremo();
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
    // reconstruirTable(DataFinal);
    // $("#loader").hide();
}