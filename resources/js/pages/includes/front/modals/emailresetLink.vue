<template>
  <div>
            <!-- //email reset -->
                <div class="modal fade " id="EmailResetLinkModal" tabindex="-1" role="dialog" aria-labelledby="EmailResetLinkModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document" >
                        <div class="mx-auto h-full justify-center items-center pointer-events-auto">
                            <form role="form" @submit.prevent="sendemailresetLink()" >
                                <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-4">
                                    <div class="fill-current w-24">
                                        <img :src="organisationLoadLogo()" class="card-img-top" alt="..." />
                                    </div>
                                    <h5 class="text-center text-white text-3xl my-0">Password Reset</h5>
                                    <alert-error :form="emaillinkform" message="There were some problems with your input."></alert-error>
                                    <div class="relative">
                                        <label for="email" class=" uppercase text-blue-500 text-sx font-bold absolute pl-1">E-mail </label>
                                        <input v-model="emaillinkform.email" type="email"
                                            class="form-control h-16 pt-8 w-full rounded pl-1 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700"
                                            placeholder="your@email.com" name="email"  :class="{ 'is-invalid': emaillinkform.errors.has('email') }" >
                                        <has-error :form="emaillinkform" field="email"></has-error>
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
    name:'emailresetLinkmodal',
    data(){
            return{
                loading: false,
                emaillinkform: new Form({
                        email:'',
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
            sendemailresetLink(){
                this.loading = true
                console.log(this.emaillinkform, 'nowsending email')
                    this.emaillinkform.post('/api/login/password/resetlink')
                   .then((response)=>{
                       this.loading = false;
                        $('#EmailResetLinkModal').modal('hide')
                })
                .catch((response)=>{
                    this.loading = false;
                    $('#EmailResetLinkModal').modal('show')
                })
            },
        }


}
</script>

<style>

</style>
