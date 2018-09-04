
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
            // $(".jsgrid-grid-body").attr("style","height:50%");
            if(DataGrid.length == 0)
                $(".jsgrid-grid-header").css("overflow-x","auto");
            else
                $(".jsgrid-grid-header").css("overflow-x","hidden");
            return DataGrid;
        },
        updateItem:function()
        {
            // console.log(a);
        }
    };
    
    $("#jsGrid").jsGrid({
        onInit: function(args)
        {
            // alert(args);
            gridInstance=args.grid;
            jsGrid.Grid.prototype.editButton=true;
            jsGrid.Grid.prototype.autoload=true;
            // $(".jsgrid-grid-body").attr("style","height:50%");
        },
        onDataLoading: function(args)
        {
            // loadBlockUi();
        },
        onDataLoaded:function(args)
        {
            $('.jsgrid-filter-row').removeAttr("style",'display:none');
            $(".jsgrid-grid-body").attr("style","height:53.44228935%");
            // $(".jsgrid-grid-header").attr("style","overflow-x:auto");
        },
        // rowClick:function(args)
        // {
            // console.log(args);
            // taget = args.event.currentTarget;
            // console.log($(".jsgrid-selected-row")[0]);
            // $("#jsGrid").jsGrid("editItem",$(".jsgrid-selected-row")[0]);
            // var a = $("#jsGrid").jsGrid("rowByItem",$(".jsgrid-selected-row")[0]);
            // console.log(a);
            // $("#jsGrid").jsGrid("updateItem",args.item);
        // },
        width: "100%",
        height: "335px",
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
        pagerFormat: "Paginas: {first}  {prev} {pages} {next} {last}   {pageIndex} de {pageCount}",
        fields: estructuraGrid,
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
            console.log("aqui entro");
            saveUpdateToDatabase(args);
        },
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
            console.log("haber cuando entra aqui");
            console.log(date1);
            console.log(date2);
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
            console.log(value);
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
    $("#grid").jsGrid("updateItem");
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