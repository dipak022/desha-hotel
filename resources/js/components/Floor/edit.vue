<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
      <div class="conatiner-fluid content-inner mt-n5 py-0">
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Update  Floor</h4>
                            </div>
                            <div class="card-action">
                                
                                 <router-link  class="btn btn-info"  to="/floor" >
                                    <i class="fa fa-plus"></i> All Floor
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
                                        <form @submit.prevent="FloorUpdate" enctype="multipart/form-data">

                                           <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Select Room Category</label>
                                                
                                                <select class="form-control" v-model="form.floor_cat_id">
                                                    <option selected  disabled>Select Rome Category </option>
                                                    <option :value="roomcategorie.id" v-for="roomcategorie in roomcategories" >{{ roomcategorie.name }}</option>
                                                    
                                                </select> 
                                                <small class="text-danger" v-if="errors.room_cat_id">{{ errors.room_cat_id[0] }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Floor Number</label>
                                                <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Floor Number" v-model="form.floor_number">
                                                <small class="text-danger" v-if="errors.floor_number">{{ errors.floor_number[0] }}</small>
                                            </div>
                                            
                                           
                                          <br>
                                            
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
                floor_number: null,
                floor_cat_id:null,
            },
            errors:{},
            roomcategories:{}
        }

    },
    created(){
        let id = this.$route.params.id
         axios.get('/api/floor/'+id)
         .then(({data}) => (this.form = data))
         .catch()

         axios.get('/api/room-category/')
            .then(({data})=>(this.roomcategories = data))

    },
    methods:{
        FloorUpdate(){

            let id = this.$route.params.id
            axios.patch('/api/floor/'+id,this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Floor Update successfully'
                })
                this.$router.push({ name : 'floor'})
            })
            .catch(error => this.errors = error.response.data.errors)

        }

    }
    
}
</script>

<style>

</style>

