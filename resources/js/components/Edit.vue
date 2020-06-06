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
 

        <!-- koniec html -->
        <button type="button" @click="add">zapisz</button>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../event-bus.js";

export default {
  props: ["schemat", "modelname"],
  data() {
    return {
      mode: "create",
      cruddata: {}
    };
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