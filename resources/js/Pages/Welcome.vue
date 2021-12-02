<template>
  <Head title="Welcome" />

  <div class="wrapper"><!--start wrapper-->
     
            
        <div class="wrapperContainer">
   
          <div >
            <div class="fondo">
              <div class="logo">
                  <JetApplicationMark width="200"/>
              </div>
            </div>
          </div>


          <div>
            <div class="cta"><!---start cta-->

                <div class="nav">
                                 <div v-if="canLogin" class="d-flex justify-content-end ">
          <div>
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-muted">
              Dashboard
            </Link>

            <template v-else>
              <Link :href="route('login')" class="text-muted">
                Log in
              </Link>

              <Link v-if="canRegister" :href="route('register')" class="ms-4 text-muted">
                Register
              </Link>
            </template>
          </div>
        </div>

                </div><!--end nav-->

                <div id="cta">
                  <h1>Lugares Unicos y especials para ti</h1>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, nihil? Eligendi sequi voluptatum vel delectus, ea perspiciatis fugit rerum quibusdam excepturi quia amet asperiores eius mollitia praesentium earum sapiente ipsum.</p>


                  <div class="social">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                  </div>
                </div>

            </div><!-- end cta-->
          </div>

        </div>

 <footer>&copy; 2021</footer>
  </div><!--end wrappper-->

</template>

<style scoped>

</style>

<script>
import { defineComponent } from "vue"
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue'

export default defineComponent({
  components: {
    Head,
    Link,
        JetApplicationMark,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  }
})
</script>

<style scoped>
.wrapper {
  width: 100%;
  height: 100vh;
  margin: 0px auto;
  max-width: 1900px;
}

.wrapperContainer {
  width: 96%;
  margin: 0 auto;
  height: 100%;
  display: grid;
  grid-template-columns: 100%;
  grid-template-rows: 50% 50%;

}


.logo {
  text-align: center;
  padding-top: 10px;
  width:90% ;
  margin: 0 auto;
}

.fondo {
  background-image: url('https://images.unsplash.com/photo-1558603668-6570496b66f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80');
  background-size:100% 100%;
  height: 100%;
  background-repeat: no-repeat;
}

.cta {
  width: 96%;
  height: 100%;
  margin: 0 auto;
  text-align: center;
}

.nav {
  width: 100%;
  display: flex;
   height: 15%;
   align-items: center;
  justify-content: flex-end;
}

.nav > div {
  width: 80%;
}

#cta  {
  height: 90%;

}

#cta h1 {
  color: #002eac;
  width: 85%;
  margin: 0 auto;
  padding-bottom: 20px;
}

#cta p {
  line-height: 30px;
}

.social {
  width: 100%;
  display: grid;
  grid-template-columns: auto auto auto;
  justify-content: space-evenly;
}

.social i {
  color: #002eac;
  font-size: 26px;
}

footer {
  width: 100%;
  text-align: center;
}

@media screen and (min-width: 1200px) {
  .wrapperContainer {
  width: 96%;
  margin: 0 auto;
  height: 98%;
  display: grid;
  grid-template-columns: 60% 40%;
  grid-template-rows: 100%;

}

.logo {
 text-align: start;
 padding-top: 30px;
}

.fondo {
  background-size: 100% 96%;
  background-postion: center;
}

.cta {
  width: 100%; 
  overflow: hidden;
}


#cta {
  width: 80%;
  margin: 0 auto;
}

.cta h1 {
  padding-top: 100px;
  padding-bottom: 80px;
}

.cta p {
  padding-bottom: 300px;
}

.social {
  width: 80%;
  margin: 0 auto;
}
 
}
</style>
