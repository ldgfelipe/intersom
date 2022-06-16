<template>
<div class="text-center">
¿Cuánto necesitas?
<v-text-field v-model="monto" type="Number" Outlined label="Ingrese la cantidad "  ></v-text-field>
<br /> 
¿A qué plazo quieres pagarlo?
<v-row>
    <v-col cols="2" ><v-btn style="width:100%; margin:0px; padding: 0px;"  @click="selectplazos(6)" :class="plazo===6 ? 'primary' : 'grey white--text' ">6</v-btn></v-col>
    <v-col cols="2"  ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(12)" :class="plazo===12 ? 'primary' : 'grey white--text' ">12</v-btn></v-col>
    <v-col cols="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(18)" :class="plazo===18 ? 'primary' : 'grey white--text' ">18</v-btn></v-col>
    <v-col cols="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(24)" :class="plazo===24 ? 'primary' : 'grey white--text' ">24</v-btn></v-col>
    <v-col cols="2" ><v-btn style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(36)" :class="plazo===36 ? 'primary' : 'grey white--text' ">36</v-btn></v-col>
    <v-col cols="2" ><v-btn  style="width:100%; margin:0px; padding: 0px;" @click="selectplazos(48)" :class="plazo===48 ? 'primary' : 'grey white--text' ">48</v-btn></v-col>
     <v-col cols="12" class="text-center"><v-btn class="primary" @click="caragaResultados()">Cotizar</v-btn></v-col>
</v-row>



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
            intmen:0.03
        }
    },

    methods:{
        selectplazos(p){
            this.plazo=p
           


        },
        caragaResultados(){

          let i=this.intmen
          let p=this.monto
          let m=this.plazo
          let vi=(i*100)/p
          console.log(vi)
            let pago_realizdo=p*((vi/m)/(1-Math.pow(1+(vi/m),(-m))))

             var total={
                totalmensual:pago_realizdo.toFixed(2),
                totalanual:(pago_realizdo*12).toFixed(2)
                
            }
            jQuery('#resutados').html(`<div style="width:100%; overflow:auto;">
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

             </div>`)
        }
    }
}
</script>