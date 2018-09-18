
// $(document).ready(()=>{
    
//     lol();
// });
// var heightGrid;
function lol()
{
    var tam1A,tam2A;
    Frame = $(this)[0].frameElement;
    // $("#jsGrid").jsGrid("refresh");
    // console.log($(window.parent).height());
    if($(window.parent).height()<720)
    {
        tam1A = 740 - 190;
        tam2A = tam1A - 42;
        $(Frame).css("height",tam2A-6+"px");

        $("#jsGrid").css("height","385px");
        
        // console.log("AQUIII");
        // console.log(gridInstance);
        gridInstance.height = 385 + "px";
        gridInstance._body[0].style.height = "240px";
        
        // $(".jsgrid-grid-body").css("height","235px");
    }
    else
    {
        tam1A = $(window.parent).height() - 190;
        tam2A = tam1A - 42;
        $(Frame).css("height",tam2A-6+"px");
        t = $(window.parent).height() - 720;
        $("#jsGrid").css("height", t + 400 +"px");
        
        // heightGrid = t;
        // console.log(gridInstance);
        gridInstance.height = t + 385 + "px";
        // console.log($(".jsgrid-grid-body"));
        gridInstance._body[0].style.height = t + 240 +"px";
        // gridInstance._body[0].style.height = "max-container";
        // gridInstance._body[0].style.height = 80 +"%";
        
        // $(".jsgrid-grid-body").css("height", t + 236 +"px");
        // console.log(gridInstance);
        // $(".jsgrid-grid-body").css("height",($(window.parent).height() - 720 + 215) +"px");
        
    }
    // console.log("Reconstruir tamaños");
}

$(window.parent).resize(()=>{
    lol();
});

function customsFieldsGrid()
{
    $.each(customsFieldsGridData,function(index,value)
    {
        jsGrid.fields[value.field] = value.my_field;
    });
}

function construirGrid()
{
    customsFieldsGrid();
    db=
    {
        loadData: function()
        {
            if(DataGrid.length == 0)
                $(".jsgrid-grid-header").css("overflow-x","auto");
            else
                $(".jsgrid-grid-header").css("overflow-x","hidden");
            return DataGrid;
        },
        updateItem:function()
        {
            // alert("5");
        }
    };
    
    $("#jsGrid").jsGrid({
        onInit: (args)=>
        {
            // alert("1");
            gridInstance=args.grid;
            console.log(gridInstance);
            jsGrid.Grid.prototype.editButton=true;
            jsGrid.Grid.prototype.autoload=true;
        },
        onDataLoading: (args)=>
        {
            // alert("2");
            // lol();
            // loadBlockUi();
        },
        onDataLoaded:(args)=>
        {
            // alert("3");
            setTimeout(function(){lol();},100);
            $('.jsgrid-filter-row').removeAttr("style",'display:none');
            // $(".jsgrid-grid-body").attr("style","height:53.44228935%");
            // $(window.parent).resizeTo($(window.parente).width(),$(window.parente).height()-200);
            // this.resizeTo($(window.parente).width(),$(window.parente).height()-200);
            // window.open("A","B","width=400,height=400");
            // $(".jsgrid-grid-header").attr("style","overflow-x:auto");
        },
        rowDoubleClick:(args)=>
        {
            // console.log("W");
            $("#jsGrid").jsGrid("editItem",$(".jsgrid-selected-row")[0]);
        },
        rowClick:(args)=>
        {
            // console.log(args);
            obj = args.event.target;
            // console.log(obj);
            if($(obj).hasClass("jsgrid-cell"))
            {
                text = $(obj).html();
                // console.log(!text.includes("<button") && !text.includes("<input"));
                if(!text.includes("<button") && !text.includes("<input") && !text.includes("<a") && !text.includes("<select") && !text.includes("<i"))
                    swal("",text,"info");
            }
            // console.log($(".jsgrid-selected-row")[0]);
            // $("#jsGrid").jsGrid("editItem",$(".jsgrid-selected-row")[0]);
            // var a = $("#jsGrid").jsGrid("rowByItem",$(".jsgrid-selected-row")[0]);
            $("#jsGrid").jsGrid("cancelEdit");
            // console.log("A");
        },
        width: "100%",
        height: "390px",
        autoload:true,
        heading: true,
        sorting: true,
        editing: true,
        paging: true,
        controller:db,
        pageLoading:false,
        pageSize: 10,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: false,
        noDataContent:"No Existen Registros",
        pagerFormat: "     Paginas: {first}  {prev} {pages} {next} {last}   {pageIndex} de {pageCount}",
        pagePrevText: "Anterior",
        pageNextText: "Siguiente",
        pageFirstText: "Principio",
        pageLastText: "Final",
        fields: estructuraGrid,
        pageLoading: false,
        pageIndex:1,
        onItemDeleted:function(args)
        {
            // console.log("deleted");
            // console.log(args);
            // console.log(argsGlobal);
            // // if(preguntarEliminar(args.item))
            //     // args.cancel = true;
        },
        onItemDeleting:function(args)
        {
            // console.log("deleting");
            // console.log(args);
            // argsGlobal = args;
            // preguntarEliminar(args.item);
            // if(ifeliminar==0)
            // {
            //     args.cancel = true;
            //     ifeliminar=1;
            // }
            // else
            //     gridInstance.onItemDeleted(args);
            // args.cancel = preguntarEliminar(args.item);
                //  = true;
            // console.log("jajaja");
        }
        ,
        onItemUpdated:function(args)
        {
            // console.log("aqui entro");
            saveUpdateToDatabase(args);
        },
        onItemInserted:(args)=>
        {
            $(".jsgrid-grid-header").css("overflow-x","hidden");
            // console.log(args);
        }
    });
}

