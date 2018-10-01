function construirGrafica(dataGrafica,tituloGrafica)//funcion sin cambio
{
    estructuraGrafica = chartEstructura(dataGrafica);
    opcionesGrafica = chartOptions(tituloGrafica);
    instanceGrafica = drawChart(dataGrafica,estructuraGrafica,opcionesGrafica);
    activeChart++;
    chartsCreados.push({grafica:instanceGrafica,data:estructuraGrafica});
}

function chartEstructura(dataGrafica)//funcion sin cambio
{
    // console.log(dataGrafica);
    data = new google.visualization.DataTable();
    data.addColumn('string', 'nombre');
    data.addColumn('number', 'valor');
    // if(tooltip!=0)
        data.addColumn({type:"string",role:"tooltip"});
    data.addColumn('string','datos');
    
    // if(dataGrafica.length != 0)
        data.addRows(dataGrafica);
    // else
    //     data.addRows([[ "NO HAY DATOS",1,"SIN DATOS",""]]);
    return data;
}

function chartOptions(tituloGrafica)//funcion sin cambio
{
    var options = 
    {
        legend:{
                position:"labeled",alignment:"start",
                textStyle:
                {
                    color:"black", fontSize:14, bold:true
                }
            },
        pieSliceText:"none",
        title: tituloGrafica,
        tooltip:{textStyle:{color:"#000000"},text:"none",isHtml:true},
        // pieSliceText:"",
        titleTextStyle:{color:"black"},
        'is3D':true,
        slices: { 
            1: {offset: 0.02,color:"#80ffbf"},
            3: {offset: 0.02,color:"#bfff80"},
            0: {offset: 0.02,color:"#ffbf80"},
            4: {offset: 0.02,color:"#ff80bf"},
            2: {offset: 0.02,color:"#bf80ff"},
        },
        backgroundColor:"",
        "width":800,
        "height":400
    };
    return options;
}

function drawChart(dataGrafica,data,options)//funcion sin cambio
{
    grafica = new google.visualization.PieChart(document.getElementById('graficaPie'));
    grafica.draw(data, options);
    if(dataGrafica[0][3]!="[]")
        google.visualization.events.addListener(grafica, 'select', selectChart);
    return grafica;
}

function selectChart()
{
    var select = chartsCreados[activeChart].grafica.getSelection()[0];
    if(select != undefined)
    {
        dataNextGrafica = chartsCreados[activeChart].data.getValue(select.row,3);
        concepto = chartsCreados[activeChart].data.getValue(select.row,0);
        chartsFunciones[activeChart+1](dataNextGrafica,concepto);
            // graficar2(dataNextGrafica,concepto);
        $("#BTN_ANTERIOR_GRAFICAMODAL").html("Anterior");
    }
}