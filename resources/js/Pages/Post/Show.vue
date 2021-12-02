<template>

<pre style="max-width: 800px;">
	  <div v-if="$page.props.flash.message">{{$page.props.flash.message}}</div>
		{{post}}
		{{$page.props.auth.user.role}}
</pre>
<img src="https://i.pinimg.com/originals/d5/e1/bf/d5e1bf9c7156e464f5e656b93cd5c632.jpg" alt="">


</template>


<script>
import { defineComponent } from "vue"

export default defineComponent({
	props:['post'],
	data() {
		return {

		}
	}
});

</script>