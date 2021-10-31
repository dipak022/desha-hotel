<template>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br><br><br>
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
                                            

                                            <div class="form-group">
                                                <div class="row">
                                                      
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <div class="form-group">
                                                           <label class="form-label" for="exampleInputText1">Select Customer Name</label>
                                                            <select class="form-control" v-model="form.customerid">
                                                                <option selected  disabled>Select Customer Name</option>
                                                                <option :value="customer.id" v-for="customer in customers" >{{ customer.name }}</option>  
                                                            </select> 
                                                            <small class="text-danger" v-if="errors.customer_id">{{ errors.customer_id[0] }}</small>
                                                        </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Category Rome</label>
                                                                <select class="form-control" v-model="form.room_categ_id">
                                                                    <option selected  disabled>Select Category Rome</option>
                                                                    <option :value="roomcategorie.id" v-for="roomcategorie in roomcategories" >{{ roomcategorie.name }}</option>
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.room_categ_id">{{ errors.room_categ_id[0] }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Rome Number</label>
                                                                <select class="form-control" v-model="form.roomid">
                                                                    <option selected  disabled>Select Rome Number</option>
                                                                    <option :value="room.id" v-for="room in rooms" >{{ room.number }}</option> 
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.roomid">{{ errors.roomid[0] }}</small>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-3">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Select Floor</label>
                                                                <select class="form-control" v-model="form.room_floor_id">
                                                                    <option selected  disabled>Select Floor</option>
                                                                    <option :value="floor.id" v-for="floor in floors" >{{ floor.floor_name }}</option>
                                                                </select> 
                                                            <small class="text-danger" v-if="errors.room_floor_id">{{ errors.room_floor_id[0] }}</small>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                         

                                             

                                          
                                            
                                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                         <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1"> Room Description</label>
                                                            <input type="text" class="form-control" id="exampleInputText1"  placeholder="Room Description" v-model="form.room_description">
                                                            <small class="text-danger" v-if="errors.room_description">{{ errors.room_description[0] }}</small>
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
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
                                         


                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputText1">Select room quantity </label>
                                                
                                                <select class="form-control" v-model="form.room_quantity">
                                                    <option selected  disabled>Select Quantity</option>
                                                    <option value="1"  >1 </option>
                                                    <option value="2"  >2 </option>
                                                    <option value="3"  >3 </option>
                                                    <option value="4"  >4 </option>
                                                    <option value="5"  >5 </option>
                                                    <option value="6"  >6 </option>
                                                    <option value="7"  >7 </option>
                                                    <option value="8"  >8 </option>
                                                    <option value="9"  >9 </option>
                                                    <option value="10"  >10 </option>
                                                    <option value="11"  >11</option>
                                                   
                                                    
                                                    
                                                </select> 
                                                <small class="text-danger" v-if="errors.room_quantity">{{ errors.room_quantity[0] }}</small>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3"> Amount </label>
                                                <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Total Amount" v-model="form.amount">
                                                <small class="text-danger" v-if="errors.amount">{{ errors.amount[0] }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Total  </label>
                                                <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Total Guest" v-model="form.total">
                                                <small class="text-danger" v-if="errors.total">{{ errors.total[0] }}</small>
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
                customerid: null,
                roomid : null,
                room_categ_id :null,
                room_floor_id: null,
                check_in_date : null,
                check_out_date : null,
                room_quantity : null,
                room_description : null,
                amount: null,
                total: null,
                due:null


                
               
            },
            errors:{},
            customers:{},
            rooms:{},
            floors:{},
            roomcategories:{},
        }

    },
    created(){
             axios.get('/api/customer/')
             .then(({data})=>(this.customers = data))

             axios.get('/api/room/')
             .then(({data})=>(this.rooms = data))
             axios.get('/api/floor/')
             .then(({data})=>(this.floors = data))

             axios.get('/api/room-category/')
             .then(({data})=>(this.roomcategories = data))

             

    },
    methods:{
        customerInsert(){

            axios.post('/api/reservation/',this.form)
            .then(()=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Reservation Added successfully'
                })
                this.$router.push({ name : 'reservation'})
            })
            .catch(error => this.errors = error.response.data.errors)

        },
      

    }
    
}
</script>

<style>

</style>

