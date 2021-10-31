<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
      <div class="conatiner-fluid content-inner mt-n5 py-0">
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Add New Room Category Image</h4>
                            </div>
                            <div class="card-action">
                                
                                 <router-link  class="btn btn-info"  to="/room-category-image" >
                                    <i class="fa fa-plus"></i>All Category Image 
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

                                        <form @submit.prevent="roomCategoryImageInsert" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Select Category</label>
                                                
                                                <select class="form-control" v-model="form.room_category_id">
                                                    <option selected  disabled>Select Category Rome</option>
                                                    <option :value="roomcategorie.id" v-for="roomcategorie in roomcategories" >{{ roomcategorie.name }}</option>
                                                    
                                                </select> 
                                                <small class="text-danger" v-if="errors.room_category_id">{{ errors.room_category_id[0] }}</small>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-level-group">
                                                        <label class="form-label" for="exampleInputdate">Choice Image </label>   
                                                        <input type="file" class="form-control" id="room_category_image" @change="onFileSelect">
                                                        <small class="text-danger" v-if="errors.room_category_image">{{ errors.room_category_image[0] }}</small>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-level-group">
                                                        <label class="form-label" for="exampleInputdate">Choice Image Here</label>
                                                        <br>  
                                                        <img :src="form.room_category_image" style="height : 50px; width : 50px; ">
                                                    
                                                        </div>
                                                    </div>   
                                                </div>   
                                                
                                                
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
                room_category_id : null,
                room_category_image : null,
                
            },
            errors:{},
            roomcategories:{},
            

        }

    },
    created(){
             axios.get('/api/room-category/')
             .then(({data})=>(this.roomcategories = data))

             

    },
    methods:{
       
        roomCategoryImageInsert(){

            axios.post('/api/room-category-image/',this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Room Category Image added successfully'
                })
                this.$router.push({ name : 'room-category'})
            })
            .catch(error => this.errors = error.response.data.errors)

        },
        onFileSelect(event){
            let file= event.target.files[0];
            //console.log(file);
            if(file.size > 1045770){

             Toast.fire({
                    icon: 'warning',
                    title: 'Image Less then 1 mb. '
                })

            }else{
               let reader = new FileReader();
               reader.onload = event =>{
                   this.form.room_category_image = event.target.result
               }
               
              reader.readAsDataURL(file);
            }
              

        }
        

    }
    
}
</script>

<style>

</style>

