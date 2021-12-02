<template>
  <div class="back">
      <slot></slot>
  </div>
</template>

<script>
import { defineComponent } from "vue"

export default defineComponent({
  components: {
  }
});
</script>

<style scoped>
  .back {
    position: fixed;
        top: 0;
        left: 10%;
    height: 50%;
    width: 80%;
    margin: 0 auto;
 background:rgba(0, 0, 0, 0.1);
 color: white;
 display: flex;
 justify-content: center;
 align-items: center;
  }


</style>

