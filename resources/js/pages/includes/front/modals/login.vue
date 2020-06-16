<template>
  <div>
      <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="mx-auto h-full justify-center items-center pointer-events-auto">
               <form role="form" @submit.prevent="login()" >
                   <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-4">
                       <div class="fill-current w-24">
                           <img :src="organisationLoadLogo()" class="card-img-top" alt="..." />
                       </div>
                       <h1 class="text-center text-white text-3xl my-0">Late Night Dentist</h1>
                       <h6 class="text-blue-300">Enter Your Credentials Below</h6>
                        <alert-error :form="loginform" message="There were some problems with your input."></alert-error>
                        <alert-success :form="loginform" message="Welcome, You've logged-in Successfully!"></alert-success>
                        <div class="relative">
                                   <label for="email" class="uppercase text-blue-500 text-sx font-bold absolute pl-1 ">E-mail </label>
                                   <input v-model="loginform.email" id="email" type="email"
                                          class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                          placeholder="your@email.com" name="email" :class="{ 'is-invalid': loginform.errors.has('email') }"
                                            autofocus >
                                    <has-error :form="loginform" field="email" ></has-error>
                        </div>
                        <div class="relative pt-2">
                                   <label for="password" class="uppercase text-blue-500 text-sx font-bold absolute pl-1 "> Password</label>
                                   <input  ref="password" v-model="loginform.password" type="password" id="password"
                                            class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                            placeholder="password" :class="{ 'is-invalid': loginform.errors.has('password') }"
                                             autofocus>
                                   <has-error :form="loginform" field="password"></has-error>
                        </div>
                        <div class="relative pt-1">
                                    <input v-model="loginform.remember" true-value="1" false-value="0" type="checkbox" @change="checkbox($event)">
                                    <label for="remember" class=" text-blue-500 text-sx font-bold absolute pl-1 "> Remember</label>
                        </div>
                        <div class="relative pt-1">
                            <button type="submit" class="w-full btn-success py-2 px-3 uppercase rounded text-blue-800 font-bold" :disabled="loading">
                                <div class="lds-ring-container" v-if="loading">
                                    <div class="lds-ring">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                Login
                            </button>
                        </div>
                        <div class="flex justify-between pt-2  text-white">
                            <button class="btn btn-sm btn-outline-danger my-2 my-sm-0" @click.prevent.prevent="emailresetLinkModal()" >Forgot Your Password?</button>
                            <button class="btn btn-sm btn-outline-success my-2 my-sm-0" @click.prevent.prevent="emailresetLinkModal()" >Join Us</button>
                        </div>
                   </div>
               </form>
            </div>
          </div>
        </div>
        <!-- EmailResetLinkModal -->
        <EmailResetLinkModal/>
  </div>
</template>

<script>
import EmailResetLinkModal from './emailresetLink';
export default {
    name:'loginmodal',
    components:{
        EmailResetLinkModal,
         },
         data(){
            return{
                loading: false,
                loginform: new Form({
                        email:'',
                        password:'',
                        remember:false,
                }),
            };
        },
        mounted() {
        },
        computed:{
            
        },
        methods:{
            organisationLoadLogo(logo) {
                // if (logo) {
                    //     return "/assets/organisation/img/logo/" + logo;
                    //   } else {
                    return "/assets/organisation/img/website/teif-logo.svg";
                // }
            },
            RoleCheck(roleName){
                let Roles = this.$store.getters.UserRoles;
                 if (Array.isArray(roleName) == true) {
                   return roleName.some(ele => Roles.includes(ele));
                 } else {
                    return Roles.indexOf(roleName) !== -1;
                 }
            },
            login(){
                this.loading = true
                this.$store.dispatch('login', this.loginform)
                    .then((response)=>{
                        this.loading = false;
                         $('#LoginModal').modal('hide')
                        //  if househel exist in cart, addedto cart  after lloged in
                        this.$store.dispatch('getUser')
                            .then((response)=>{
                                //Superadmin Reearch Team
                                if(this.RoleCheck(['Superadmin'])){
                                    window.location.replace('/superadmin/dashboard')
                                }
                                if(this.RoleCheck(['Admin'])){
                                    window.location.replace('/admin/dashboard')
                                }
                                //industrial/Domestic Client
                                if(this.RoleCheck('Client')){
                                    window.location.replace('/client/dashboard')
                                }
                            })
                            .catch((response)=>{
                            })
                    })
                     .catch((error)=>{
                        this.loading = false
                        console.log(error, 'error')
                    })
            },
            emailresetLinkModal(){
                $('#LoginModal').modal('hide')
                $('#EmailResetLinkModal').modal('show')
            },
        }
}
</script>

<style>

</style>
