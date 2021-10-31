<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="Hugo 0.80.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Desha -Dashboard</title>
 <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/"> -->

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
 


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="{{asset('backend/dashboard.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('backend/style.css')}}">
</head>

<body>

<div id="app">

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow" id="navbarid" style="display: none;" v-show="$route.path === '/' || $route.path === '/register'  || $route.path === '/forgate' ? false : true ">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">DESHA HOTEL</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        
        <router-link class="nav-link" to="/logout">Logout</router-link>
      </li>
    </ul>
  </header>

  <div class="container-fluid" >
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" to="/home">
                <span data-feather="home"></span>
                Dashboard
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/store-room-category">
                <span data-feather="file"></span>
                Room Category
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/room-category">
                <span data-feather="file"></span>
                All Room Category
              </router-link>
            </li>

           
            <li class="nav-item">
              <router-link class="nav-link" to="/store-room">
                <span data-feather="file"></span>
                Create Room
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/room">
                <span data-feather="file"></span>
                All Room 
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/store-floor">
                <span data-feather="file"></span>
                Create Floor
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/floor">
                <span data-feather="file"></span>
                All Floor 
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/store-reservation">
                <span data-feather="file"></span>
                Create Room Reservation
              </router-link>
            </li>

            
            <li class="nav-item">
              <router-link class="nav-link" to="/reservation">
                <span data-feather="file"></span>
                All Room Reservation
              </router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" to="/store-room-category-image">
                <span data-feather="file"></span>
                Room Category Image
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/room-category-image">
                <span data-feather="file"></span>
                All Room Category Image
              </router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" to="/store-customer-type">
                <span data-feather="file"></span>
                Customer Type
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/customer-type">
                <span data-feather="file"></span>
                All Customer Type
              </router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" to="/store-customer">
                <span data-feather="file"></span>
                Customer Store
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/customer">
                <span data-feather="file"></span>
                All Customer 
              </router-link>
            </li>

            
            <li class="nav-item">
              <router-link class="nav-link" to="/store-roomimage">
                <span data-feather="file"></span>
                Create Room Image
              </router-link>
            </li>

            
            <li class="nav-item">
              <router-link class="nav-link" to="/roomimage">
                <span data-feather="file"></span>
                All Room Image
              </router-link>
            </li>

            

            <li class="nav-item">
              <router-link class="nav-link" to="/store-halltype">
                <span data-feather="file"></span>
                Create halltype
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/halltype">
                <span data-feather="file"></span>
                All halltype 
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/store-hallreservation">
                <span data-feather="file"></span>
                Create hallreservation
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/hallreservation">
                <span data-feather="file"></span>
                All hallreservation
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/store-company">
                <span data-feather="file"></span>
                Create Company
              </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/company">
                <span data-feather="file"></span>
                All Company
              </router-link>
            </li>
            
            <li class="nav-item">
              <router-link class="nav-link" to="/daily-view-room-reservation">
                <span data-feather="file"></span>
                Today Room Status
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Monthly View Reservation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reservation-list.html">
                <span data-feather="users"></span>
                Reservation List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reservation From Website
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                User Log
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="company-entry.html">
                <span data-feather="airplay"></span>
                Company Entry
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="alert-triangle"></span>
                Feedback
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="archive"></span>
                Today's Collection
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="award"></span>
                Guest List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="box"></span>
                Old Guest List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="room-reservation.html">
                <span data-feather="thumbs-up"></span>
                New Reservation
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="paperclip"></span>
                Company Due List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="repeat"></span>
                Kitchen KOT List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="power"></span>
                Day Close
              </a>
            </li>
          </ul>

          <!-- reports start -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Account Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="dollar-sign"></span>
                Today's Cash Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="eye"></span>
                GL Balance Sheet
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Today's Guest List
              </a>
            </li>
          </ul>
          <!-- reports end -->
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>House Keeping</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="user"></span>
                House Keepers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="upload-cloud"></span>
                Occupancy Report
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="trash-2"></span>
                House Keeping Report
              </a>
            </li>
          </ul>
        </div>
      </nav>
    
    <router-view></router-view>
    </div>
    </div>

  

  

  <script src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
            
            let token =localStorage.getItem('token');
            //alart("Yes Success ");
            if (token) {
                $("#navbarid").css("display");
                $("#layoutSidenav_nav").css("display");

            }

        </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="{{asset('backend/dashboard.js')}}"></script>





  
  </div>
</body>

</html>