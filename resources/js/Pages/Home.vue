<template>
  <app-layout title="Dashboard">

hola

  </app-layout>
  <div class="container bg-white overflow-hidden shadow-xl sm:rounded-lg">
      <table class="table-auto w-full table-responsive">
      <thead>
        <tr>
          <th class="p-3">id</th>
          <th class="p-3">name</th>
          <th class="p-3">title</th>
          <th class="p-3">descripcion</th>
          <th class="p-3">Estado</th>

        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td class="border p-3">{{post.id}}</td>
           <td class="border p-3">{{post.name}}</td>
            <td class="border p-3">{{post.extract}}</td>
            <td class="border p-3">{{post.descripcion}}</td>
             <td class="border p-3">{{post.status}}</td>
        </tr>
      </tbody>
      </table>
  </div>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"


export default defineComponent({
	props:['posts'],
  components: {
    AppLayout,
  }
});
</script>
