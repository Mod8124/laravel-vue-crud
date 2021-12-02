<template>
  <app-layout title="Create">

  </app-layout>


  <div class="container">

    <form @submit.prevent="submit">
      
        <transition name="fade">
  <p class="err" v-if="show">{{errors.name}}</p>
  </transition>
      
      <label>Nombre</label>
      <input type="text" v-model="name">

       <label>Slug</label>
      <input type="text" v-model="slug">
              <transition name="fade">
  <p class="err" v-if="show">{{errors.slug}}</p>
  </transition>

        <label>Category</label>
        <select v-model="category">
          <option value="1">front</option>
          <option value="2">desing</option>
          <option value="3">interior</option>
          <option value="4">change</option>
        </select>

           <input type="file" @input="image= $event.target.files[0]" />

           <img  v-if="image" :src="image" class="w-full mt-4 h-80">

         <label>descripcion</label>
      <input type="text" v-model="descripcion">
    
<!-- <input type="file" @input="image = $event.target.files[0]" /> -->

         <label>Estado</label>
      <input type="text" v-model="status" disabled>

      <button type="submit">Enviar</button>
    </form>
  </div>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import { Inertia } from '@inertiajs/inertia'
import Hola from '@/compo/Hola.vue'
import Error from '@/Jetstream/InputError'
import { useForm } from '@inertiajs/inertia-vue3'



export default defineComponent({
  props:['posts', 'user', 'errors'],
  data() {
    return {
      name: null,
      slug:null,
      descripcion:null,
      extract: null,
      status:'nuevo',
      category:null,
      show:false,
      image: null,

        form: this.$inertia.form({
         name: null,
      slug:null,
      descripcion:null,
      extract: null,
      status:'nuevo',
      category:null,
      show:false,
      image: null,
      }),
      
    }

  },
  components: {
    AppLayout,
    Hola,
    Error
  },
  computed: {
    reduce() {
     return this.posts.filter((x)=> x.id < 10)

    }
  },
  methods: {
    submit() {
      this.form.put('post.store');
    }
  }
});
</script>

<style scoped>
    form {
    max-width: 420px;
    margin: 30px auto;
    background: white;
    text-align: left;
    padding: 40px;
    border-radius: 10px;

  }

  label {
    color: #aaa;
    display: inline-block;
    margin: 25px 0 15px;
    font-size: 0.6em;
    text-transform: 1px;
    font-weight: bold;
  }

  input {
    display: block;
    padding: 10px 6px;
    width: 100%;
    box-sizign: border-box;
    color: #555;
    border: none;
      border-bottom: 3px solid #ddd;
  }

  select {
    border: none;
    border-bottom: 2px solid #ddd;
    width: 100%;
  }
  input[type="checkbox"] {
    display: inline-block;
    width: 16px;
    margin: 0 10px 0 0;
    positio: relative;
    top: 2px;
  }

  button {
    background: blue;
    border:  0;
    padding: 10px 30px;
    margin-top: 20px;
    color: white;
    border-radius: 20px;
    cursor: pointer;
  }

  .err {
    color: red;
    margin-top: 10px;
    font-size: 0.8em;
    font-weight: bold;
    animation : example 1s ;
  }


.fade-enter-active, .fade-leave-active {
   transition: color 0.2ms;
   color: pink;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  color: red;
}
</style>
