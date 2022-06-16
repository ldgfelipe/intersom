const urlsite=window.location.protocol+"//"+window.location.hostname;
const divapp = php_vars['divapp']


var app = new Vue({
  vuetify: new Vuetify(),
  el: '#'+divapp,
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
