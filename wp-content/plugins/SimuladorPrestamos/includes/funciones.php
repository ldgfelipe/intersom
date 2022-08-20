<?php 

//Register scripts to use
function function_cabecera_import() {
    wp_register_style( 'all', plugin_dir_url( __FILE__ ).'css/all.css', '', '1.3', 'screen' );
    wp_register_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', '1.0', false );
    wp_register_style( 'bootstrap3', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', '1.0', 'screen');
    wp_register_script('funcionSimulador', plugin_dir_url( __FILE__ ).'js/funciones.js', 'functionSimulador', true );
  }
  
  add_action('wp_enqueue_scripts', 'function_cabecera_import');



function shortcode_SMC() {


      
  wp_enqueue_style('all');
  wp_enqueue_style('bootstrap3');
  wp_enqueue_script('bootstrapjs');
  wp_enqueue_script('funcionSimulador');
    /////formulario inicial
     if(!isset($_REQUEST['monto'])){
        //Formularii inicial
        $template.="
            <form method='post' id='datospersonals'> 
           <h4>Datos Personales</h4> 
            Nombre y Apellido
            <input type='text' name='nombre' id='nombre' class='form-control' placeholder='Nombre(s) Apellido' /><br />

           Ingresa tu correo electrónico
            <input type='text' name='correo' id='correo' class='form-control' placeholder='nombre@correo.com' /><br />

            Número de contacto:
            <input type='number' name='telefono' id='telefono' class='form-control' placeholder='555 555 5555' /><br />


            Información de tu domicilio<br />

            Dirección
            <input type='text' name='dirección'  class='form-control'  placeholder='Numero interior, Numero Exterior, Calle, Cerrada' />


            Código Postal:
            <input type='number' id='codigopostal' name='codigopostal' class='form-control' placeholder='ingrese el código postal 72000' /> 
            <div class='btn btn-primary' onclick='buscarcodigo()' style='background-color:#0aa4b4;''>Buscar Código</div>
            <div id='cargando' style='display:none; '>Buscando Código Postal</div>
            <br />
            <div id='cargadir' style='display:none;'>
                    Colonia:
                    <select  name='colonia' id='colonias' onchange='otracoloniabusca()' class='form-control' placeholder='Colonia'  >
                    </select>
                    <br />

                    <div id='otcolonia' style='display:none;'>
                        Otra Colonia:
                        <input type='text' name='otracolonia' id='otracolonia' class='form-control'  placeholder='Colonia ' /><br />
                    </div>


                    Ciudad:
                    <input type='text' name='ciudad' id='ciudades' class='form-control' readonly placeholder='Ciudad o Municipio' /><br />

                    Estado:
                    <input type='text' name='estado' id='estadoes'  class='form-control' readonly placeholder='Estado' /><br />




                    Monto de tu préstamo (Min. $500 mil Max. $2 millones)
                    <input type='text' name='monto' id='monto' class='form-control'  placeholder='500000' /><br />
                    <br />
                    Como prefiere ser contactado
<div class='row'>
        <div class='col-md-4'>
        <input type='checkbox' name='mensajewhatsapp' /> Mensaje vía WhatsApp 
        </div>
        <div class='col-md-3'>
        <input type='checkbox' name='mensajellamada' /> Llamada Teléfonica
        </div>
        <div class='col-md-3'>
        <input type='checkbox' name='mensajecorreo' /> Correo Electrónico
        </div>
        <div class='col-md-12' style='height:50px;'></div>
        <div class='col-md-12'>
        
       <p style='text-align:justify;'> <input type='checkbox' name='Acepto' /> 
       Por este conducto autorizo expresamente a Intersom S.A.P.I. de C.V. para que por conducto de sus funcionarios facultados lleve a cabo investigaciones sobre mi comportamiento crediticio en las Sociedades de Información Crediticia que estime conveniente. Así mismo, declaro que conozco la naturaleza y alcance de la información que se solicitará, del uso que Intersom S.A.P.I. de C.V. hará de tal información y de que ésta podrá realizar consultas periódicas de mi historial crediticio, consintiendo que esta autorización se encuentra vigente por un periodo de 3 años contados a partir de la fecha de su expedición y en todo caso durante el tiempo que mantengamos relación jurídica.
       </p>
        </div>
        <div class='col-md-12'>
        <input type='checkbox' name='avisodeprivacidad' /> Aviso de Privacidad
        </div>

</div>

                <div id='errores' class='alert alert-danger' style='display:none;' ></div>
                <div class='btn btn-primary' onclick='validSubmit()' style='background-color:#0aa4b4;'>Continuar</div>

            </div>


            </form>

        ";
     }

    




    //// tabla de información 


   if(isset($_REQUEST['monto']) and $_REQUEST['monto']!=NULL){





    if(isset($_REQUEST['meses']) and $_REQUEST['meses']!=NULL){
        /// Tabla de resultados
        $tasa=0.025;
        $interes=$_REQUEST['monto']*$tasa;
        $exponenciar=pow(1+$tasa,$_REQUEST['meses'])-1;
        $pagofijo=($interes/$exponenciar)+$interes;

       
        $resultado.="<table>";
            $resultado.=" <tr>
            <th># Periodos</th>
            <th>Saldo Inicial</th>
            <th>Cuota Final</th>
            <th>Interés</th>
            <th>Abono a Capital</th>
            <th>Saldo Final</th>
          </tr>";
          $totaldeinteres=0;
        for($t=0;$t<$_REQUEST['meses'];$t++){
            $periodo=$t+1;
            if($t==0){
                $saldoinicial=$_REQUEST['monto'];
            }else{

                $saldoinicial=$saldofinal;
            }
            
            $cuotafija=$pagofijo;
            $interes1=$saldoinicial*$tasa;
            $abonocapital=$cuotafija-$interes1;
            $saldofinal=$saldoinicial-$abonocapital;
            $totaldeinteres= $totaldeinteres+$interes1;

            $resultado.="<tr>
                <td>".$periodo."</td>
                <td>$".number_format($saldoinicial,2)."</td>
                <td>$".number_format($cuotafija,2)."</td>
                <td>$".number_format($interes1,2)."</td>
                <td>$".number_format($abonocapital,2)."</td>
                <td>$".number_format($saldofinal,2)."</td> 
            </tr>";
            }

            $resultado.="</table>";


    
        
    }






    $template.="
       
            <form method='POST'>
            <div class='row'>
         
                <div class='col-md-4'>
                </div>
                <div class='col-md-4' style='text-align:center;'>
                    <label>Ingrese el monto de prestamo</label>
                    <input type='number' style='text-align:center; font-size:24px;' name='monto' value='".$_REQUEST['monto']."' class='form-control'  />
                   
                </div>
                <div class='col-md-4'>
                </div>
                <div class='col-md-3'>
                </div>

                <div class='col-md-6' style='text-align:center;'>
              
                    <label>Seleccione los meses</label>
                    <br />
                    <div class='btn-group btn-group-toggle' data-toggle='buttons'>
                        
                            
                              
                            
                            
                            
                                <label class='btn btn-secondary'>
                                    <input type='radio' name='meses' value='12' id='option2' autocomplete='off' ";
                                    if($_REQUEST['meses']==12){
                                        $template.= "checked";
                                    }    
                            
                        $template.="> 12
                                </label>
                           

                            
                                <label class='btn btn-secondary'>
                                    <input type='radio' name='meses' value='24' id='option3' autocomplete='off' ";
                                    if($_REQUEST['meses']==24){
                                        $template.= "checked";
                                    }
                        $template.=" > 24
                                </label>
                           

                            
                                <label class='btn btn-secondary'>
                                    <input type='radio' name='meses' value='36' id='option4' autocomplete='off' ";
                                    if($_REQUEST['meses']==36){
                                        $template.= "checked";
                                    }
                        
                        $template.="> 36
                                </label>
            

                        <label class='btn btn-secondary'>
                        <input type='radio' name='meses' value='48' id='option6' autocomplete='off' ";
                        if($_REQUEST['meses']==48){
                            $template.= "checked";
                        }
                        
            $template.=" > 48
                                </label>
                        
                                <label class='btn btn-secondary'>
                                <input type='radio' name='meses' value='60' id='option1' autocomplete='off' ";
                    if($_REQUEST['meses']==60){
                        $template.= "checked";
                    }
                    $template.=" > 60
                            </label>
                       
                            <label class='btn btn-secondary'>
                                <input type='radio' name='meses' value='72' id='option1' autocomplete='off' ";
                    if($_REQUEST['meses']==72){
                        $template.= "checked";
                    }

                    $totales="";

                    if(isset($_REQUEST['monto']) and $_REQUEST['monto']!=NULL and isset($_REQUEST['meses']) and $_REQUEST['meses']!=NULL){
                            $totales="
                            <div style='width:100%; bottom:0px; left:0px; background-color:#fff; padding:10px; z-index:999999999999;' > 
                            <div class='row' style='width:100%; text-align:center; padding:0px; margin:0px;'>
                                <div class='col-md-12' style='text-align:center;' >
                                <h5>Resultado de simulador</h5>
                            <hr />
                                </div>

                                <div class='col-md-4' style='text-align:center;' >
                                    <h5>Cuota Mensual fija: <br /> $".number_format($pagofijo,2)."</h5>
                                </div>

                                <div class='col-md-4' style='text-align:center;'>
                                    <h5>Total de interes: <br /> $".number_format($totaldeinteres,2)."</h5>
                                </div>

                                <div class='col-md-4' style='text-align:center;'>
                                    <h5>Total Monto + Interes: <br /> $".number_format($totaldeinteres+$_REQUEST['monto'],2)."</h5>
                                </div>
                                <div class='col-md-12' style='text-align:center;'>
                                <a href='#' type='submit' class='btn btn-primary btn-lg btn-block' style='background-color:#0aa4b4;'>COMPLETA TU SOLICITUD</a> 
                                </div>

                            </div>   
                        </div>
                            ";
                    }


                    $template.=" > 72
                            </label>

                        
                        </div>
                </div>
                <div class='col-md-3'>
                </div>
                <div class='col-md-4'>
                </div>
                <div class='col-md-4' style='text-align:center;'>
                <br />
                
                <input type='submit' class='btn btn-primary btn-lg btn-block' value='Simular Credito' />
                <br /> <br />
                </div>
                <div class='col-md-12'>

                <div class='container' style='overflow:auto; width:100%; max-width:100%;'>
                ".$resultado."
                </div>
                    ".$totales."

                </div>
                </div>

                   

            </form>
    
        <div style='width:100%; height:200px;'>
        </div>
    ";
}



    return $template;
}

add_shortcode('SMC', 'shortcode_SMC');




add_action( 'rest_api_init', function () {
    register_rest_route( 'simulador/v2', '/localidad/(?P<codigopostal>\d+)', array(
      'methods' => 'GET',
      'callback' => 'apirestLoaclidad',
    ) );
  } );
  
function apirestLoaclidad($data){
global $wpdb;

$table='codigo_postal';
$sql = "SELECT colonia,municipio,estado FROM $table WHERE codigo_postal= %d";
  $codigopostal = $data['codigopostal'];

  $result = $wpdb->get_results( $wpdb->prepare( $sql, $codigopostal ) );
   

    return  $result;

}


?>