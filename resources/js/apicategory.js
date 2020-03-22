const apicategory = new Vue({
    el: '#apicategory',
    data: {
      nombre:'Christopher Chirino',
      slug:'',
      div_mensajeslug:'Slug Existe',
      div_claseslug:'badge badge-danger',
      div_aparecer: true,
      deshabilitar_boton:0
  
    },
    computed:{
        generarSlug : function(){
            var char = {
                  "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                  "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                  "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g
            
            this.slug = this.nombre.trim().replace(expr,function(e){
              return char[e]
            }).toLowerCase()
            
            return this.slug
            //.trim()Eliminar espacios
            // toLowerCase() Coloca las palabras en mayusculas
            //return this.nombre.trim().replace(/ /g,'-').toLowerCase()
        }
    },
    methods:{
            getCategory(){
                let url = '/api/category/'+this.slug
                axios.get(url).then(response=>{
                  this.div_mensajeslug = response.data
                  if(this.div_mensajeslug==="Slug Disponible"){
                      this.div_claseslug = 'badge badge-success'
                      this.deshabilitar_boton=0
                  }else{
                      this.div_claseslug = 'badge badge-danger'
                      this.deshabilitar_boton=1
                  }
                  this.div_aparecer = true
                })
            }
    }
});
