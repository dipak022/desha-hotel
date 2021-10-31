<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
      <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Add New Service</h4>
                            </div>
                            <div class="card-action">
                                
                                 <router-link  class="btn btn-info"  to="/service">
                                    <i class="fa fa-plus"></i>All Service
                                    </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card  ">
                                <div class="card-body">
                                    <div id="calendar1" class="calendar-s">

                                        <form @submit.prevent="ServiceInsert" enctype="multipart/form-data">

                                        
                                        
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Service Name</label>
                                                <input type="text" class="form-control" id="exampleInputText1"  placeholder="Service Name" v-model="form.service_name">
                                                <small class="text-danger" v-if="errors.service_name">{{ errors.service_name[0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Service unit</label>
                                                <input type="text" class="form-control prc" id="exampleInputEmail3"  placeholder="Service unit" v-model="form.service_unit">
                                                <small class="text-danger" v-if="errors.service_unit">{{ errors.service_unit[0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Service price</label>
                                                <input type="text" class="form-control prc" id="exampleInputEmail3"  placeholder="Service price" v-model="form.service_price">
                                                <small class="text-danger" v-if="errors.service_price">{{ errors.service_price[0] }}</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Service total </label>
                                                <input type="text" class="form-control" id="totalprices" placeholder="Service total" v-model="form.service_total">
                                                <small class="text-danger" v-if="errors.service_total">{{ errors.service_total[0] }}</small>
                                            </div>
                                             
                                            <br>
                                            
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        
      
</main>
</template>
<script>

export default {
    
    mounted(){
       if(! User.loggedIn()){
          this.$router.push({ name : '/'});
       }
    },
    data(){
        return {
            form:{
                service_name: null,
                service_unit:null,
                service_price : null,
                service_total : null,
                

            },
            errors:{},
            
        }

    },
    created(){
        

             

             

    },
    methods:{
        ServiceInsert(){

            axios.post('/api/service/',this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Service Added successfully'
                })
                this.$router.push({ name : 'service'})
            })
            .catch(error => this.errors = error.response.data.errors)

        },
        
    }
    
}
</script>

<style>

</style>

