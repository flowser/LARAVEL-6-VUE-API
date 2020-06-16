<template>
  <div>
      <BackendHeader/>
      <BackendSidebar/>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <BackendBreadcrumb/>
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <router-view></router-view>
            </div>
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
   <BackendFooter/>

  </div>
</template>

<script>
import BackendHeader from '../pages/includes/back/header';
import BackendSidebar from '../pages/includes/back/sidebar';
import BackendFooter from '../pages/includes/back/footer';
import BackendBreadcrumb from '../pages/includes/back/breadcrumb';
export default {
    name:'BackendMasterComponent',
    components:{
        BackendHeader,
        BackendSidebar,
        BackendFooter,
        BackendBreadcrumb,
    }
}
</script>

<style>

</style>
