

$(function(){
                                                                              
$("#CLAVE_DOCUMENTO").keyup(function(){
    var valueclavedocumento=$(this).val();

    verificarExiste(valueclavedocumento,"clave_documento");

});


$('.select').on('change', function() {
  column="ID_EMPLEADO";
  val=$(this).prop('value');
   $.ajax({
        url: "../Controller/DocumentosController.php?Op=Modificar",
        type: "POST",
        data:'column='+column+'&editval='+val+'&id='+id_clausula,
        success: function(data){
             consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
             swal("Actualizacion Exitosa!", "Ok!", "success")


        }   
   });


});

$("#btn_guardar").click(function(){

            var CLAVE_DOCUMENTO=$("#CLAVE_DOCUMENTO").val();
            var DOCUMENTO=$("#DOCUMENTO").val();
            var ID_EMPLEADOMODAL=$("#ID_EMPLEADOMODAL").val();
            var REGISTROS=$("#REGISTROS").val();

           alert("CLAVE_DOCUMENTO :"+CLAVE_DOCUMENTO + "DOCUMENTO :"+DOCUMENTO + "ID_EMPLEADOMODAL :"+ID_EMPLEADOMODAL
                                    + "REGISTROS :"+REGISTROS);



            datos=[];
            datos.push(CLAVE_DOCUMENTO);
            datos.push(DOCUMENTO);
            datos.push(ID_EMPLEADOMODAL);
            datos.push(REGISTROS);

            saveToDatabaseDatosFormulario(datos);

});

$("#btn_limpiar").click(function(){

          $("#CLAVE_DOCUMENTO").val("");
          $("#DOCUMENTO").val("");
          $("#REGISTROS").val("");


});

}); //LLAVE CIERRE FUNCTION


function listarDatos()
{
    $.ajax
    ({
        url:'../Controller/DocumentosController.php?Op=Listar',
        type:'',
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datos)
        {
            reconstruirTable(datos);
        },
        error:function(error)
        {
            $('#loader').hide();
        }
    });
};


