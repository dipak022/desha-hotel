//Start authentation
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forgate = require('./components/auth/forgate.vue').default;
let logout = require('./components/auth/logout.vue').default;
//end authentation
let home = require('./components/home.vue').default;

// room category component here  
let room_category = require('./components/roomCategory/create.vue').default;
let all_room_category = require('./components/roomCategory/index.vue').default;
let edit_room_category = require('./components/roomCategory/edit.vue').default;


// room category image component here 
let room_category_image = require('./components/roomCategoryImage/create.vue').default;
let all_room_category_image = require('./components/roomCategoryImage/index.vue').default;
let edit_room_category_image = require('./components/roomCategoryImage/edit.vue').default;

// Customer component here  
let storecustomer = require('./components/CustomerType/create.vue').default;
let customer = require('./components/CustomerType/index.vue').default;
let editcustomer = require('./components/CustomerType/edit.vue').default;

// Customer component here  
let savecustomer = require('./components/Customer/create.vue').default;
let allcustomer = require('./components/Customer/index.vue').default;
let updatecustomer = require('./components/Customer/edit.vue').default;

// Floor component here  
let storefloor = require('./components/Floor/create.vue').default;
let floor = require('./components/Floor/index.vue').default;
let editfloor = require('./components/Floor/edit.vue').default;


// Room component here  
let storeroom = require('./components/Room/create.vue').default;
let room = require('./components/Room/index.vue').default;
let editroom = require('./components/Room/edit.vue').default;


// halltype component here  
let storehalltype = require('./components/Halltype/create.vue').default;
let halltype = require('./components/Halltype/index.vue').default;
let edithalltype = require('./components/Halltype/edit.vue').default;


// hallreservation component here  
let storehallreservation = require('./components/Hallreservation/create.vue').default;
let hallreservation = require('./components/Hallreservation/index.vue').default;
let edithallreservation = require('./components/Hallreservation/edit.vue').default;

// Company component here  
let storecompany = require('./components/Company/create.vue').default;
let company = require('./components/Company/index.vue').default;
let editcompany = require('./components/Company/edit.vue').default;

// Room Image component here  
let storeroomimage = require('./components/RoomImage/create.vue').default;
let roomimage = require('./components/RoomImage/index.vue').default;
let editroomimage = require('./components/RoomImage/edit.vue').default;


// Reservation component here  
let storereservation = require('./components/Reservation/create.vue').default;
let reservation = require('./components/Reservation/index.vue').default;
let editreservation = require('./components/Reservation/edit.vue').default;

//daily_view_room_reservation component here
let daily_view_room_reservation = require('./components/Reservation/daily-view-room-reservation.vue').default;


export const routes = [

  // Auth route here 
  { path: '/', component: login, name: '/' },
  { path: '/register', component: register, name: 'register' },
  { path: '/forgate', component: forgate, name: 'forgate' },
  { path: '/logout', component: logout, name: 'logout' },
  { path: '/home', component: home, name: 'home' },
// room category route here 
  { path: '/store-room-category', component: room_category, name: 'store-room-category' },
  { path: '/room-category', component: all_room_category, name: 'room-category' },
  { path: '/edit-room-category/:id', component: edit_room_category, name: 'edit-room-category' },
// room category image route here  
 { path: '/store-room-category-image', component: room_category_image, name: 'store-room-category-image' },
 { path: '/room-category-image', component: all_room_category_image, name: 'room-category-image' },
 { path: '/edit-room-category/:id', component: edit_room_category_image, name: 'edit-room-category' },
 
 //store-customer route here 
  { path: '/store-customer-type', component: storecustomer, name: 'store-customer-type' },
  { path: '/customer-type', component: customer, name: 'customer-type' },
  { path: '/edit-customer-type/:id', component: editcustomer, name: 'edit-customer-type' },

   //customer route here 
   { path: '/store-customer', component: savecustomer, name: 'store-customer' },
   { path: '/customer', component: allcustomer, name: 'customer' },
   { path: '/edit-customer/:id', component: updatecustomer, name: 'edit-customer' },

   //Floor route here 
   { path: '/store-floor', component: storefloor, name: 'store-floor' },
   { path: '/floor', component: floor, name: 'floor' },
   { path: '/edit-floor/:id', component: editfloor, name: 'edit-floor' },


    //Room route here 
    { path: '/store-room', component: storeroom, name: 'store-room' },
    { path: '/room', component: room, name: 'room' },
    { path: '/edit-room/:id', component: editroom, name: 'edit-room' },

    //halltype route here 
    { path: '/store-halltype', component: storehalltype, name: 'store-halltype' },
    { path: '/halltype', component: halltype, name: 'halltype' },
    { path: '/edit-halltype/:id', component: edithalltype, name: 'edit-halltype' },


    //hallreservation route here 
    { path: '/store-hallreservation', component: storehallreservation, name: 'store-hallreservation' },
    { path: '/hallreservation', component: hallreservation, name: 'hallreservation' },
    { path: '/edit-hallreservation/:id', component: edithallreservation, name: 'edit-hallreservation' },

    //company route here 
    { path: '/store-company', component: storecompany, name: 'store-company' },
    { path: '/company', component: company, name: 'company' },
    { path: '/edit-company/:id', component: editcompany, name: 'edit-company' },

    //Room Image route here 
    { path: '/store-roomimage', component: storeroomimage, name: 'store-roomimage' },
    { path: '/roomimage', component: roomimage, name: 'roomimage' },
    { path: '/edit-roomimage/:id', component: editroomimage, name: 'edit-roomimage' },


    //Reservation route here 
    { path: '/store-reservation', component: storereservation, name: 'store-reservation' },
    { path: '/reservation', component: reservation, name: 'reservation' },
    { path: '/edit-reservation/:id', component: editreservation, name: 'edit-reservation' },

    //daily-view-room-reservation route here
    { path: '/daily-view-room-reservation', component: daily_view_room_reservation, name: 'daily-view-room-reservation' },

    // get room
    
   

  
]