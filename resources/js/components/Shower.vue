<template>
<div>
    <input :value="value" :type="type">
    <button @click="myswitch">zobacz</button>
    </div>
    
</template>

<script>
export default {
    props:['value'],
    data(){
        return {
            type:'password'
        }
    },
    methods:{
        myswitch(){
            if(this.type=='password'){
                this.type = 'text'
            }else{
                this.type = 'password'
            }
        }
    }


}
</script>