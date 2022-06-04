<?php 
///https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js
function mindtheme2_style(){
     wp_enqueue_style('style',get_stylesheet_uri());
     wp_enqueue_style('normalize',get_stylesheet_directory_uri().'/css/normalize.css');
     wp_enqueue_style('animaciones',get_stylesheet_directory_uri().'/css/animaciones.css');
     wp_enqueue_style('poppins','https://fonts.googleapis.com/css2?family=Poppins&display=swap');
     wp_enqueue_script('jqueryjs','http://code.jquery.com/jquery-1.9.1.js');
     wp_enqueue_style('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
     wp_enqueue_script('bootstrapjs','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',Array('jqueryjs'),'3.3.6',true);
     wp_enqueue_script('functionjs',get_stylesheet_directory_uri().'/js/function.js');
     wp_enqueue_script('animacionesjs',get_stylesheet_directory_uri().'/js/animaciones.js');
    
}

add_action('wp_enqueue_scripts','mindtheme2_style'); 
/*** Imagen destacada */
add_theme_support('post-thumbnails');

/** Nueva Navegacion */
register_nav_menus( array(
    'menu_principal'=>__('Menu Principal','mindtheme2')
) );

