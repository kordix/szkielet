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
                    <input v-if="elem.typ=='date'" type="date" :name="elem.nazwa" v-model="cruddata[elem.nazwa]">
                    <input v-else-if="elem.typ=='integer'" type="number" :name="elem.nazwa" v-model="cruddata[elem.nazwa]">
                    <select v-else-if="elem.typ=='category'" :name="elem.nazwa" v-model="cruddata[elem.nazwa]">
                        <option v-for="el in elem.dane" :value="el.id">{{el.name}}</option>
                    </select>
                    <input v-else type="text" :name="elem.nazwa" v-model="cruddata[elem.nazwa]">

                </div>
                <button type="button" @click="add">zapisz</button>
                </form>
            </div>
        </div>

        </div>  
</template>

<script>
import { EventBus } from '../event-bus.js';

export default {
    props:['schemat','modelname'],
    data(){
        return {
            mode:'create',
            cruddata:{}
        }
    },
    methods:{
        add(){
            let self = this;
            axios.post('/'+this.modelname.toLowerCase(),this.cruddata).then((res=>self.emitReload()));
        },
        reset(){
            this.cruddata = {}

        },
        emitReload(){
            this.reset();
            EventBus.$emit('reload', '');
        }
    },
    computed:{
        action(){
            return '/'+this.modelname.toLowerCase();
        },
        
    }
}
</script>