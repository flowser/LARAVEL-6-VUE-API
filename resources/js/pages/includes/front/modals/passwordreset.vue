<template>
  <div>
      <!-- //ResetPasswordModal -->
                <div class="modal fade " id="ResetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="ResetPasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document" >
                        <div class="mx-auto h-full justify-center items-center pointer-events-auto">
                            <form role="form" @submit.prevent="resetPassord()" >
                                <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-4">
                                    <div class="fill-current w-24">
                                        <img :src="organisationLoadLogo()" class="card-img-top" alt="..." />
                                    </div>
                                    <h5 class="text-center text-white text-3xl my-0" >Password Reset</h5>
                                    <h6 class="text-blue-300">Enter Your New Password Below</h6>
                                    <alert-success :form="resetpasswordform" message="Welcome, You've logged-in Successfully!"></alert-success>
                                    <div class="relative">
                                        <label for="email" class="uppercase text-blue-500 text-sx font-bold absolute pl-1">E-mail </label>
                                        <input v-model="resetpasswordform.email" type="email" name="email" placeholder="Email Address"
                                            class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                            :class="{ 'is-invalid': resetpasswordform.errors.has('email') }" >
                                        <has-error :form="resetpasswordform" field="email"></has-error>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="relative pt-1 col-md-6 col-sm-6 col-xs-6">
                                            <label for="phone" class="uppercase text-blue-500 text-sx font-bold absolute pl-1"> Password</label>
                                            <input  ref="password" v-model="resetpasswordform.password" type="password" id="password" placeholder="Password"
                                                class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                                 :class="{ 'is-invalid': resetpasswordform.errors.has('password') }">
                                            <has-error :form="resetpasswordform" field="password"></has-error>
                                        </div>
                                        <div class="relative pt-1 col-md-6 col-sm-6 col-xs-6">
                                            <label for="c_password" class="uppercase text-blue-500 text-sx font-bold absolute pl-1"> Password Confirmation</label>
                                            <input  ref="c_password" v-model="resetpasswordform.c_password" type="password" id="c_password" placeholder="c_password"
                                                class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                                 :class="{ 'is-invalid': resetpasswordform.errors.has('c_password') }">
                                            <has-error :form="resetpasswordform" field="c_password"></has-error>
                                        </div>
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
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
  </div>
</template>

<script>
export default {
    name:'passwordresetModal',
    data(){
            return{
                loading: false,
                resetpasswordform: new Form({
                        email:'',
                        password:'',
                        c_password:'',
                        token:'',
                }),
            };
        },
        mounted(){
            this.resetPasswordModal();
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
            resetPasswordModal(){
                let params = new URL(window.location.href).searchParams;
                var url = window.location.pathname;
                var token = url.substr(url.lastIndexOf('/') + 1);
                let email = params.get('email');
                if(email){
                    axios.get('/api/password/reset/'+token)
                     .then((response)=>{
                       console.log(response)
                       this.resetpasswordform.token = token;
                       this.resetpasswordform.email = email;
                        $('#EmailResetLinkModal').modal('hide')
                        $('#ResetPasswordModal').modal('show')
                    })
                    .catch((response)=>{
                         console.log(response)
                         $('#EmailResetLinkModal').modal('show')
                    })
                }
            },
            resetPassord(){
                this.resetpasswordform.post('/api/password/reset')
                .then((response)=>{
                    console.log(response, 'user')
                    window.location.replace('/')
                     $('#ResetPasswordModal').modal('hide')
                })
                .catch((response)=>{
                    console.log(response, 'error user')
                })
            },
        }
}
</script>

<style>

</style>
