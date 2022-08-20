<?php 

// Top level menu del plugin
function SPC_menu_administrador()
{
 add_menu_page('Simulador de Prestamos','Simulador de prestamos','manage_options',SPC_RUTA. '/admin/configuracion.php');
 add_submenu_page(SPC_RUTA .'/admin/configuracion.php','Datos Simulados','Datos Simulados','manage_options',SPC_RUTA . '/admin/verdatos.php');

}


add_action( 'admin_menu', 'SPC_menu_administrador' );

?>