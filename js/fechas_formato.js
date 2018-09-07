
months = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];

function getSinFechaFormato(value)
{
    fecha="0000-00-00";
    if(value!=fecha)
    {
        date = new Date(value);
        fecha = date.getDate()+1 +" "+ months[date.getMonth()] +" "+ date.getFullYear().toString().slice(2,4);
        return fecha;
    }
    else
        return "Sin fecha";
}

function getFechaFormato()
{
    fecha="0000-00-00";
                // console.log(this);
                this[this.name] = value;
                // console.log(data);
                if(value!=fecha)
                {
                        date = new Date(value);
                        fecha = date.getDate()+1 +" "+ months[date.getMonth()] +" "+ date.getFullYear().toString().slice(2,4);
                        return fecha;
                }
                else
                        return "Sin fecha";
}