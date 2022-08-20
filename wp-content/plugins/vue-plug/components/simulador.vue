<template>
<div class="text-center ma-auto"  style="max-width:600px; width:100%">
<v-card v-if="load" class="ma-auto">
<v-card-text class="mt-10">
<img src="https://intersom.biz/wp-content/uploads/2022/05/favicon-intersom-257x300.png" style="max-width:150px; width:100%;"/><br />
<img src="https://intersom.biz/wp-content/plugins/vue-plug/images/loader1.gif" style="max-width:500px; width:100%;"/>

<br />



</v-card-text>
</v-card>
<div v-if="!load">
<v-card>

<v-card-title class="primary white--text text-center">¿Cuánto necesitas? <v-spacer></v-spacer> <v-btn class="orange" @click="gotoback()"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
<v-card-text>
  <br /> 
  <br /> 
<v-text-field v-model="monto" solo dense type="Number" prefix="$" suffix="MXN"   label="Ingrese la cantidad "  ></v-text-field>
<br />
<h2>${{formatomoneda}} </h2>
<br />
<h4>¿A qué plazo quieres pagarlo?</h4><br />
<v-row>
    <v-col cols="2" md="2"><v-btn style="width:100%; margin:0px; padding: 0px;"  @click="selectplazos(6)" :class="plazo===6 ? 'primary' : 'grey white--text' ">6</v-btn></v-col>
    <v-col cols="2" md="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(12)" :class="plazo===12 ? 'primary' : 'grey white--text' ">12</v-btn></v-col>
    <v-col cols="2" md="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(18)" :class="plazo===18 ? 'primary' : 'grey white--text' ">18</v-btn></v-col>
    <v-col cols="2" md="2"><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(24)" :class="plazo===24 ? 'primary' : 'grey white--text' ">24</v-btn></v-col>
    <v-col cols="2" md="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(36)" :class="plazo===36 ? 'primary' : 'grey white--text' ">36</v-btn></v-col>
    <v-col cols="2"  md="2"><v-btn  style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(48)" :class="plazo===48 ? 'primary' : 'grey white--text' ">48</v-btn></v-col>
     <v-col cols="12" md="12" class="text-center"><v-btn class="primary white--text" @click="caragaResultados()">Cotizar</v-btn></v-col>
</v-row>

<br /><br />
  <table v-if="total.totalanual">
  <tr>
    <th></th>
    <th><b>NUESTRA
MEJOR TASA</b></th>
    <th>NUESTRA
TASA PROMEDIO</th>
<th>TASA DE
LOS BANCOS</th>
  </tr>
  <tr>
    <td>Tasa de interés anual:</td>
    <td>${{total.totalanual}}</td>
    <td>0</td>
     <td>0</td>
  </tr>
  <tr>
    <td>Pago mensual: :</td>
    <td>${{total.totalmensual}}</td>
    <td>0</td>
     <td>0</td>
  </tr>





</table><br /><br />

<v-btn v-if="total.totalanual" class="primary white--text" @click="gotocontacto()" >Solicitar Financiamiento</v-btn>

</v-card-text>

</v-card>
</div>


</div>
</template>
<style>
body{
	font-family: Montserrat;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<script>
module.exports={
    data(){
        return {
            monto:0,
            plazo:6,
            intmen:0.03,
            total:{},
            load:true 
        }
    },
    computed:{
      formatomoneda(){
        let val = (this.monto/1).toFixed(2).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      },
   
       
    },
    created(){
      setTimeout(()=>{
        this.load=false
      },5000)
    },
    methods:{
        selectplazos(p){
            this.plazo=p
           


        },
        gotocontacto(){
          window.location.href='./contacto'
        },
        gotoback(){
          if(confirm('¿Seguro que desea salir del simulador Intersom?')){ window.location.href="./financiamiento" }
        },
        caragaResultados(){

          let i=this.intmen
          let p=this.monto
          let m=this.plazo
          let vi=(i*100)/p
          console.log(vi)
            let pago_realizdo=p*((vi/m)/(1-Math.pow(1+(vi/m),(-m))))
           let mensual= (pago_realizdo/1).toFixed(2).replace('.', ',')
           let anual=((pago_realizdo*12)/1).toFixed(2).replace('.', ',')
     
          this.total={
                totalmensual:mensual.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."),
                totalanual:anual.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                
            }
      /*      jQuery('#resutados').html(`<div style="width:100%; overflow:auto;">
               <table>
  <tr>
    <th></th>
    <th><b>NUESTRA
MEJOR TASA</b></th>
    <th>NUESTRA
TASA PROMEDIO</th>
<th>TASA DE
LOS BANCOS</th>
  </tr>
  <tr>
    <td>Tasa de interés anual:</td>
    <td>${total.totalanual}</td>
    <td>0</td>
     <td>0</td>
  </tr>
  <tr>
    <td>Pago mensual: :</td>
    <td>${total.totalmensual}</td>
    <td>0</td>
     <td>0</td>
  </tr>
  </tr>
</table>

             </div>`) */
        }
    }
}
</script>