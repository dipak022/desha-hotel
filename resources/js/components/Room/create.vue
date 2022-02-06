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
                <h4 class="mb-0">Add New Room</h4>
              </div>
              <div class="card-action">
                <router-link class="btn btn-info" to="/room">
                  <i class="fa fa-plus"></i>All Room
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
                          >Select Room Category</label
                        >

                        <select class="form-control" v-model="form.room_cat_id">
                          <option selected disabled>
                            Select Rome Category
                          </option>
                          <option
                            :value="roomcategorie.id"
                            v-for="roomcategorie in roomcategories"
                          >
                            {{ roomcategorie.name }}
                          </option>
                        </select>
                        <small class="text-danger" v-if="errors.room_cat_id">{{
                          errors.room_cat_id[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Rome price</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="room price"
                          v-model="form.room_price"
                        />
                        <small class="text-danger" v-if="errors.room_price">{{
                          errors.room_price[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Floor Number</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="Floor Number"
                          v-model="form.floor"
                        />
                        <small class="text-danger" v-if="errors.floor">{{
                          errors.floor[0]
                        }}</small>
                      </div>

                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Rome Description</label
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
                        <label class="form-label" for="exampleInputEmail3"
                          >Date</label
                        >
                        <input
                          type="date"
                          class="form-control"
                          id="exampleInputEmail3"
                          v-model="form.available_date"
                        />
                        <small
                          class="text-danger"
                          v-if="errors.available_date"
                          >{{ errors.available_date[0] }}</small
                        >
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Rome Number</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Rome Number"
                          v-model="form.number"
                        />
                        <small class="text-danger" v-if="errors.number">{{
                          errors.number[0]
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
        description: null,
        available_date: null,
        number: null,
        floor_id: null,
        room_cat_id: null,
        room_price: null,
        floor: null,
      },
      errors: {},
      floors: {},
      roomcategories: {},
    };
  },
  created() {
    axios
      .get("/api/room-category/")
      .then(({ data }) => (this.roomcategories = data));
  },
  methods: {
    customerInsert() {
      axios
        .post("/api/room/", this.form)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Room Added successfully",
          });
          this.$router.push({ name: "room" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style></style>
