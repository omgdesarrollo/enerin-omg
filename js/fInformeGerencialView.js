
function inicializarFiltros()
{    
    filtros =[
            {id:"noneUno",type:"none"},
            {id:"referencia",type:"text"},
            {id:"tarea",type:"text"},
            {id:"id_empleado",type:"combobox",data:listarEmpleados(),descripcion:"nombre_completo"},
            {id:"fecha_creacion",type:"date"},
            {id:"fecha_alarma",type:"date"},
            {id:"fecha_cumplimiento",type:"date"},
            {id:"status_tarea",type:"text"},
            {id:"observaciones",type:"text"},
            {id:"archivo_adjunto",type:"text"},
            {id:"registrar_programa",type:"text"},
            {id:"avance_programa",type:"text"},
            {name:"opcion",id:"opcion",type:"opcion"}
         ];    
}