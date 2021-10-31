
<template>
    <div>
       
     

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- secondary nav start -->
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary"><a href="room-create.html">Create Room
                </a></button>
            </div>
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <!-- secondary nav end -->

        <!-- profile start -->
        <section>
          <div class="row my-5">
            <div class="col-md-3 col-sm-12">
              <div class="card profile-card my-2">
                <div class="card-body profile-card-info">
                  <span class="my-3 profile-card-info-icon" data-feather="home"></span>
                  <h3 class="card-title">70</h3>
                  <h6 class="card-subtitle mb-2 text-muted my-3">Available Room</h6>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="card profile-card my-2">
                <div class="card-body profile-card-info">
                  <span class="my-3 profile-card-info-icon" data-feather="award"></span>
                  <h3 class="card-title">2</h3>
                  <h6 class="card-subtitle mb-2 text-muted my-3">This Month Reserve</h6>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="card profile-card my-2">
                <div class="card-body profile-card-info">
                  <span class="my-3 profile-card-info-icon" data-feather="gift"></span>
                  <h3 class="card-title">70</h3>
                  <h6 class="card-subtitle mb-2 text-muted my-3">This Month Sales</h6>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <div class="card profile-card my-2">
                <div class="card-body profile-card-info">
                  <span class="my-3 profile-card-info-icon" data-feather="dollar-sign"></span>
                  <h3 class="card-title">270000</h3>
                  <h6 class="card-subtitle mb-2 text-muted my-3">Totla Sales In This Month</h6>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- profile end -->
        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

        <!-- checkin table start -->
        <h2>Today's Pending Guest To Check Out:</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Room No</th>
                <th>Out Date</th>
                <th>Checkout Time</th>
                <th>Guest Name</th>
                <th>Mobile No</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
            
             
            </tbody>
          </table>
        </div>

        <!-- checkout table start -->
        <h2>Today's Pending Guest To Check In:</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Room No</th>
                <th>Out Date</th>
                <th>Checkout Time</th>
                <th>Guest Name</th>
                <th>Mobile No</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
            
              
             
            </tbody>
          </table>
        </div>
      </main>
    </div>

    
</template>
<script lang="ts">


export default ({
    created(){
       if(!User.loggedIn()){
          this.$router.push({ name : '/'});
       }
    }
})
</script>

<style>

</style>
