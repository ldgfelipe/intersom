<?php 

/**
 * 
 * Plugin Name:Vue plug to Wordpress
 * Description: El componente con el cual puedes activar el servicio de vue en tu wordpress
 * 
 */


//Register scripts to use
function func_load_vuescripts() {
    wp_register_style( 'all', plugin_dir_url( __FILE__ ).'css/all.css', '', '1.3', 'screen' );

    wp_register_style( 'vuetify', 'https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css', '', '1.2', 'screen' );
     wp_register_style( 'materialds', 'https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css', '', '1.3', 'screen' );


    wp_register_script('vuedev', plugin_dir_url( __FILE__ ).'js/vuedev.js', 'vuedev', true );
    wp_register_script('vuetify', plugin_dir_url( __FILE__ ).'js/vuetify.js', 'vuedev', true );
    wp_register_script('polyfill', plugin_dir_url( __FILE__ ).'js/polyfill.min.js', 'vuedev', true );
    wp_register_script('vuerouter', plugin_dir_url( __FILE__ ).'js/vuerouter.js', 'vuedev', true );
    wp_register_script('httpVueLoader', plugin_dir_url( __FILE__ ).'js/httpVueLoader.js', 'vuedev', true );
    wp_register_script('vuex', plugin_dir_url( __FILE__ ).'js/vuex.js', 'vuex', true );
    wp_register_script('my_vuecode', plugin_dir_url( __FILE__ ).'vuecode.js', 'vuedev', false );


}
add_action('wp_enqueue_scripts', 'func_load_vuescripts');



function func_wp_vue($atts = []){
    //css 
    wp_enqueue_style('all');
    wp_enqueue_style('vuetify');
    wp_enqueue_style('materialds');

    wp_localize_script( 'my_vuecode', 'php_vars', $atts ); 

   //Add Vue.js
  wp_enqueue_script('vuedev');
  wp_enqueue_script('vuetify');
  wp_enqueue_script('polyfill');
  wp_enqueue_script('vuerouter');
  wp_enqueue_script('httpVueLoader');
  wp_enqueue_script('vuex');

  $divApp="divWpVue";
    //Add my code to it
  wp_enqueue_script('my_vuecode' );
  
  if(isset($atts['divapp']) && $atts['divapp']!=NULL){
    $divApp=$atts['divapp'];
  }

  //Build String
  $str="<div  id='".$divApp."'><v-app>
  <".$atts['componente']." />"
  ."</v-app></div>
  ";

  //Return
  return $str;

}

add_shortcode('wpvue','func_wp_vue',$ctx);





?>