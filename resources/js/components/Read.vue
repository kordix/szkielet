<template>
  <div>
    <div v-if="modelname.length > 0">
      <p>
        <b>{{modelname}}</b>
      </p>
      <table class="table table-bordered table-dark">
        <thead>
          <tr>
            <td>Portal</td>
            <td>login</td>
            <td>hasło</td>
            <td>created_at</td>


            <!-- <td v-for="elem in heads">{{elem}}</td> -->
            <!-- <td>usuń</td> -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="elem in dane">
            <td>{{elem.name}}</td>
            <td>{{elem.login}}</td>
            <!-- <input :value="elem.password" type="password"> -->
            <shower :value="elem.password"></shower>
            <td>{{elem['created_at']}}</td>
            <!-- <td>{{elem['password']}}</td> -->


            <!-- <td v-for="head in heads">{{elem[head]}}</td> -->
            <td><button @click="mydestroy(elem.id)" class="btn btn-sm btn-danger">Usuń</button></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else>Zapodaj nazwę modelu by użyć komponentu Read</div>
  </div>
</template>

<script>
import { EventBus } from "../event-bus.js";

export default {
  props: ["modelname"],
  data() {
    return {
      dane: [],
      hidden: ["created_at", "updated_at",'category_id']
    };
  },
  methods: {
    getData() {
      let self = this;
      //axios.get("/category").then(res => console.log(res));
      axios.get("/" + self.modelname.toLowerCase()).then(res => (self.dane = res.data));
    },
    mydestroy(id){
        let self = this;
        axios.delete('/'+self.modelname.toLowerCase()+'/'+id).then(res => self.getData())
        
    }
  },
  mounted() {
    this.getData();
    EventBus.$on("reload", payload => {
        console.log('działa')
      this.getData();
    });
  },
  computed: {
    heads() {
      let self = this;
      // return typeof(this.dane[0])
      if (typeof this.dane[0] == "object") {
        return Object.keys(this.dane[0]).filter(
          el => self.hidden.indexOf(el) == -1
        );
      } else {
        return [];
      }
    }
  }
};
</script>