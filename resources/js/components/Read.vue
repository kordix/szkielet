<template>
   <div>
   
   <div v-if="modelname.length > 0">
       <p><b>{{modelname}}</b></p>
       <table class="table table-bordered table-dark">
           <thead>
               <tr>
                   <td v-for="elem in heads">
                       {{elem}}
                   </td>
               </tr>

           </thead>
           <tbody>
               <tr v-for="elem in dane" >
                   <td v-for="head in heads">{{elem[head]}}</td>
               </tr>
           </tbody>
       </table>
            
    </div>
    <div v-else>Zapodaj nazwę modelu by użyć komponentu Read</div>

    </div>
</template>

<script>
export default {
    props:['modelname'],
    data(){
        return {
            dane:[],
            hidden:['created_at','updated_at']

        }
    },
    methods:{
        getData(){
            let self = this;
            axios.get('/'+this.modelname.toLowerCase()).then((res)=>self.dane=res.data)
        },
        getHeads(){
            console.log(Object.keys(this.dane[0]));
            
        }
    },
    mounted(){
        this.getData();
    },
    computed:{
        heads(){
            let self = this;
            // return typeof(this.dane[0])
            if(typeof(this.dane[0])=='object'){
            return Object.keys(this.dane[0]).filter((el)=>self.hidden.indexOf(el)==-1)
            }else{
                return []
            }
        }
    }

}
</script>