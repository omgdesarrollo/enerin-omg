
months = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];

function getSinFechaFormato(value)//listo
{
    fecha="0000-00-00";
    if(value!=fecha)
    {
        date = new Date(value);
        date.setSeconds(86400);//86400 segundos son un dia
        fecha = date.getDate() +" "+ months[date.getMonth()] +" "+ date.getFullYear().toString().slice(2,4);
        return fecha;
    }
    else
        return "Sin fecha";
}

function getFechaFormatoH(value)
{
    fecha="0000-00-00";
                // console.log(this);
                this[this.name] = value;
                // console.log(data);
                if(value!=fecha)
                {
                        date = new Date(value);
                        fecha = date.getDate()+1 +" "+ months[date.getMonth()] +" "+ date.getFullYear().toString().slice(2,4) +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                        return fecha;
                }
                else
                        return "Sin fecha";
}

function getFechaStamp(value)
{
    var fecha = new Date(value*1000);
    return (fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear().toString().slice(2,4) +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds());
}