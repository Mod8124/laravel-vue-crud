<template>
  <app-layout title="Post">
  
        <div class="container-fluid">
    <header>
     <h1>Interior Designers & Decorators in Costa Rica</h1>

    </header>

    <div class="cta">
      <div id="cta">
        <h1>Transforma tu lugar favorito</h1>
        <p>Somos una empresa dedicada y especializada en los cambios de interiores transformamos tu lugar favorito en algo elegante y unico.</p>
        <div>
          <button class="btn btn-dark ">Ver mas</button>
        </div>
      </div>
      <div class="fondo"></div>
    </div>

  </div><!--end container-->


  </app-layout>

  <div class="container bg-white overflow-hidden">

    <ul class="navbar-nav me-auto">

      <form @submit.prevent="consulta">
        <label >buscar....</label>
        <input type="search">
        <button type="submit">enviar</button>
      </form>

      <div :id="data | formatId"></div>

             <jet-nav-link :href="route('post.create')" :active="route().current('post.create')">
             <button class="btn btn-info">crear Desing</button>
            </jet-nav-link>

          </ul>
          <div class="row " v-for="post in posts" :key="post.id">
    <div class="col-lg-9 p-3 border text-center bg-info text-white"><h3 class="font-weight-bold">{{post.name}} {{post.image}}</h3> <img :src="post.image" alt=""></div>

    <div class="col-lg-3 p-3 border text-center" :class="{'bg-warning': post.id == 4}">{{post.id}}</div>

      <div class=" col-lg-12 ">
         <div class="row m-2">
             <div class="col-lg-12 p-3 border text-center bg-succes"><p>{{post.extract}}</p></div>

       <jet-nav-link :href="route('post.show', {'post': post})">
             <button class="btn btn-info">show</button>
            </jet-nav-link>

            <a :href="route('post.show', {'post': post})">hola</a>

               <jet-nav-link :href="route('post.edit', {'post': post})">
             <button class="btn btn-info">Edit</button>
            </jet-nav-link>

          {{$page.props.auth.user.role}}

        <div v-if="$page.props.auth.user.role === 'admin' ">hola</div>
       
              <jet-nav-link :href="route('post.destroy', {'post': post})" method="delete">
             <button class="btn btn-info">Borrar</button>
            </jet-nav-link>

         <!--      <Link :href="route('post.destroy', {'post': post})" class="text-danger" method="delete"> 
                Destroyer
              </Link> -->

              <button @click="deletePost(post)">aaaa</button>


         </div>
      </div>
  </div> 


  </div>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import JetNavLink from '@/Jetstream/NavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
  import JetDialogModal from '@/Jetstream/DialogModal.vue'


export default defineComponent({
  props:['posts', 'user'],
  data() {
    return {
      data: this.posts,
      // user: this.user
      hola: 'hola',
      show:true
    }
  },

  components: {
    AppLayout,
    JetNavLink,
    Head,
    Link,
    JetDialogModal
  },
  computed: {
    reduce() {
      return this.data.filter((x)=> x.id > 5 && x.id < 30)
    }
  },
  methods: {

    deletePost: function(data) {
     if(! confirm('estas seguro que quires eliminar a ' + data.name +  "?")) return;
      Inertia.delete(route('post.destroy', { post: data}))
    },

    consulta() {
      Inertia.get(route('post.index'))
    }
  },
  filters: {
  capitalize: function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
  }
}
});
</script>

<style scoped>
  a {
    text-decoration: none;
  }

header {
  width: 100%;
  height: 80vh;
  background-image: url('https://images.unsplash.com/photo-1618219740975-d40978bb7378?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1700&q=80');
  background-size: cover;
  text-align: center;
  display:flex;
  justify-content: center;
  align-items: center;
  background-attachment: fixed;
}

header h1 {
  font-size: 3em;
  font-weight: bold;
  color: #fff;
  margin: 50xp auto;
  align-self: center;
  padding: 50px;
  border: 6px solid white;
   background: rgba(0, 0, 0, 0.2);;
}

.cta {
  width: 100%;
  height: 60vh;
  margin:  0 auto;
  max-width: 1900px;
  display: flex;
  margin-top: 40px;
  margin-bottom: 20px;
}

.cta > div {
  flex: 1 ;
}

#cta {
  width: 80%;
  margin:  0 auto;
  text-align: center;
}

#cta h1 {
  color: #002eac;
  padding-top: 60px;
  padding-bottom: 40px;
}

#cta p {
  line-hegit: 30px;
  font-weight: 600;
  width: 80%;
  margin:  0 auto;
  padding-bottom: 60px;
}

#cta button {
  font-size: 20px;
  background: #ff9c00;
  border: 2px solid #ff9c00;
  transition: border 1s;
  color: #000;
  font-weight: 600;
}

#cta button:hover {
  border:  2px solid white;
  color: #000;
}

.fondo {
  background: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=958&q=80');
  background-size: cover;
  background-position: center center;
  height: 100%;
}
</style>
