<template>
  <div>
      <FrontHeader/>
      <LoginModal/>
      <PasswordResetModal/>
  </div>
</template>

<script>
import FrontHeader from '../pages/includes/front/header';
import LoginModal from '../pages/includes/front/modals/login';
import PasswordResetModal from '../pages/includes/front/modals/passwordreset';
export default {
    name:'FrontendMasterComponent',
    components:{
        FrontHeader,
        LoginModal,
        PasswordResetModal,
    },
    data(){
        return{
        };
    },
    mounted() {
    },
    computed:{
    },
    methods:{
        
    }

}
</script>

<style>

</style>
