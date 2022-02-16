<template>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br /><br /><br />
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div
                            class="card-body d-flex justify-content-between align-items-center"
                        >
                            <div class="card-title mb-0">
                                <h4 class="mb-0">Add New Reservation</h4>
                            </div>
                            <div class="card-action">
                                <router-link
                                    class="btn btn-info"
                                    to="/rallreservation"
                                >
                                    <i class="fa fa-plus"></i>All
                                    HallReservation
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
                            <div class="card">
                                <div class="card-body">
                                    <div id="calendar1" class="calendar-s">
                                        <form
                                            @submit.prevent="HallReservationInsert"
                                            enctype="multipart/form-data"
                                        >
                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="exampleInputText1"
                                                    >Select Customer Name</label
                                                >

                                                <select
                                                    class="form-control"
                                                    v-model="customer_id"
                                                >
                                                    <option selected disabled>
                                                        Select Customer Name
                                                    </option>
                                                    <option
                                                        :value="custome.id"
                                                        v-for="custome in customers"
                                                        :key="custome.id"
                                                        style="text-color: black"
                                                    >
                                                        {{ custome.full_name }}
                                                    </option>
                                                </select>

                                                <small
                                                    class="text-danger"
                                                    v-if="errors.customer_id"
                                                    >{{
                                                        errors.customer_id[0]
                                                    }}</small
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="exampleInputText1"
                                                    >Select Hall Type</label
                                                >

                                                <select
                                                    class="form-control"
                                                    v-model="selectedHalltype"
                                                >
                                                    <option selected disabled>
                                                        Select Category Rome
                                                    </option>

                                                    <option
                                                        :value="halltype.id"
                                                        v-for="halltype in halltypes"
                                                        :key="halltype.id"
                                                        >{{
                                                            halltype.hall_name
                                                        }}
                                                    </option>
                                                </select>
                                                <small
                                                    class="text-danger"
                                                    v-if="errors.selectedHalltype"
                                                    >{{
                                                        errors.selectedHalltype[0]
                                                    }}</small
                                                >
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <!--
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="exampleInputEmail3"
                                >Check In Date</label
                              >
                              <input
                                type="date"
                                class="form-control"
                                id="exampleInputEmail3"
                                v-model="form.check_in"
                              />
                              <small
                                class="text-danger"
                                v-if="errors.check_in"
                                >{{ errors.check_in[0] }}</small
                              >
                            </div>
                          </div>
                          -->
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label"
                                                                for="exampleInputEmail3"
                                                                >Check In
                                                                Date</label
                                                            >
                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                id="exampleInputEmail3"
                                                                v-model="
                                                                    check_in
                                                                "
                                                            />
                                                            <small
                                                                class="text-danger"
                                                                v-if="
                                                                    errors.check_in
                                                                "
                                                                >{{
                                                                    errors
                                                                        .check_in[0]
                                                                }}</small
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Check Out Date</label
                        >
                        <input
                          type="date"
                          class="form-control"
                          id="exampleInputEmail3"
                          v-model="form.check_out"
                        />
                        <small class="text-danger" v-if="errors.check_out">{{
                          errors.check_out[0]
                        }}</small>
                      </div>
                      -->

                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="exampleInputText1"
                                                    >Select Reservation Time
                                                </label>

                                                <select
                                                    class="form-control"
                                                    v-model="quantity"
                                                >
                                                    <option selected disabled
                                                        >Select
                                                        Reservation</option
                                                    >
                                                    <option :value="2"
                                                        >2 Hour</option
                                                    >
                                                    <option :value="3"
                                                        >3 Hour</option
                                                    >
                                                    <option :value="4"
                                                        >4 Hour</option
                                                    >
                                                    <option value="5"
                                                        >5 Hour</option
                                                    >
                                                    <option :value="6"
                                                        >6 Hour</option
                                                    >
                                                    <option :value="8"
                                                        >8 Hour</option
                                                    >
                                                    <option :value="9"
                                                        >1 Days</option
                                                    >
                                                    <option value="9"
                                                        >2 Days</option
                                                    >
                                                </select>
                                                <small
                                                    class="text-danger"
                                                    v-if="
                                                        errors.quantity
                                                    "
                                                    >{{
                                                        errors
                                                            .quantity[0]
                                                    }}</small
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="exampleInputEmail3"
                                                    >Total Amount
                                                </label>
                                                 <select class="form-control" v-model="amount">
                                                      <option selected  disabled>Amount</option>
                                                      <option :value="hallPrice.cost * quantity" v-for="hallPrice in hallPrices"   :key="hallPrice.id" >{{ hallPrice.cost * quantity }}</option> 
                                                  </select> 
                                                <small
                                                    class="text-danger"
                                                    v-if="errors.amount"
                                                    >{{
                                                        errors.amount[0]
                                                    }}</small
                                                >
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="exampleInputEmail3"
                                                    >Total Guest
                                                </label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="exampleInputEmail3"
                                                    placeholder="Total Guest"
                                                    v-model="total_guest"
                                                   
                                                />
                                                
                                                <small
                                                    class="text-danger"
                                                    v-if="errors.total_guest"
                                                    >{{
                                                        errors.total_guest[0]
                                                    }}</small
                                                >
                                            </div>

                                            <br />

                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Submit
                                            </button>
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
    mounted() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },
    data() {
        return {
            form: {
                customer_id: null,
                hall_id: null,
                check_in: null,
                check_out: null,
                session_day_hour_quantity: null,
                total_amount: null,
                total_guest: null
            },
            errors: {},
            customers: {},
            halltypes: {},
            selectedHalltype: "",
            hallPrices: "",
            amount : "",
            quantity : "",
            customer_id :"",
            check_in : "",

        };
    },
    created() {
        axios.get("/api/customer/").then(({ data }) => (this.customers = data));

        axios.get("/api/halltype/").then(({ data }) => (this.halltypes = data));
    },
    methods: {
        HallReservationInsert() {
          var data ={
                customer_id:this.customer_id,
                selectedHalltype:this.selectedHalltype,  check_in:this.check_in, 
                quantity:this.quantity,  amount:this.amount, total_guest:this.total_guest, 
            }
            axios
                .post("/api/hallreservation/", data)
                .then(() => {
                    Toast.fire({
                        icon: "success",
                        title: "Hallreservation Added successfully"
                    });
                    this.$router.push({ name: "hallreservation" });
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    },
    watch: {
        selectedHalltype: function(value) {
            axios
                .get("/api/halltypes?hall_id=" + this.selectedHalltype)
                .then(({ data }) => (this.hallPrices = data));
        },
        room_cag_id: function(value) {
            axios
                .get("/api/subfloor?floor_id=" + this.room_cag_id)
                .then(({ data }) => (this.floors = data));
        },
        room_floor_id: function(value) {
            axios
                .get("/api/price?price_id=" + this.room_floor_id)
                .then(({ data }) => (this.prices = data));
        },
        selectedServicesPrice: function(value) {
            axios
                .get(
                    "/api/selectedservicesprice?price_id=" +
                        this.selectedServicesPrice
                )
                .then(({ data }) => (this.getserviceprices = data));
        }
    }
};
</script>

<style></style>
