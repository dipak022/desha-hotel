<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <!--
                <form @submit.prevent="customerInsert" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputText1"  placeholder="Enter Name" v-model="form.name">
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3">Email Address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3"  placeholder="Enter Email" v-model="form.email">
                        <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3">Phone</label>
                        <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Enter Phone" v-model="form.phone">
                        <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="exampleInputphone">Address </label>
                        <input type="text" class="form-control" id="exampleInputphone" placeholder="Enter Address" v-model="form.address">
                        <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputNumber1">NID Number</label>
                        <input type="number" class="form-control" id="exampleInputNumber1" placeholder="Enter NID Number" v-model="form.nid">
                        <small class="text-danger" v-if="errors.nid">{{ errors.nid[0] }}</small>   
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-level-group">
                                <label class="form-label" for="exampleInputdate">Choice Image </label>   
                                <input type="file" class="form-control" id="patho" @change="onFileSelect">
                                <small class="text-danger" v-if="errors.patho">{{ errors.patho[0] }}</small>
                                </div>
                            </div>  
                            <div class="col-md-6" style="text-align:center; ">
                                <div class="form-level-group">
                                <label class="form-label" for="exampleInputdate">Choice Image Here</label>  
                                
                                <img :src="form.patho" style="height : 50px; width : 50px; ">
                            
                                </div>
                            </div>   
                        </div>               
                    </div>                         
                    
            </form>
            -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>




    <div class="conatiner-fluid content-inner mt-n5 py-0">

       
        
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Add New Reservation</h4>
                            </div>
                            <div class="card-action">
                                
                                 
                               <router-link  class="btn btn-info"  to="/rallreservation" >
                                    <i class="fa fa-plus"></i>All Reservation
                              </router-link>

                               <!-- Button trigger modal -->
                                <a type="button" class="btn btn-info" to="/" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Create Customer
                                </a>
                                

                                   
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="calendar1" class="calendar-s">

                                        <form @submit.prevent="customerInsert" enctype="multipart/form-data">

                                         <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputEmail3">Check In Date</label>
                                                            <input type="date" class="form-control" id="exampleInputEmail3"  v-model="form.check_in_date">
                                                            <small class="text-danger" v-if="errors.check_in_date">{{ errors.check_in_date[0] }}</small>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                         <label class="form-label" for="exampleInputEmail3">Check In Time</label>
                                                            <select class="form-control" v-model="form.room_quantity">
                                                                <option selected  disabled>Select Check In Time</option>
                                                                <option value="1"  >11:00</option>
                                                                <option value="1"  >16:00</option>
                                                                <option value="1"  >20:00</option>
                                                            </select> 
                                                            <small class="text-danger" v-if="errors.check_in">{{ errors.check_in[0] }}</small>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label class="form-label" for="exampleInputEmail3">Check Out Date</label>
                                                             <input type="date" class="form-control" id="exampleInputEmail3"  v-model="form.check_out_date">
                                                             <small class="text-danger" v-if="errors.check_out_date">{{ errors.check_out_date[0] }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                         <label class="form-label" for="exampleInputEmail3">Check Out Time</label>
                                                            <select class="form-control" v-model="form.room_quantity">
                                                                <option selected  disabled>Select Check Out Time</option>
                                                                <option value="1"  >11:00</option>
                                                                <option value="1"  >16:00</option>
                                                                <option value="1"  >20:00</option>
                                                            </select> 
                                                            <small class="text-danger" v-if="errors.check_in">{{ errors.check_in[0] }}</small>
                                                        </div>
                                                    </div> 




                                                </div>   
                                            </div>


                                            
                                                <div class="row">
                                                      
                                                
                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                           <label class="form-label" for="exampleInputText1">Select Customer Name</label>
                                                            <select class="form-control" v-model="form.customerid">
                                                                <option selected  disabled>Select Customer Name</option>
                                                                <option :value="customer.id" v-for="customer in customers" >{{ customer.name }}</option>  
                                                            </select> 
                                                            <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                                                        </div>  
                                                    </div> 
                                                    
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Category Rome</label>
                                                                <select class="form-control" v-model="selectedClass">
                                                                    <option selected  disabled>Select Category Rome</option>
                                                                     <option :value="item.id" v-for="item in roomcategories" :key="item.id" >{{ item.name }}
                                                                    
                                                                     </option>
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.room_categ_id">{{ errors.room_categ_id[0] }}</small>
                                                        </div>
                                                    </div>

                                                   

                                                    

                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Rome Number</label>
                                                                <select class="form-control" v-model="room_cag_id">
                                                                    <option selected  disabled>Select Rome Number</option>
                                                                    <option :value="room.id" v-for="room in rooms" >{{ room.number }}</option> 
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.roomid">{{ errors.roomid[0] }}</small>
                                                        </div>
                                                    </div> 
                                                     
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Floor</label>
                                                                <select class="form-control" v-model="room_floor_id">
                                                                    <option selected  disabled>Select Floor</option>
                                                                    <option :value="floor.id" v-for="floor in floors" >{{ floor.floor_number }} Floor</option>
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.room_floor_id">{{ errors.room_floor_id[0] }}</small>
                                                        </div>
                                                    </div>

                                                   
                                                   

                                                </div>  


                                                <div class="form-group">
                                                <div class="row">
                                                 <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Price</label>
                                                                <select class="form-control" v-model="price">
                                                                    <option selected  disabled>Select Floor</option>
                                                                    <option :value="floor.id" v-for="floor in prices" >{{ floor.room_price }} TK</option>
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.room_floor_id">{{ errors.room_floor_id[0] }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                          <div class="form-group">
                                                            <label class="form-label" for="exampleInputEmail3"> Amount </label>
                                                            <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Total Amount" v-model="form.amount">
                                                            <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                                                        </div>
                                                    </div>  

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" for="exampleInputEmail3">Total  </label>
                                                            <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Total Guest" v-model="form.total">
                                                            <small class="text-danger" v-if="errors.total">{{ errors.total[0] }}</small>
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1"> Number Of Adult</label>
                                                            <input type="text" class="form-control" id="exampleInputText1"  placeholder=" number of adult" v-model="form.number_of_adult">
                                                            <small class="text-danger" v-if="errors.number_of_adult">{{ errors.number_of_adult[0] }}</small>
                                                        </div>
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
    created(){
       if(! User.loggedIn()){
          this.$router.push({ name : '/'});
       }
    },
    data(){
        return {
            form:{
                customerid: null,
                roomid : null,
                room_categ_id :null,
                check_in_date : null,
                check_out_date : null,
                room_quantity : null,
                room_description : null,
                amount: null,
                total: null,
                due:null,
                


                
               
            },
            errors:{},
            customers:{},
            rooms:{},
            floors:{},
            prices:{},
            roomcategories:{},
            selectedClass : '',
            room_cag_id:'',
            room_floor_id:'',
            price:'',
            selectedPrice:'',

        }

    },
    mounted(){
             axios.get('/api/customer/')
             .then(({data})=>(this.customers = data))

            
             

             axios.get('/api/roomcategory')
            .then(({data})=>(this.roomcategories = data))

             

    },
     watch : {
        selectedClass : function(value){
            axios.get('/api/subroom?room_id=' + this.selectedClass)
             .then((
                {data})=>(this.rooms = data) && (this.prices = data)
                
             )
             
        },
        room_cag_id : function(value){
            axios.get('/api/subfloor?floor_id=' + this.room_cag_id)
             .then(({data})=>(this.floors = data))
        },
        room_floor_id : function(value){
            axios.get('/api/price?price_id=' + this.room_floor_id)
             .then(({data})=>(this.prices = data))
        }
        
    },
    methods:{
        customerInsert(){

            
            var data ={room_cag_id:this.room_cag_id,  selectedClass:this.selectedClass}
            axios.post('/api/reservation/',data)
            .then(()=>{
                  Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                     })
                })
            .catch(error => this.errors = error.response.data.errors)

        },
      

    }
    
}
</script>

<style>

</style>