var MyCControlField = function(config)
{
    jsGrid.Field.call(this, config);
};
 
MyCControlField.prototype = new jsGrid.Field
({
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
            // console.log("haber cuando entra aqui");
            // console.log(date1);
            // console.log(date2);
            // return 1;
        },
        itemTemplate: function(value,todo)
        {
            var returnTemp="";
            // console.log(value);
            // value == 0 ? returnTemp = "" : returnTemp = this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button ',title:"Eliminar", type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
            if(value[2]["editar"]==1)
                returnTemp = "<input class='jsgrid-button jsgrid-edit-button' type='button' title='Editar' onClick='modoEditar()'>";
            if(value[1]["eliminar"]==1)
                returnTemp += "<input class='jsgrid-button jsgrid-delete-button' type='button' title='Eliminar' onClick='preguntarEliminar("+JSON.stringify(value[0])+")'>";
            // returnTemp += "<input type='label' value='"+JSON.stringify(todo)+"' style='display:false'>";
            // console.log(returnTemp);
            return returnTemp;
        },
        insertTemplate: function(value)
        {
        },
        editTemplate: function(value)
        {
            var val = "";
            // console.log(value);
            if(value[2]["editar"]==1)
            {
                val = "<input class='jsgrid-button jsgrid-update-button' type='button' title='Actualizar' onClick='aceptarEdicion()'>";
                val += "<input class='jsgrid-button jsgrid-cancel-edit-button' type='button' title='Cancelar Edición' onClick='cancelarEdicion()'>";
            }
            else
            {
                if(value[1]["eliminar"]==1)
                    val += "<input class='jsgrid-button jsgrid-delete-button' type='button' title='Eliminar' onClick='preguntarEliminar("+JSON.stringify(value[0])+")'>";
            }
            return val;
        },
        insertValue: function()
        {
        },
        editValue: function()
        {
        }
});

function aceptarEdicion()
{
    gridInstance.updateItem();
}

function cancelarEdicion()
{
    $("#jsGrid").jsGrid("cancelEdit");
    
}

function modoEditar()
{
    // $("#jsGrid").jsGrid("updateItem");
    // $("#grid").jsGrid("updateItem");
    // console.log(gridInstance);
    // gridInstance.rowDoubleClick();
    $("#jsGrid").jsGrid("editItem",$(".jsgrid-selected-row")[0]);
    // console.log($(".jsgrid-row")[0]);
}

// function loadBlockUi()
// {
//     $.blockUI({message: '<img src="../../images/base/loader.GIF" alt=""/><span style="color:#FFFFFF"> Espere Por Favor</span>', css:
//     { 
//         border: 'none', 
//         padding: '15px', 
//         backgroundColor: '#000', 
//         '-webkit-border-radius': '10px', 
//         '-moz-border-radius': '10px', 
//         opacity: .5, 
//         color: '#fff' 
//     },overlayCSS: { backgroundColor: '#000000',opacity:0.1,cursor:'wait'} }); 
//     setTimeout($.unblockUI, 2000);
// }