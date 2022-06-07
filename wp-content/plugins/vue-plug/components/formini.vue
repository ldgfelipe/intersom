<template>
	<div>
<form ref="formulario" action="/financiamiento">
		<v-row>
			<v-col cols="12" md="12" >
			<h2>Ingresa tus datos y obtén una respuesta inmediata</h2>
			</v-col>
			<v-col cols="12" md="12">
				
					<v-text-field Outlined label="Datos Personales"  v-model="form.personales"></v-text-field>
					<v-text-field Outlined label="¿Cómo estás dado de alta en el SAT?" v-model="form.sat"></v-text-field>
					<v-text-field Outlined label="Documentos de Identificación" v-model="form.identificaciones"></v-text-field>
					<v-text-field Outlined label="Información del domicilio" v-model="form.domicilio"></v-text-field>
					<v-text-field Outlined label="Teléfono de oficina" v-model="form.teldom"></v-text-field>
					<v-text-field Outlined label="Teléfono de Celular" v-model="form.telcel"></v-text-field>
					<v-text-field Outlined label="Correo electrónico" v-model="form.correo"></v-text-field>
			
			</v-col>

			<v-col cols="1" md="1">
				<v-checkbox v-model="form.minicontra" ></v-checkbox>
			</v-col>
			<v-col cols="11" md="11">
				<p class="text-justify">
					Por este conducto autorizo expresamente a Intersom S.A.P.I. de C.V. para
que por conducto de sus funcionarios facultados lleve a cabo investigaciones
sobre mi comportamiento crediticio en las Sociedades de Información Crediticia que estime conveniente. Así mismo, declaro que conozco la naturaleza y
alcance de la información que se solicitará, del uso que Intersom S.A.P.I. de
C.V. hará de tal información y de que ésta podrá realizar consultas periódicas
de mi historial crediticio, consintiendo que esta autorización se encuentra
vigente por un periodo de 3 años contados a partir de la fecha de su expedición y en todo caso durante el tiempo que mantengamos relación jurídica.
				</p>
			</v-col>


			<v-col cols="1" md="1">
				<v-checkbox v-model="form.terminosycondiciones" ></v-checkbox>
			</v-col>
			<v-col cols="11" md="11">
				<p class="text-justify">
					He leído, comprendo y acepto los Términos y Condiciones Generales y el
Aviso de Privacidad a través de este medio electrónico.
				</p>
			</v-col>

			<v-col cols="6" md="6" class="text-center">
				<v-btn class="primary" @click="validaFormulario('credito')" >Solicita tu crédito</v-btn>
			</v-col>

			<v-col cols="6" md="6" class="text-center">
				<v-btn class="secondary" @click="validaFormulario('simulador')"  >Simula tu crédito</v-btn>
			</v-col>
			<v-col>
				<v-chip class="red white--text" v-for="(row,index) in valid">
					{{row}}
				</v-chip>
			</v-col>
		</v-row>
		</form>
	</div>
</template>
<style>
body{
	font-family: Montserrat;
}
</style>
<script>
module.exports={
	data(){
		return {
			form:{},
			valid:[]
	
		}
	},
	methods:{
		validaFormulario(p){
			this.form.tipo=p
			this.valid=[]
			if(!this.form.personales) this.valid.push('Ingrese los datos personales')
			if(!this.form.sat) this.valid.push('Ingrese datos del sat')
			if(!this.form.identificaciones ) this.valid.push('Ingrese la identificación')
			if(!this.form.domicilio) this.valid.push('Ingrese el domicilio')
		
			if(!this.form.correo) this.valid.push('Ingrese el correo')
			if(!this.form.minicontra) this.valid.push('Debe aceptar las clausulas')
			if(!this.form.terminosycondiciones) this.valid.push('Debe aceptar los terminos y condiciones')
			if(this.valid.length===0){
				this.enviardatos()
			}else{
				setTimeout(()=>{
					this.valid=[]
				},3000)
			}
		},
		enviardatos(){
			this.$refs.formulario.submit()
		}
		
		}

	}
</script>