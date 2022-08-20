function buscarcodigo(){
   var codigopostal=$('#codigopostal').val()
    var basecolonias=[]
    var estadode=""
    var municipio=""
    $('#cargando').css('display','block');
       fetch('https://intersom.online/wp-json/simulador/v2/localidad/'+codigopostal)

      .then(res=>res.json())
      .then((res)=>{
       res.forEach((er)=>{
        basecolonias.push(er.colonia)

        $('#colonias').append($('<option>', { 
            value: er.colonia,
            text : er.colonia
        }))


        estadode=er.estado
        municipio=er.municipio
       })

       $('#colonias').append($('<option>', { 
        value:'Otra',
        text :'Otra'
    }))

       $('#cargadir').css('display','block');
       $('#ciudades').val(municipio);
       $('#estadoes').val(estadode);

       $('#cargando').css('display','none');
      })
       


}

function otracoloniabusca(){
    if($('#colonias').val()==='Otra'){
        $('#otcolonia').css('display','block');
    }else{
        $('#otcolonia').css('display','none');
    }
}


function validSubmit(){
    var error=[]
    if($('#nombre').val().length===0){
        error.push('Ingrese su Nombre y Apellido<br />')
    }

    if($('#correo').val().length===0){
        error.push('Ingrese su Correo<br />')
    }
    $('#telefono').val()
    $('#dirección').val()
    $('#codigopostal').val()
    $('#colonias').val()
    $('#otracolonia').val()
    $('#ciudades').val()
    $('#estadoes').val()
    $('#monto').val()

if(error.length>0){
    $('#errores').css('display','block')
    $('#errores').html(error)    
    setTimeout(()=>{
        $('#errores').css('display','none')
        $('#errores').html('') 
        },5000)
    }else{
            $('#datospersonals').submit();
    }
}