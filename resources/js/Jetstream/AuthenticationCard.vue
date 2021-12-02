<template>
  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-sm-12 col-md-8 col-lg-5 my-4">
        <div class="logo">
          <slot name="logo" />
        </div>

        <div class="card shadow-sm px-3">
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>

<style>
  .logo {
    width: 80% ;
    margin: 0 auto;

  }
 
</style>