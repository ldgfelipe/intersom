var app = new Vue({
  vuetify: new Vuetify(),
  el: '#divWpVue',
  data(){
    return {

    }
  },
   components: {
    formini: httpVueLoader("./wp-content/plugins/vue-plug/components/formini.vue"),
   
  },
})