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
                <h4 class="mb-0">Update Room Category</h4>
              </div>
              <div class="card-action">
                <router-link class="btn btn-info" to="/room-category">
                  <i class="fa fa-plus"></i> Room Category
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
                      @submit.prevent="RoomcategoryUpdate"
                      enctype="multipart/form-data"
                    >
                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Room Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="Enter Room Name"
                          v-model="form.name"
                        />
                        <small class="text-danger" v-if="errors.name">{{
                          errors.name[0]
                        }}</small>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Description</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Enter Description"
                          v-model="form.description"
                        />
                        <small class="text-danger" v-if="errors.description">{{
                          errors.description[0]
                        }}</small>
                      </div>
                      <!--
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputEmail3">Price</label>
                                                <input type="number" class="form-control" id="exampleInputEmail3"  placeholder="Enter Price" v-model="form.price">
                                                <small class="text-danger" v-if="errors.price">{{ errors.price[0] }}</small>
                                            </div>
                                            -->

                      <br />

                      <button type="submit" class="btn btn-primary">
                        Update
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
        name: null,
        description: null,
        price: null,
      },
      errors: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/room-category/" + id)
      .then(({ data }) => (this.form = data))
      .catch();
  },
  methods: {
    RoomcategoryUpdate() {
      let id = this.$route.params.id;
      axios
        .patch("/api/room-category/" + id, this.form)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Room Category Update successfully",
          });
          this.$router.push({ name: "room-category" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style></style>
