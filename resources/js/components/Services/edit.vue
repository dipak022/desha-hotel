<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
      <div class="conatiner-fluid content-inner mt-n5 py-0">
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0"> Company Update</h4>
                            </div>
                            <div class="card-action">
                                
                                 <router-link  class="btn btn-info"  to="/company" >
                                    <i class="fa fa-plus"></i>All Company
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

                                        <form @submit.prevent="CompanyUpdate" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputText1"  placeholder="Company Name" v-model="form.company_name">
                                                <small class="text-danger" v-if="errors.company_name">{{ errors.company_name[0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Company Address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3"  placeholder="Company Address" v-model="form.company_address">
                                                <small class="text-danger" v-if="errors.company_address">{{ errors.company_address[0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Company Website</label>
                                                <input type="text" class="form-control" id="exampleInputEmail3"  placeholder="Company Website" v-model="form.company_website">
                                                <small class="text-danger" v-if="errors.company_website">{{ errors.company_website[0] }}</small>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Company Contact Number </label>
                                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Company Contact Number" v-model="form.company_contact_number">
                                                <small class="text-danger" v-if="errors.company_contact_number">{{ errors.company_contact_number[0] }}</small>
                                            </div>
                                             <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Company Email </label>
                                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Company Email" v-model="form.company_email">
                                                <small class="text-danger" v-if="errors.company_email">{{ errors.company_email[0] }}</small>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Company Contact Personal Name </label>
                                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Company Contact Personal Name" v-model="form.company_contact_personal_name">
                                                <small class="text-danger" v-if="errors.company_contact_personal_name">{{ errors.company_contact_personal_name[0] }}</small>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Company Contact Personal Number </label>
                                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Company Contact Personal Number" v-model="form.company_contact_personal_ph_no">
                                                <small class="text-danger" v-if="errors.company_contact_personal_ph_no">{{ errors.company_contact_personal_ph_no[0] }}</small>
                                            </div>

                                             <div class="form-group">
                                                <label class="form-label" for="exampleInputphone">Company Contact Personal Email </label>
                                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Company Contact Personal Email" v-model="form.company_contact_personal_email">
                                                <small class="text-danger" v-if="errors.company_contact_personal_email">{{ errors.company_contact_personal_email[0] }}</small>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputNumber1">Company Contact Personal NID Number</label>
                                                <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Company Contact Personal NID Number" v-model="form.company_contact_personal_nid">
                                                <small class="text-danger" v-if="errors.company_contact_personal_nid">{{ errors.company_contact_personal_nid[0] }}</small>
                                                
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            
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
                    company_name: null,
                    company_address:null,
                    company_website : null,
                    company_contact_number : null,
                    company_email : null,
                    company_contact_personal_name : null,
                    company_contact_personal_ph_no : null,
                    company_contact_personal_email : null,
                    company_contact_personal_nid : null,
               
            },
            errors:{},
           
        }

    },
    created(){
        let id = this.$route.params.id
         axios.get('/api/company/'+id)
         .then(({data}) => (this.form = data))
         .catch()
        

    },
    methods:{
        CompanyUpdate(){

            let id = this.$route.params.id
            axios.patch('/api/company/'+id,this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Update  in successfully'
                })
                this.$router.push({ name : 'company'})
            })
            .catch(error => this.errors = error.response.data.errors)

        },
     

    }
    
}
</script>

<style>

</style>

