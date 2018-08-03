function construirFiltros()
{
    tempData = "<i class='ace-icon fa fa-search' style='color: #0099ff;font-size: 20px;'></i>";
    $.each(filtros,function(index,value)
    {
        if(value.type == "date")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width: auto;display:none;'>";
            tempData += "<input type='date' onChange='construirFiltroSelect(this,\""+value.id+"\")' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "text")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' placeholder='"+value.name+"' style='width:auto;margin:2px;'>";
        }
        if(value.type == "combobox")
        {
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' style='width:auto;display:none'>";
            tempData += construirFiltrosCombobox(value.data,value.name,value.id,value.descripcion);
        }
    });
    $("#headerFiltros").html(tempData);
}

function construirFiltrosCombobox(datos,name,id,descripcion)
{
    // console.log(datos);
    tempData="";
    tempData = "<select onChange='construirFiltroSelect(this,\""+id+"\")' margin:2px;>";
    tempData += "<option value='-1'>"+name+"</option>";
    $.each(datos,function(index,value)
    {
            tempData += "<option value='"+value[id]+"'>"+value[descripcion]+"</option>";
    });
    alert("");
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
            $("#"+id).val(val);
    filtroSupremo();
}

function filtroSupremo()
{
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
    reconstruirTable(DataFinal);
}