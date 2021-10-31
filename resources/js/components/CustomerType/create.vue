<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
      <div class="conatiner-fluid content-inner mt-n5 py-0">
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Add New Customer Type</h4>
                            </div>
                            <div class="card-action">
                                
                                 <router-link  class="btn btn-info"  to="/customer-type" >
                                    <i class="fa fa-plus"></i> Customer Type
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
                                        <form @submit.prevent="customertypeInsert" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Customer Type</label>
                                                <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Room Name" v-model="form.cus_type">
                                                <small class="text-danger" v-if="errors.cus_type">{{ errors.cus_type[0] }}</small>
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
    created(){
       if(! User.loggedIn()){
          this.$router.push({ name : '/'});
       }
    },
    data(){
        return {
            form:{
               cus_type: null,
               
            },
            errors:{}
        }

    },
    methods:{
        customertypeInsert(){

            axios.post('/api/customer-type/',this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Customer Type save successfully'
                })
                //this.$router.push({ name : 'customer'})
            })
            .catch(error => this.errors = error.response.data.errors)

        },
      

    }
    
}
</script>

<style>

</style>

