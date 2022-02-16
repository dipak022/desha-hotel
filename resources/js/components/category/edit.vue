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
                <h4 class="mb-0">Update Reservation Category</h4>
              </div>
              <div class="card-action">
                <router-link class="btn btn-info" to="/allcategory">
                  <i class="fa fa-plus"></i> All Category
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
                      @submit.prevent="CategoryUpdate"
                      enctype="multipart/form-data"
                    >
                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Category Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="Enter Room Name"
                          v-model="form.category_name"
                        />
                        <small
                          class="text-danger"
                          v-if="errors.category_name"
                          >{{ errors.category_name[0] }}</small
                        >
                      </div>

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
        category_name: null,
      },
      errors: {},
    };
  },
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/category/" + id)
      .then(({ data }) => (this.form = data))
      .catch();
  },
  methods: {
    CategoryUpdate() {
      let id = this.$route.params.id;
      axios
        .patch("/api/category/" + id, this.form)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Category Update successfully",
          });
          this.$router.push({ name: "allcategory" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>

<style></style>
