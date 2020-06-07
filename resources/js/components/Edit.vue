<template>
  <div>
    <div>
      <p v-if="mode=='edit'">
        <b>Edytuj rekord</b>
      </p>
      <p v-else>
        <b>Stwórz nowy rekord</b>
      </p>

      <div>
        <!-- <input type="hidden" class="form-control" :value="cruddata.id" name="id"> -->

        <!-- TU WSTAW HTML -->
        <label>title</label>
        <input v-model="cruddata.title">
        <label>description</label>
        <input v-model="cruddata.description" >
        <label>category_id</label>
        <input v-model="cruddata.category_id" >

        <!-- koniec html -->
        <button type="button" @click="add" v-if="mode=='create'">zapisz</button>
        <button type="button" @click="update" v-if="mode=='edit'">Zmień</button>

      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../event-bus.js";

export default {
  props: ["modelname"],
  data() {
    return {
      mode: "create",
      editid: null,
      cruddata: {}
    };
  },
  mounted() {
    EventBus.$on("edit", payload => {
      console.log("edit");
      this.mode = "edit";
      this.editid = payload;
      this.cruddata = thi
    });
  },
  methods: {
    add() {
      let self = this;
      axios
        .post("/" + this.modelname.toLowerCase(), this.cruddata)
        .then(res => self.emitReload());
    },
    reset() {
      this.cruddata = {};
    },
    emitReload() {
      this.reset();
      EventBus.$emit("reload", "");
    }
  },
  computed: {
    action() {
      return "/" + this.modelname.toLowerCase();
    }
  }
};
</script>