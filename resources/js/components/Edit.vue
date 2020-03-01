<template>
      <div>
          <p v-if="schemat.length == 0">Zapodaj schemat by użyć komponentu Edit</p>
            <div>
            <p v-if="mode=='edit'"><b>Edytuj rekord</b></p>
            <p v-else><b>Stwórz nowy rekord</b></p>


            <div>
                <form :action="action" method="POST">
                <!-- <input type="hidden" class="form-control" :value="cruddata.id" name="id"> -->

                <div class="form-group" v-for="elem in schemat" v-if="elem.nazwa != 'id'">
                    <label :for="elem.nazwa">{{elem.nazwa}}</label>    
                    <input :type="elem.typ=='date' ? 'date' : 'text'" :name="elem.nazwa" v-model="cruddata[elem.nazwa]">
                </div>
                <button type="button" @click="add">zapisz</button>
                </form>
            </div>
        </div>

        </div>  
</template>

<script>
export default {
    props:['schemat','modelname'],
    data(){
        return {
            mode:'create',
            cruddata:{name:'',lastname:'',city:''}
        }
    },
    methods:{
        add(){
            axios.post('/client',this.cruddata);
        }
    },
    computed:{
        action(){
            return '/'+this.modelname.toLowerCase();
        },
        
    }
}
</script>