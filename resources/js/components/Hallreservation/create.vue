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
                <router-link class="btn btn-info" to="/rallreservation">
                  <i class="fa fa-plus"></i>All HallReservation
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
                      @submit.prevent="customerInsert"
                      enctype="multipart/form-data"
                    >
                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Select Customer Name</label
                        >

                        <select class="form-control" v-model="form.customer_id">
                          <option selected disabled>
                            Select Customer Name
                          </option>
                          <option
                            :value="custome.id"
                            v-for="custome in customers"
                            style="text-color: #000"
                          >
                            {{ custome.name }}
                          </option>
                        </select>
                        <small class="text-danger" v-if="errors.customer_id">{{
                          errors.customer_id[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Select Hall Type</label
                        >

                        <select class="form-control" v-model="form.hall_id">
                          <option selected disabled>
                            Select Category Rome
                          </option>
                          <option
                            :value="halltype.id"
                            v-for="halltype in halltypes"
                          >
                            {{ halltype.hall_name }}
                          </option>
                        </select>
                        <small class="text-danger" v-if="errors.hall_id">{{
                          errors.hall_id[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Description</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="Description"
                          v-model="form.description"
                        />
                        <small class="text-danger" v-if="errors.description">{{
                          errors.description[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <div class="row">
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label" for="exampleInputEmail3"
                                >Check In Date</label
                              >
                              <input
                                type="time"
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
                        </div>
                      </div>
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

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Select Reservation Time
                        </label>

                        <select
                          class="form-control"
                          v-model="form.session_day_hour_quantity"
                        >
                          <option selected disabled>Select Reservation</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                        </select>
                        <small
                          class="text-danger"
                          v-if="errors.session_day_hour_quantity"
                          >{{ errors.session_day_hour_quantity[0] }}</small
                        >
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Total Amount
                        </label>
                        <input
                          type="number"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Total Amount"
                          v-model="form.total_amount"
                        />
                        <small class="text-danger" v-if="errors.total_amount">{{
                          errors.total_amount[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Total Guest
                        </label>
                        <input
                          type="number"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Total Guest"
                          v-model="form.total_guest"
                        />
                        <small class="text-danger" v-if="errors.total_guest">{{
                          errors.total_guest[0]
                        }}</small>
                      </div>

                      <br />

                      <button type="submit" class="btn btn-primary">
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
        total_guest: null,
      },
      errors: {},
      customers: {},
      halltypes: {},
    };
  },
  created() {
    axios.get("/api/customer/").then(({ data }) => (this.customers = data));

    axios.get("/api/halltype/").then(({ data }) => (this.halltypes = data));
  },
  methods: {
    customerInsert() {
      axios
        .post("/api/hallreservation/", this.form)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Hallreservation Added successfully",
          });
          this.$router.push({ name: "hallreservation" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style></style>
