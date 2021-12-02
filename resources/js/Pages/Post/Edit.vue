<template>
 <div class="container">

    <form @submit.prevent="submit">

      <label>Nombre</label>
      <input type="text" v-model="form.name">
              <transition name="fade">
  <p class="err" v-if="show">{{errors.name}}</p>
  </transition>

       <label>Slug</label>
      <input type="text" v-model="form.slug">


        <label>Category</label>
        <select v-model="form.category_id">
          <option value="1">front</option>
          <option value="2">desing</option>
          <option value="3">interior</option>
          <option value="4">change</option>
        </select>

         <label>descripcion</label>
      <input type="text" v-model="form.descripcion">
    

         <label>Estado</label>
      <input type="text" v-model="form.status" disabled>

      <button type="submit">Enviar</button>
    </form>
  </div>
</template>


<script>
import { defineComponent } from "vue"
import { Inertia } from '@inertiajs/inertia'


export default defineComponent({
	props:['post', 'user', 'errors'],
	data() {
		return {
			form: {
	  name: this.post.name,
      slug:this.post.slug,
      descripcion:this.post.descripcion,
      extract: this.post.extract,
      status:this.post.status,
      category_id:this.post.category_id,
      user_id:this.user.id,
			},
			  show:false
		}
	},
	methods: {
		submit() {
			Inertia.put(route("post.update", {"post": this.post}), this.form)
		}
	}
});

</script>

<style>
	    form {
    max-width: 600px;
    margin: 80px auto;
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
</style>