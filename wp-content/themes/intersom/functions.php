<?php 
///https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js


function intersom_script(){

    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('normalize',get_stylesheet_directory_uri().'/css/normalize.css');
    wp_enqueue_style('animaciones',get_stylesheet_directory_uri().'/css/animaciones.css');
    wp_enqueue_style('poppins','https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    wp_enqueue_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstraptheme','https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css'); 

    
    wp_enqueue_script('jqueryjs','https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
    wp_enqueue_script('bootstrapjs','https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js',Array('jqueryjs'),'3.3.7',true);
    wp_enqueue_script('functionjs',get_stylesheet_directory_uri().'/js/function.js');
    wp_enqueue_script('animacionesjs',get_stylesheet_directory_uri().'/js/animaciones.js');

  
}

add_action('wp_enqueue_scripts','intersom_script'); 



/*** Imagen destacada */
add_theme_support('post-thumbnails');

/** Nueva Navegacion */
register_nav_menus( array(
    'menu_principal'=>__('Menu Principal','mindtheme2')
) );

