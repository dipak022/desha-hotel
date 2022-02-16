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
                <h4 class="mb-0">Add New Hall Service</h4>
              </div>
              <div class="card-action">
                <router-link class="btn btn-info" to="/allhallservices">
                  <i class="fa fa-plus"></i>All Hall Service
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
                      @submit.prevent="HallServiceInsert"
                      enctype="multipart/form-data"
                    >
                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Select Category</label
                        >

                        <select class="form-control" v-model="form.category_id">
                          <option selected disabled>Select category</option>
                          <option
                            :value="category.id"
                            v-for="category in categorys"
                          >
                            {{ category.category_name }}
                          </option>
                        </select>
                        <small class="text-danger" v-if="errors.category_id">{{
                          errors.category_id[0]
                        }}</small>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputText1"
                          >Hall Service Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputText1"
                          placeholder="Enter Hall Service Name"
                          v-model="form.services_name"
                        />
                        <small
                          class="text-danger"
                          v-if="errors.services_name"
                          >{{ errors.services_name[0] }}</small
                        >
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Hall Service Code</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Enter Hall Service code"
                          v-model="form.services_code"
                        />
                        <small
                          class="text-danger"
                          v-if="errors.services_code"
                          >{{ errors.services_code[0] }}</small
                        >
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Hall Service Price</label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Enter Service Price"
                          v-model="form.selling_price"
                        />
                        <small
                          class="text-danger"
                          v-if="errors.selling_price"
                          >{{ errors.selling_price[0] }}</small
                        >
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-level-group">
                              <label class="form-label" for="exampleInputdate"
                                >Choice Image
                              </label>
                              <input
                                type="file"
                                class="form-control"
                                id="patho"
                                @change="onFileSelect"
                              />
                              <small class="text-danger" v-if="errors.patho">{{
                                errors.patho[0]
                              }}</small>
                            </div>
                          </div>
                          <div class="col-md-6" style="text-align: center">
                            <div class="form-level-group">
                              <label class="form-label" for="exampleInputdate"
                                >Choice Image Here</label
                              >

                              <img
                                :src="form.patho"
                                style="height: 50px; width: 50px"
                              />
                            </div>
                          </div>
                        </div>
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
        category_id: null,
        services_name: null,
        services_code: null,
        selling_price: null,
        patho: null,
      },
      errors: {},
      categorys: {},
    };
  },
  created() {
    axios.get("/api/category/").then(({ data }) => (this.categorys = data));
  },
  methods: {
    HallServiceInsert() {
      axios
        .post("/api/hallservice/", this.form)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "Hall Service Added successfully",
          });
          this.$router.push({ name: "allhallservices" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
    onFileSelect(event) {
      let file = event.target.files[0];
      //console.log(file);
      if (file.size > 1045770) {
        Toast.fire({
          icon: "warning",
          title: "Image Less then 1 mb. ",
        });
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.patho = event.target.result;
        };

        reader.readAsDataURL(file);
      }
    },
  },
};
</script>

<style></style>
