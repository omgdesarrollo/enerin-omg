function filtroSupremo()
{
    // data = filtros;
    newData = [];    
    $.each(filtros,function(index,value)
    {
        ($("#"+value.id).val()!="") ? newData.push(value):console.log();
    });
    // console.log(filtros);
    // console.log(newData);
    // console.log(dataListado);
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