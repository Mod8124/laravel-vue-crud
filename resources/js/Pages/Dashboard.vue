<template>
  <app-layout title="Dashboard">


  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import Welcome from "@/Jetstream/Welcome.vue"
  import JetDialogModal from '@/Jetstream/DialogModal.vue'

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    JetDialogModal
  },
  data() {
    return {
      show: false
    }
  }
});
</script>
