<!DOCTYPE>
<html>
<head>
<title>Simulador Intersome</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=0.9">
<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
 $url=$protocol.$domainName;
 $plugub=$url."/wp-content/plugins/vue-plug/";

?>
<link rel='stylesheet' id='bootstrap-css'  href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css?ver=6.0' type='text/css' media='all' />
<link rel='stylesheet' id='bootstraptheme-css'  href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css?ver=6.0' type='text/css' media='all' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js?ver=3.3.7' id='bootstrapjs-js'></script>
</head>    
<body>
  
<div id="app" style="margin:0px; padding:0px;">
    <v-app>
   <simulador />
</v-app>
</div>


</body>

</html>
<link rel='stylesheet' id='all-css'  href='https://intersom.biz/wp-content/plugins/vue-plug/css/all.css?ver=1.3' type='text/css' media='screen' />
<link rel='stylesheet' id='vuetify-css'  href='https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css?ver=1.2' type='text/css' media='screen' />
<link rel='stylesheet' id='materialds-css'  href='https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css?ver=1.3' type='text/css' media='screen' />
<link rel='stylesheet' id='e-animations-css'  href='https://intersom.biz/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.6.5' type='text/css' media='all' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js?ver=3.3.7' id='bootstrapjs-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/vuedev.js?ver=1' id='vuedev-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/vuetify.js?ver=1' id='vuetify-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/polyfill.min.js?ver=1' id='polyfill-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/vuerouter.js?ver=1' id='vuerouter-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/httpVueLoader.js?ver=1' id='httpVueLoader-js'></script>
<script type='text/javascript' src='<?php echo $plugub; ?>js/vuex.js?ver=1' id='vuex-js'></script> 

<script>

const urlsite=window.location.protocol+"//"+window.location.hostname;


var app = new Vue({
  vuetify: new Vuetify(),
  el: '#app',
  data(){
    return {
   
    }
  },
  mounted(){
 
  },
   components: {
    formini: httpVueLoader(urlsite+"/wp-content/plugins/vue-plug/components/formini.vue"),
    simulador: httpVueLoader(urlsite+"/wp-content/plugins/vue-plug/components/simulador.vue"),
    resultado: httpVueLoader(urlsite+"/wp-content/plugins/vue-plug/components/resultado.vue")
    
  },
})


</script>