<template>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <!-- secondary nav start -->
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1 class="h2">TODAY'S ROOM STATUS</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">
            Share
          </button>
          <button type="button" class="btn btn-sm btn-outline-secondary">
            Export
          </button>
        </div>
        <button
          type="button"
          class="btn btn-sm btn-outline-secondary dropdown-toggle"
        >
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>
    <!-- secondary nav end -->

    <!-- total desha room status end -->

    <!-- floor no zero start -->
    <section>
      <h1 class="text-center text-muted my-3">
        Room Check In And Check Out Informatuins
      </h1>
      <div data-bs-toggle="modal" data-bs-target="#exampleModal">
        <div class="row my-5">
          <div class="col-md-8 col-sm-12 m-auto">
            <div class="card profile-card my-8">
              <div
                class="card-body profile-card-info"
                v-for="Getauditorium in getauditoriums"
                :key="Getauditorium.id"
                @click="GetRoom(Getauditorium.id)"
              >
                <span
                  class="my-3 profile-card-info-icon"
                  data-feather="user-x"
                ></span>
                <img src="backend/img/bed-icon.png" />
                <h5 class="card-title" v-if="Getauditorium.number">
                  Auditorium
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- floor no zero end -->

    <!-- fllor no two start -->

    <section>
      <h1 class="text-center text-muted my-3">FLOOR NO: 1</h1>

      <div class="row">
        <div
          v-for="roomone in roomOnes"
          :key="roomone.id"
          class="col-md-2 col-sm-12"
          @click="GetRoom(roomone.id)"
        >
          <div
            class="card profile-card my-2"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <div
              class="card-body profile-card-info"
              v-if="roomone.room_status == 0"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomone.number }}
              </h6>
            </div>
            <div
              class="card-body profile-card-info"
              style="background-color: #059862"
              v-if="roomone.room_status == 1"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomone.number }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- floor no two end -->

    <!-- modal start -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Room Details</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              id="closeModel"
            ></button>
          </div>
          <div class="card-body">
            <div id="calendar1" class="calendar-s">
              <div class="card-body px-0">
                <div class="table-responsive">
                  <div
                    class="container"
                    v-for="allroom in allrooms"
                    :key="allroom.id"
                  >
                    <!-- Reservation Start-->
                    <h4
                      style="text-align: center"
                      v-if="allroom.room_status == 0"
                    >
                      Room Information
                    </h4>
                    <br />

                    <ul class="list-group" v-if="allroom.room_status == 0">
                      <li class="list-group-item">
                        Room No :<span style="margin-left: 120px">{{
                          allroom.number
                        }}</span>
                      </li>

                      <li class="list-group-item">
                        Category:
                        <span style="margin-left: 125px">{{
                          allroom.name
                        }}</span>
                      </li>
                      <li class="list-group-item">
                        Details :
                        <span style="margin-left: 130px">{{
                          allroom.description
                        }}</span>
                      </li>
                      <li class="list-group-item">
                        Price :
                        <span style="margin-left: 135px">{{
                          allroom.room_price
                        }}</span>
                      </li>
                      <li
                        class="list-group-item"
                        v-if="allroom.room_status == 0"
                      >
                        Status :
                        <span style="margin-left: 135px">Available</span>
                      </li>
                      <li
                        class="list-group-item"
                        v-if="allroom.room_status > 0"
                      >
                        Status : <span style="margin-left: 135px">Booking</span>
                      </li>
                    </ul>
                    <!-- Reservation end-->
                    <!-- Booking information close-->
                    <h4 style="text-align: center" v-if="allroom.status == 0">
                      Reservation Information
                    </h4>
                    <br />
                    <ul class="list-group" v-if="allroom.status == 0">
                      <li class="list-group-item">
                        Room No :<span style="margin-left: 120px"
                          >{{ allroom.number }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        check in date :<span style="margin-left: 120px"
                          >{{ allroom.check_in_date }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        check in Time :<span style="margin-left: 120px"
                          >{{ allroom.check_in_time }}
                        </span>
                      </li>

                      <li class="list-group-item">
                        check out date :<span style="margin-left: 120px"
                          >{{ allroom.check_out_date }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        check out Time :<span style="margin-left: 120px"
                          >{{ allroom.check_out_time }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        Customer name :<span style="margin-left: 120px"
                          >{{ allroom.full_name }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        Room Price :<span style="margin-left: 120px"
                          >{{ allroom.room_price }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        Pay Amount :<span style="margin-left: 120px"
                          >{{ allroom.pay_amount }}
                        </span>
                      </li>
                      <li class="list-group-item">
                        Due Amount :<span style="margin-left: 120px"
                          >{{ allroom.due_amount }}
                        </span>
                      </li>
                    </ul>
                    <!-- Booking information close-->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- start without Booking room Button-->
          <div
            class="row"
            v-for="allroo in allrooms"
            :key="allroo.id"
            v-if="allroo.room_status == 0"
          >
            <div class="col-lg-6 col-md-6">
              <div class="card">
                <div
                  class="card-body d-flex justify-content-between align-items-center"
                >
                  <div class="card-title mb-0">
                    <h4 class="mb-0">Create Customer</h4>
                  </div>
                  <div class="card-action">
                    <a
                      class="btn btn-info"
                      @click="myCustomerFunction"
                      style="color: white"
                    >
                      Create Customer
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="card">
                <div
                  class="card-body d-flex justify-content-between align-items-center"
                >
                  <div class="card-title mb-0">
                    <h6 class="mb-0">Add New Reservation</h6>
                  </div>
                  <div class="card-action">
                    <a
                      class="btn btn-info"
                      @click="myReservationFunction"
                      id="reservationshow"
                      style="color: white"
                    >
                      New Reservation
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Without Booking romm Button-->

          <!-- start  Booking room Button-->
          <div
            class="row"
            v-for="allro in allrooms"
            :key="allro.id"
            v-if="allro.status == 0"
          >
            <div class="col-lg-4 col-md-4">
              <div class="card">
                <div
                  class="card-body d-flex justify-content-between align-items-center"
                >
                  <div class="card-title mb-0"></div>
                  <div class="card-action">
                    <a
                      class="btn btn-info"
                      @click="myServiceFunction"
                      style="color: white"
                    >
                      Add Service
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4"></div>
            <div class="col-lg-4 col-md-4">
              <div class="card">
                <div
                  class="card-body d-flex justify-content-between align-items-center"
                >
                  <div class="card-title mb-0"></div>
                  <div class="card-action">
                    <a
                      class="btn btn-info"
                      @click="myCheckOutFunction"
                      style="color: white"
                    >
                      Checkout
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End  Booking romm Button-->

          <!--Start Checkout  -->
          <div id="checkoutshow" style="display: none; padding: 5px">
            <form
              @submit.prevent="ReservationClear"
              enctype="multipart/form-data"
            >
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1"
                      >Select Rome Number</label
                    >
                    <p v-for="allroom in allrooms">
                      <select class="form-control" v-model="checkoutroomnumber">
                        <option selected disabled>Select Rome Number</option>
                        <option :value="allroom.rooms_id" style="color: black">
                          {{ allroom.number }}
                        </option>
                      </select>
                    </p>
                    <small
                      class="text-danger"
                      v-if="errors.checkoutroomnumber"
                      >{{ errors.checkoutroomnumber[0] }}</small
                    >
                  </div>
                </div>
              </div>

              <br />

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Clear</button>
              </div>
            </form>
          </div>
          <!--End Checkout  -->

          <!--Start Reservation  -->
          <div id="reservationhow" style="display: none; padding: 5px">
            <form
              @submit.prevent="ReservationInsert"
              enctype="multipart/form-data"
            >
              <div class="row">
                <div class="col-md-6 col-md-6 form-group">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputEmail3"
                      >Check In Date</label
                    >
                    <input
                      type="date"
                      class="form-control"
                      id="exampleInputEmail3"
                      v-model="check_in_date"
                    />
                    <small class="text-danger" v-if="errors.check_in_date">{{
                      errors.check_in_date[0]
                    }}</small>
                  </div>
                </div>

                <div class="col-md-6 col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputEmail3"
                      >Check In Time</label
                    >
                    <select class="form-control" v-model="check_in_time">
                      <option selected disabled>Select Check In Time</option>
                      <option value="11:00">11:00 AM</option>
                      <option value="4:00">4:00 PM</option>
                      <option value="8:00">8:00 PM</option>
                    </select>
                    <small class="text-danger" v-if="errors.check_in_time">{{
                      errors.check_in_time[0]
                    }}</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputEmail3"
                      >Check Out Date</label
                    >
                    <input
                      type="date"
                      class="form-control"
                      id="exampleInputEmail3"
                      v-model="check_out_date"
                    />
                    <small class="text-danger" v-if="errors.check_out_date">{{
                      errors.check_out_date[0]
                    }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputEmail3"
                      >Check Out Time</label
                    >
                    <select class="form-control" v-model="check_out_time">
                      <option selected disabled>Select Check Out Time</option>
                      <option value="11:00">11:00 AM</option>
                      <option value="4:00">4:00 PM</option>
                      <option value="8:00">8:00 PM</option>
                    </select>
                    <small class="text-danger" v-if="errors.check_out_time">{{
                      errors.check_out_time[0]
                    }}</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">
                      Number Of Adult</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleInputText1"
                      placeholder=" number of adult"
                      v-model="number_of_adult"
                    />
                    <small class="text-danger" v-if="errors.number_of_adult">{{
                      errors.number_of_adult[0]
                    }}</small>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1"
                      >Select Customer Name</label
                    >
                    <select class="form-control" v-model="customerid">
                      <option selected disabled>Select Customer Name</option>
                      <option
                        :value="customer.id"
                        v-for="customer in customers"
                        style="color: black"
                      >
                        {{ customer.full_name }}
                      </option>
                    </select>

                    <small class="text-danger" v-if="errors.customerid">{{
                      errors.customerid[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1"
                      >Select Category Room</label
                    >

                    <select class="form-control" v-model="selectcategoryroom">
                      <option selected disabled>Select Category Room</option>
                      <option
                        :value="allroom.room_cat_id"
                        v-for="allroom in allrooms"
                        style="color: black"
                      >
                        {{ allroom.name }}
                      </option>
                    </select>

                    <small
                      class="text-danger"
                      v-if="errors.selectcategoryroom"
                      >{{ errors.selectcategoryroom[0] }}</small
                    >
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1"
                      >Select Rome Number</label
                    >
                    <p v-for="allroom in allrooms">
                      <select class="form-control" v-model="selectroomnumber">
                        <option selected disabled>Select Rome Number</option>
                        <option :value="allroom.id" style="color: black">
                          {{ allroom.number }}
                        </option>
                      </select>
                    </p>
                    <small class="text-danger" v-if="errors.selectroomnumber">{{
                      errors.selectroomnumber[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="exampleInputText1"
                        >Select Floor</label
                      >
                      <p v-for="allroom in allrooms" :key="allroom.id">
                        <select
                          class="form-control"
                          v-model="selectfloornumber"
                        >
                          <option selected disabled>Select Floor</option>
                          <option :value="allroom.floor" style="color: black">
                            {{ allroom.floor }}
                          </option>
                        </select>
                      </p>
                      <small
                        class="text-danger"
                        v-if="errors.selectfloornumber"
                        >{{ errors.selectfloornumber[0] }}</small
                      >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="exampleInputText1"
                        >Price</label
                      >
                      <p v-for="allroom in allrooms" :key="allroom.id">
                        <select class="form-control" v-model="selectprice">
                          <option selected disabled>Select Price</option>
                          <option
                            :value="allroom.room_price"
                            style="color: black"
                          >
                            {{ allroom.room_price }}
                          </option>
                        </select>
                      </p>
                      <small class="text-danger" v-if="errors.selectprice">{{
                        errors.selectprice[0]
                      }}</small>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Pay Amount
                        </label>
                        <input
                          type="number"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Pay Amount"
                          v-model="pay_amount"
                        />
                        <small class="text-danger" v-if="errors.pay_amount">{{
                          errors.pay_amount[0]
                        }}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail3"
                          >Due Amount</label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="exampleInputEmail3"
                          placeholder="Due Amount"
                          v-model="due_amount"
                        />
                        <small class="text-danger" v-if="errors.due_amount">{{
                          errors.due_amount[0]
                        }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br />

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!--End Reservation  -->

          <!--Start Customer  -->

          <div id="customershow" style="display: none">
            <form
              @submit.prevent="customerInsert"
              enctype="multipart/form-data"
            >
              <div class="modal-body">
                <div class="form-group">
                  <label class="form-label" for="exampleInputText1"
                    >Select Category</label
                  >

                  <select class="form-control" v-model="form.customer_type">
                    <option selected disabled>Select Customer Type</option>
                    <option
                      :value="customertype.id"
                      v-for="customertype in customertypes"
                    >
                      {{ customertype.cus_type }}
                    </option>
                  </select>
                  <small class="text-danger" v-if="errors.customer_type">{{
                    errors.customer_type[0]
                  }}</small>
                </div>
                <div class="form-group">
                  <label class="form-label" for="exampleInputText1"
                    >Full Name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="exampleInputText1"
                    placeholder="Enter Name"
                    v-model="form.full_name"
                  />
                  <small class="text-danger" v-if="errors.full_name">{{
                    errors.full_name[0]
                  }}</small>
                </div>
                <div class="form-group">
                  <label class="form-label" for="exampleInputEmail3"
                    >Email Address</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail3"
                    placeholder="Enter Email"
                    v-model="form.email"
                  />
                  <small class="text-danger" v-if="errors.email">{{
                    errors.email[0]
                  }}</small>
                </div>
                <div class="form-group">
                  <label class="form-label" for="exampleInputEmail3"
                    >Phone</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="exampleInputEmail3"
                    placeholder="Enter Phone"
                    v-model="form.phone"
                  />
                  <small class="text-danger" v-if="errors.phone">{{
                    errors.phone[0]
                  }}</small>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputphone"
                    >Address
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    id="exampleInputphone"
                    placeholder="Enter Address"
                    v-model="form.address"
                  />
                  <small class="text-danger" v-if="errors.address">{{
                    errors.address[0]
                  }}</small>
                </div>

                <div class="form-group">
                  <label class="form-label" for="exampleInputNumber1"
                    >NID Number</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="exampleInputNumber1"
                    placeholder="Enter NID Number"
                    v-model="form.nid"
                  />
                  <small class="text-danger" v-if="errors.nid">{{
                    errors.nid[0]
                  }}</small>
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
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          <!--end Customer  -->

          <!--Start Customer  -->

          <div id="serviceshow" style="display: none; padding: 15px">
            <form @submit.prevent="ServiceInsert" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-label" for="exampleInputText1"
                  >Select Customer Name</label
                >
                <select class="form-control" v-model="servicecustomerid">
                  <option selected disabled>Select Customer Name</option>
                  <option
                    :value="reservationcustomer.id"
                    v-for="reservationcustomer in reservationcustomers"
                    style="color: black"
                  >
                    {{ reservationcustomer.full_name }}
                  </option>
                </select>
                <small class="text-danger" v-if="errors.reservationcustomer">{{
                  errors.reservationcustomer[0]
                }}</small>
              </div>
              <div class="form-group">
                <label class="form-label" for="exampleInputText1"
                  >Select Services Name</label
                >
                <select class="form-control" v-model="selectedServicesPrice">
                  <option selected disabled>Select Services Name</option>
                  <option
                    :value="getservice.id"
                    v-for="getservice in getservices"
                    :key="getservice.id"
                  >
                    {{ getservice.service_name }}
                  </option>
                </select>
                <small
                  class="text-danger"
                  v-if="errors.selectedServicesPrice"
                  >{{ errors.selectedServicesPrice[0] }}</small
                >
              </div>
              <div class="form-group">
                <label class="form-label" for="exampleInputEmail3"
                  >Service unit</label
                >
                <input
                  type="text"
                  class="form-control prc"
                  id="exampleInputEmail3"
                  placeholder="Service unit"
                  v-model="service_unit"
                />

                <small class="text-danger" v-if="errors.service_unit">{{
                  errors.service_unit[0]
                }}</small>
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputText1"
                  >Select Service Price</label
                >
                <select class="form-control" v-model="get_service_price">
                  <option selected disabled>Select Service Price</option>
                  <option
                    :value="getserviceprice.service_price"
                    v-for="getserviceprice in getserviceprices"
                  >
                    {{ getserviceprice.service_price }} TK
                  </option>
                </select>
                <small class="text-danger" v-if="errors.get_service_price">{{
                  errors.get_service_price[0]
                }}</small>
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputText1"
                  >Select Service Price</label
                >
                <select class="form-control" v-model="service_total">
                  <option selected disabled>Select Service Price</option>
                  <option
                    :value="getservicepric.service_price"
                    v-for="getservicepric in getserviceprices"
                  >
                    {{ getservicepric.service_price * service_unit }} TK
                  </option>
                </select>
                <small class="text-danger" v-if="errors.service_total">{{
                  errors.service_total[0]
                }}</small>
              </div>
              <br />

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">
                  Add Service
                </button>
              </div>
            </form>
          </div>
          <!--end Customer  -->
        </div>
      </div>
    </div>
    <!-- modal end -->

    <!-- floor no three start -->

    <section>
      <h1 class="text-center text-muted my-3">FLOOR NO: 2</h1>
      <div class="row">
        <div
          v-for="roomtwo in roomTwos"
          :key="roomtwo.id"
          class="col-md-2 col-sm-12"
          @click="GetRoom(roomtwo.id)"
        >
          <div
            class="card profile-card my-2"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <div
              class="card-body profile-card-info"
              v-if="roomtwo.room_status == 0"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomtwo.number }}
              </h6>
            </div>
            <div
              class="card-body profile-card-info"
              style="background-color: #059862"
              v-if="roomtwo.room_status == 1"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomtwo.number }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- floor no three end -->

    <!-- floor no four start -->

    <section>
      <h1 class="text-center text-muted my-3">FLOOR NO: 3</h1>
      <div class="row">
        <div
          v-for="roomthree in roomThrees"
          :key="roomthree.id"
          @click="GetRoom(roomthree.id)"
          class="col-md-2 col-sm-12"
        >
          <div
            class="card profile-card my-2"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            id="exampleModal"
          >
            <div
              class="card-body profile-card-info"
              v-if="roomthree.room_status == 0"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomthree.number }}
              </h6>
            </div>
            <div
              class="card-body profile-card-info"
              style="background-color: #059862"
              v-if="roomthree.room_status == 1"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomthree.number }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- floor no four end -->

    <!-- floor no five start -->

    <section>
      <h1 class="text-center text-muted my-3">FLOOR NO: 4</h1>
      <div class="row">
        <div
          v-for="roomfour in roomFours"
          :key="roomfour.id"
          class="col-md-2 col-sm-12"
          @click="GetRoom(roomfour.id)"
        >
          <div
            class="card profile-card my-2"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <div
              class="card-body profile-card-info"
              v-if="roomfour.room_status == 0"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomfour.number }}
              </h6>
            </div>
            <div
              class="card-body profile-card-info"
              style="background-color: #059862"
              v-if="roomfour.room_status == 1"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomfour.number }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- floor no five end -->

    <section>
      <h1 class="text-center text-muted my-3">FLOOR NO: 5</h1>
      <div class="row">
        <div
          v-for="roomfive in roomFives"
          :key="roomfive.id"
          class="col-md-2 col-sm-12"
          @click="GetRoom(roomfive.id)"
        >
          <div
            class="card profile-card my-2"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
          >
            <div
              class="card-body profile-card-info"
              v-if="roomfive.room_status == 0"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomfive.number }}
              </h6>
            </div>
            <div
              class="card-body profile-card-info"
              style="background-color: #059862"
              v-if="roomfive.room_status == 1"
            >
              <img src="backend/img/bed-icon.png" />
              <h6 class="card-subtitle mb-2 text-muted my-3">
                {{ roomfive.number }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--ses  -->
  </main>
</template>
<script>
export default {
  created() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      form: {
        //cistomer
        roomid: null,
        room_categ_id: null,
        room_quantity: null,
        room_description: null,
        customer_type: null,
        full_name: null,
        email: null,
        phone: null,
        address: null,
        patho: null,
        nid: null,
        //services
        service_name: null,
        service_unit: null,
        service_price: null,
        service_total: null,
      },
      roomOnes: {},
      roomTwos: {},
      roomThrees: {},
      roomFours: {},
      roomFives: {},
      allrooms: {},
      //BOOKING
      errors: {},
      customers: {},
      reservationcustomers: {},
      rooms: {},
      floors: {},
      prices: {},
      roomcategories: {},
      customertypes: {},
      selectedPrice: "",
      //start reservation date
      check_in_date: "",
      check_out_date: "",
      check_in_time: "",
      check_out_time: "",
      number_of_adult: "",
      customerid: "",
      selectedClass: "",
      room_cag_id: "",
      room_floor_id: "",
      room_prices: "",
      pay_amount: "",
      due_amount: "",
      // services
      getservices: {},
      selectedServicesPrice: "",
      getserviceprices: {},
      get_service_price: "",
      servicecustomerid: "",
      // reservation update data here
      selectcategoryroom: {},
      selectroomnumber: {},
      selectfloornumber: {},
      selectprice: {},
      //checkout
      checkoutroomnumber: {},
      //Getauditorium
      getauditoriums: {},
    };
  },
  methods: {
    AllAuditorium() {
      axios
        .get("/api/getauditoriumfloorones/")
        .then(({ data }) => {
          this.getauditoriums = data;
        })
        .catch();
    },

    allRoomForfloorOne() {
      axios
        .get("/api/getroomfloorones/")
        .then(({ data }) => {
          this.roomOnes = data;
        })
        .catch();
    },
    allRoomForfloorTwo() {
      axios
        .get("/api/getroomfloortwos/")
        .then(({ data }) => {
          this.roomTwos = data;
        })
        .catch();
    },
    allRoomForfloorThree() {
      axios
        .get("/api/getroomfloorthrees/")
        .then(({ data }) => {
          this.roomThrees = data;
        })
        .catch();
    },
    allRoomForfloorFour() {
      axios
        .get("/api/getroomfloorfours/")
        .then(({ data }) => {
          this.roomFours = data;
        })
        .catch();
    },
    allRoomForfloorFive() {
      axios
        .get("/api/getroomfloorfives/")
        .then(({ data }) => {
          this.roomFives = data;
        })
        .catch();
    },
    GetRoom(id) {
      axios
        .get("/api/get-room/" + id)
        .then(({ data }) => {
          this.allrooms = data;
        })
        .catch();
      //console.log(id);
    },

    customerInsert() {
      axios
        .post("/api/customer/", this.form)
        .then(() => {
          Reload.$emit("afterAdd");
          Toast.fire({
            icon: "success",
            title: "Customer Added successfully",
          });

          this.customers = this.customers.filter((customer) => {
            return customer.id != id;
          });
          var x = document.getElementById("customershow");
          x.style.display = "none";
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },

    ServiceInsert() {
      var data = {
        servicecustomerid: this.servicecustomerid,
        selectedServicesPrice: this.selectedServicesPrice,
        service_unit: this.service_unit,
        get_service_price: this.get_service_price,
        service_total: this.service_total,
      };
      axios
        .post("/api/serviceprovider/", data)
        .then(() => {
          Reload.$emit("afterAdd");
          Toast.fire({
            icon: "success",
            title: "service provider added successfully",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
    ReservationInsert() {
      var data = {
        check_in_date: this.check_in_date,
        check_out_date: this.check_out_date,
        check_in_time: this.check_in_time,
        check_out_time: this.check_out_time,
        number_of_adult: this.number_of_adult,
        customerid: this.customerid,
        //selectedClass: this.selectedClass,
        //room_cag_id: this.room_cag_id,
        //room_floor_id: this.room_floor_id,
        //room_prices: this.room_prices,
        selectcategoryroom: this.selectcategoryroom,
        selectroomnumber: this.selectroomnumber,
        selectfloornumber: this.selectfloornumber,
        selectprice: this.selectprice,
        pay_amount: this.pay_amount,
        due_amount: this.due_amount,
      };
      axios
        .post("/api/reservation/", data)
        .then(() => {
          //Reload.$emit("afterReservation");
          var x = document.getElementById("floortin");
          x.style.display = "none";

          Toast.fire({
            icon: "success",
            title: "reservation successfully",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
    ReservationClear() {
      var data = {
        checkoutroomnumber: this.checkoutroomnumber,
      };
      axios
        .post("/api/clear/", data)
        .then(() => {
          Toast.fire({
            icon: "success",
            title: "reservation Clear successfully",
          });
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
    myCustomerFunction() {
      var x = document.getElementById("customershow");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    },
    myReservationFunction() {
      var x = document.getElementById("reservationhow");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    },
    myServiceFunction() {
      var x = document.getElementById("serviceshow");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    },
    myCheckOutFunction() {
      var x = document.getElementById("checkoutshow");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
      //axios
      //  .post("/api/clear/", data)
      //  .then(() => {
      //    Toast.fire({
      //     icon: "success",
      //     title: "reservation Clear successfully",
      //   });
      // })
      //.catch((error) => (this.errors = error.response.data.errors));
    },
    floortins() {
      var x = document.getElementById("floortin");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    },
  },

  mounted() {
    this.AllAuditorium();
    this.allRoomForfloorOne();
    this.allRoomForfloorTwo();
    this.allRoomForfloorThree();
    this.allRoomForfloorFour();
    this.allRoomForfloorFive();

    Reload.$on("afterAdd", () => {
      this.AllAuditorium();
      this.allRoomForfloorOne();
      this.allRoomForfloorTwo();
      this.allRoomForfloorThree();
      this.allRoomForfloorFour();
      this.allRoomForfloorFive();
      this.GetRoom(id);
    });
    Reload.$on("afterReservation", () => {
      this.AllAuditorium();
      this.allRoomForfloorOne();
      this.allRoomForfloorTwo();
      this.allRoomForfloorThree();
      this.allRoomForfloorFour();
      this.allRoomForfloorFive();
      this.GetRoom(id);
    });

    axios.get("/api/customer/").then(({ data }) => (this.customers = data));

    axios
      .get("/api/reservationcustomer/")
      .then(({ data }) => (this.reservationcustomers = data));

    axios
      .get("/api/customer-type/")
      .then(({ data }) => (this.customertypes = data));
    axios
      .get("/api/roomcategory")
      .then(({ data }) => (this.roomcategories = data));
    axios.get("/api/serviceget").then(({ data }) => (this.getservices = data));
  },
  watch: {
    selectedClass: function (value) {
      axios
        .get("/api/subroom?room_id=" + this.selectedClass)
        .then(({ data }) => (this.rooms = data));
    },
    room_cag_id: function (value) {
      axios
        .get("/api/subfloor?floor_id=" + this.room_cag_id)
        .then(({ data }) => (this.floors = data));
    },
    room_floor_id: function (value) {
      axios
        .get("/api/price?price_id=" + this.room_floor_id)
        .then(({ data }) => (this.prices = data));
    },
    selectedServicesPrice: function (value) {
      axios
        .get(
          "/api/selectedservicesprice?price_id=" + this.selectedServicesPrice
        )
        .then(({ data }) => (this.getserviceprices = data));
    },
  },
};
</script>

<style></style>
