<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Results Page</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- <link rel="stylesheet" href="index.css"> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
         rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style>
         /* External  */
         /* Set entire website background to black */
         body {
         background-color: #000;
         color: #ccc;
         /* Light gray text for readability */
         font-family: "Montserrat", sans-serif;
         }
         .sticky-top {
         z-index: 0 !important;
         }
         .button-47 {
         align-items: center;
         background: #000000;
         border: 0 solid #E2E8F0;
         box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
         box-sizing: border-box;
         color: #ffffff;
         display: inline-flex;
         font-family: Inter, sans-serif;
         font-size: 1rem;
         height: 30px;
         justify-content: center;
         line-height: 24px;
         overflow-wrap: break-word;
         padding: 18px;
         text-decoration: none;
         letter-spacing: 1px;
         width: auto;
         border-radius: 8px;
         cursor: pointer;
         user-select: none;
         -webkit-user-select: none;
         touch-action: manipulation;
         }
         /* Navbar Text Color */
         /* Custom Button Styling */
         .custom-btn {
         background-color: #000 !important;
         color: #ccc;
         border: 1px solid #ccc;
         border-radius: 20px;
         padding: 8px 16px;
         transition: all 0.3s ease-in-out;
         }
         .custom-btn:hover {
         background-color: white;
         color: black;
         }
         /* Card Styles */
         .card {
         background-color: #222;
         /* Dark gray background */
         color: #ccc;
         /* Light gray text */
         border: 1px solid #444;
         Medium gray border box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.1);
         }
         /* Card Header */
         .card .card-header {
         background: #111;
         /* Very dark gray */
         color: #ddd;
         border-bottom: 1px solid #444;
         }
         /* Date Circle Styles */
         .widget-49 .widget-49-title-wrapper .widget-49-date-primary,
         .widget-49 .widget-49-title-wrapper .widget-49-date-secondary,
         .widget-49 .widget-49-title-wrapper .widget-49-date-success,
         .widget-49 .widget-49-title-wrapper .widget-49-date-info,
         .widget-49 .widget-49-title-wrapper .widget-49-date-warning,
         .widget-49 .widget-49-title-wrapper .widget-49-date-danger,
         .widget-49 .widget-49-title-wrapper .widget-49-date-light,
         .widget-49 .widget-49-title-wrapper .widget-49-date-dark,
         .widget-49 .widget-49-title-wrapper .widget-49-date-base {
         background-color: #333;
         /* Dark gray */
         width: 4rem;
         height: 4rem;
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: column;
         }
         /* Date Text */
         .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day,
         .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
         color: #fff;
         /* White text */
         font-weight: 500;
         font-size: 1.5rem;
         }
         .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month,
         .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
         color: #aaa;
         /* Light gray */
         font-size: 1rem;
         text-transform: uppercase;
         }
         /* Meeting Info */
         .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
         display: flex;
         flex-direction: column;
         margin-left: 1rem;
         }
         .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
         color: #eee;
         font-size: 14px;
         }
         .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
         color: #bbb;
         font-size: 13px;
         }
         /* Meeting Points */
         .widget-49 .widget-49-meeting-points {
         font-weight: 400;
         font-size: 13px;
         margin-top: .5rem;
         color: #ccc;
         }
         .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
         display: list-item;
         color: #aaa;
         }
         .widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
         margin-left: .5rem;
         }
         /* Buttons & Links */
         .widget-49 .widget-49-meeting-action {
         text-align: right;
         }
         .widget-49 .widget-49-meeting-action a {
         text-transform: uppercase;
         color: #fff;
         font-weight: bold;
         border: 1px solid #ccc;
         padding: 5px 10px;
         border-radius: 4px;
         text-decoration: none;
         background-color: #333;
         }
         .widget-49 .widget-49-meeting-action a:hover {
         background-color: #fff;
         color: #000;
         }
         /* General Text Elements */
         h1,
         h2,
         h3,
         h4,
         h5,
         h6 {
         color: #ddd;
         }
         p {
         color: #bbb;
         }
         /* Input Fields */
         input,
         textarea,
         select {
         background-color: #222;
         color: #fff;
         border: 1px solid #555;
         padding: 10px;
         border-radius: 4px;
         }
         input::placeholder,
         textarea::placeholder {
         color: #777;
         }
         /* Tables */
         table {
         background-color: #222;
         color: #fff;
         border: 1px solid #444;
         }
         th,
         td {
         border: 1px solid #555;
         padding: 8px;
         }
         th {
         background-color: #333;
         color: #fff;
         }
         td {
         background-color: #222;
         color: #ccc;
         }
         /* Apply dark background and grayscale effect */
         body {
         background-color: black !important;
         color: white !important;
         }
         /* Convert all images and sections to grayscale */
         img {
         filter: grayscale(100%);
         }
        
        .wa-icon{
            filter: none!important;
            margin-top: 10px;
            border-radius: 50px;
         }
         /* Make cards and other sections dark */
         .card {
         background-color: #333 !important;
         color: white !important;
         border: 1px solid #555 !important;
         }
         /* Make table dark */
         .table {
         background-color: #222 !important;
         color: white !important;
         }
         .table th,
         .table td {
         border-color: #555 !important;
         }
         .table-dark {
         background-color: #444 !important;
         color: white !important;
         }
         /* Buttons */
         .btn {
         background-color: #555 !important;
         color: white !important;
         border: none;
         }
         .btn:hover {
         background-color: #777 !important;
         }
       
         /* External  */
         .hero-section {
         background: url('https://via.placeholder.com/1920x600') no-repeat center center/cover;
         height: 300px;
         position: relative;
         }
         .hero-section .carousel-item img {
         height: 300px;
         object-fit: cover;
         }
         .banner-section {
         /* background: url('https://via.placeholder.com/1920x400') no-repeat center center/cover; */
         height: 200px;
         }
         .results-section .card {
         min-width: 250px;
         }
         .secondSection {
         background-color: black;
         text-align: center;
         color: white;
         padding: 12px;
         }
         .paratexst {
         color: black !important;
         }
         /* buttons  */
         /* CSS */
         .button-37 {
         display: inline-flex;
         align-items: center;
         justify-content: center;
         background-color: #13aa52;
         border: 1px solid #13aa52;
         border-radius: 10px;
         box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px 0;
         box-sizing: border-box;
         color: #fff;
         cursor: pointer;
         font-family: "Akzidenz Grotesk BQ Medium", -apple-system, BlinkMacSystemFont, sans-serif;
         font-size: 16px;
         font-weight: 400;
         outline: none;
         padding: 10px 25px;
         text-align: center;
         text-decoration: none;
         /* Removes underline */
         transform: translateY(0);
         transition: transform 150ms, box-shadow 150ms;
         user-select: none;
         -webkit-user-select: none;
         touch-action: manipulation;
         }
         .button-37:hover {
         box-shadow: rgba(0, 0, 0, 0.15) 0 3px 9px 0;
         transform: translateY(-2px);
         }

         .dynamic-fomt{
            font-size: 20px; 
         }

        
         @media (min-width: 768px) {
         .button-37 {
         padding: 10px 30px;
         }
         }

         @media(min-width: 620px){
            .dynamic-fomt{
            font-size: 14px; 
         }
         }
      </style>
   </head>
   <body ng-app="myApp" ng-controller="MainController">
      <!-- Navbar -->
      @include('navbar') 
   
      <!-- Marquee Section -->
      <div class="secondSection">
         <marquee behavior="scroll" direction="right">
            <h5>खाईवाल भाई अपना पर्चा कमीशन पर भी डाल सकते हैं रेट 90/10, 95/5</h5>
         </marquee>
      </div>
   
      <!-- Hero Carousel -->
      <div id="heroCarousel" class="carousel slide hero-section" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="{{ asset('uploads/sliders/BANNER.PNG') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
               <img src="{{ asset('uploads/sliders/BANNER2.JPG') }}" class="d-block w-100" alt="Slide 2">
            </div>
         </div>
         <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         </a>
         <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
         </a>
      </div>
   
      <!-- Current Time -->
      <div class="secondSection">
         <h5 id="currentTime"></h5>
      </div>
   
      <!-- Result Cards -->
      <div class="container my-5">
         <div class="row">
            @for($i = 0; $i < 3; $i++)
            @php
            $label = match($i) {
                0 => 'Today',
                1 => 'Yesterday',
                2 => '2 days ago',
                default => ''
            };
        @endphp
            <div class="col-lg-4">
               <div class="card card-margin">
                  <div class="card-header no-border">
                     <h5 class="card-title">{{ $GAMES[0]->name }} <br> <span class="text-primary"> ({{ $label }}) </span>
                     </h5>
                  </div>
                  <div class="card-body pt-0">
                     <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                           <div class="widget-49-date-primary">
                              <span class="widget-49-date-day">
                                 {{ isset($alldata[$i]) ? $alldata[$i]->today : 'N/A' }}
                              </span>
                           </div>
                           <div class="widget-49-meeting-info">
                              <span class="widget-49-pro-title">Result announce at</span>
                              <span class="widget-49-meeting-time">
                                 {{ isset($alldata[$i]) ? \Carbon\Carbon::parse($alldata[$i]->date)->format('d-m-Y') : 'N/A' }}
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endfor
         </div>
      </div>
   
      <!-- Table Section -->
      <div class="container my-5">
         <h2 class="text-center fw-bold text-primary mb-4">📊 आज के सट्टा रिजल्ट 📊</h2>
         <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
               <thead class="table-dark">
                  <tr>
                     <th>⏰ रिजल्ट आने का समय</th>
                     <th>📅 कल आया था</th>
                     <th>🏆 आज का रिज़ल्ट</th>
                  </tr>
               </thead>
               <tbody>
                  @if(isset($alldata[0]))
                  <tr>
                     <td>{{ $GAMES[0]->time }}</td>
                     <td>{{ $alldata[0]->yesterday }}</td>
                     <td>{{ $alldata[0]->today }}</td>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   
      <!-- Banner -->
      <div class="banner-section w-100 my-5">
         <img src="{{ asset('uploads/sliders/BANNER.PNG') }}" class="d-block w-100" alt="Banner" height="200px">
      </div>
   
      <!-- Contact Section -->
      <div class="container my-5 text-center">
         <h2 class="fw-bold text-primary display-5">👉 सीधे सट्टा कंपनी का <span class="text-warning">No.1 खाईवाल</span> 👈</h2>
         {{-- <p class="fs-3 text-danger fw-bold">👑 KRISHNA BHAI KHAIWAL 👑👇</p> --}}
   
         <div class="card p-4 my-4 shadow-lg border-0" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 15px;">
            <h4 class="text-dark fw-bold">💰 Rate 💰</h4>
            <p class="mb-2">जोड़ी — <span class="fw-bold text-success">100 = 9500</span></p>
            <p class="mb-2">हरूफ — <span class="fw-bold text-success">1000 = 9500</span></p>
         </div>
   
         <div class="card p-4 my-4 shadow-lg border-0" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 15px;">
            <h4 class="text-dark fw-bold">⏳ Contact Persons ⏳</h4>
         </div>
   
         <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4 mb-4">
            @foreach($CONTACTS as $CONTACTSDetail)
            <div class="card text-center shadow-lg border-0" style="border-radius: 20px; background: linear-gradient(135deg, #ff9a9e, #fad0c4); color: #fff; padding: 20px;">
               <div class="card-body">
                  <h4 class="card-title fw-bold">💸 Payment Options</h4>
                  <p class="fs-5 text-dark">PAYTM / BANK TRANSFER / PHONE PAY / GOOGLE PAY</p>
                  {{-- <p class="fs-3 text-danger fw-bold">👑 KRISHNA BHAI KHAIWAL 👑👇</p> --}}
                  <h5 class="fw-bold text-dark bg-white p-2 rounded d-inline-block">👑 {{ $CONTACTSDetail->name }} 👑👇</h5>
                  <p class="fw-bold text-light mt-3 fs-4">👉 बिना किसी डर के गेम खेल सकते हो, पेमेंट में कोई दिक्कत नहीं आएगी</p>
                  <a href="tel:{{ $CONTACTSDetail->mobile }}" class="btn btn-warning fw-bold shadow-lg mt-3" style="border-radius: 30px; padding: 15px 25px;"><span class="dynamic-fomt">👇 गेम भेजने के लिए क्लिक करें 👇</span></a>

                  {{-- font-size: 20px; --}}
                  {{-- <a href="https://wa.me/{{ $CONTACTSDetail->mobile }}" target="_blank" class="mt-4 d-flex align-items-center text-decoration-none">
                     <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="20" height="20" class="me-2"> {{ $CONTACTSDetail->mobile }}
                  </a> --}}
                  <a href="https://wa.me/{{ $CONTACTSDetail->mobile }}" target="_blank" class="whatsapp-button">
                     <img src="{{ asset('logo/whatsapp.webp') }}" alt="WhatsApp" class="wa-icon" style="width: 220px; animation: blink-animation 1s infinite;">
                    
                  </a>
                  
                  
                  
               </div>
            </div>
            @endforeach
         </div>
   
         <div class="alert alert-danger my-4 shadow-lg fs-5" style="border-radius: 10px;">
            💓 <strong>Payment Option:</strong> PAYTM / BANK TRANSFER / PHONE PAY / GOOGLE PAY
            <p class="fw-bold text-success fs-4">👉 बिना किसी डर के गेम खेल सकते हो, पेमेंट में कोई दिक्कत नहीं आएगी</p>
         </div>
      </div>
   
      <!-- Search & Filter Table -->
      <div class="container my-5">
         {{-- <h2 class="text-center fw-bold text-success mb-4 display-5">📅 सट्टा रिजल्ट चार्ट - <span class="text-warning">मार्च 2025</span> 📅</h2> --}}

         <h2 class="text-center fw-bold text-success mb-4 display-5">
            📅 सट्टा रिजल्ट चार्ट - 
            <span class="text-warning">[[ getHindiMonthYear() ]]</span> 📅
         </h2>

         
         <div class="row mb-3">
            <div class="col-md-12 text-center">
               <form ng-submit="fetchData()" class="p-3" id="filterForm">
                  <div class="row g-2 justify-content-center">
                     <div class="col-md-4">
                        <select class="form-control" ng-model="filters.startMonth">
                           <option value="01">January</option>
                           <option value="02">February</option>
                           <option value="03">March</option>
                           <option value="04">April</option>
                           <option value="05">May</option>
                           <option value="06">June</option>
                           <option value="07">July</option>
                           <option value="08">August</option>
                           <option value="09">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                        </select>
                     </div>
                     <div class="col-md-4">
                        <select class="form-control" ng-model="filters.endYear">
                           <option value="2024">2024</option>
                           <option value="2025">2025</option>
                        </select>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Search</button>
                     </div>
                     <div class="col-md-2">
                        <button type="button" class="btn btn-secondary w-100" ng-click="resetFilters()"><i class="fas fa-times"></i> Reset</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
   
         <div class="card shadow-lg border-0">
            <div class="card-body">
               <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                  <table class="table table-bordered table-striped text-center shadow-lg">
                     <thead class="table-dark sticky-top">
                        <tr>
                           <th>📆 Date</th>
                           <th ng-repeat="record in tableData track by $index"> [[ record.date ]] </th>
                        </tr>
                     </thead>
                     <tbody class="fw-bold">
                        <tr>
                           <td>#</td>
                           <td ng-repeat="record in tableData track by $index"> [[ record.today ]] </td>
                        </tr>
                     </tbody>
                  </table>
                  <p ng-if="tableData.length === 0" class="text-center">No records found.</p>
               </div>
            </div>
         </div>
      </div>
   
     
      @include('disclaimer')
      @include('footer')
   
      <!-- AngularJS + Time Update -->
      <script>
         var app = angular.module('myApp', []);
         app.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
         });
      
         app.controller('MainController', function ($scope, $http, $timeout) {


            $scope.hindiMonths = {
               '01': 'जनवरी',
               '02': 'फ़रवरी',
               '03': 'मार्च',
               '04': 'अप्रैल',
               '05': 'मई',
               '06': 'जून',
               '07': 'जुलाई',
               '08': 'अगस्त',
               '09': 'सितंबर',
               '10': 'अक्टूबर',
               '11': 'नवंबर',
               '12': 'दिसंबर'
            };
            $scope.getHindiMonthYear = function () {
               return $scope.hindiMonths[$scope.filters.startMonth] + ' ' + $scope.filters.endYear;
            };




            // Helper to get current month and year
            function getCurrentMonth() {
               return (new Date().getMonth() + 1).toString().padStart(2, '0');
            }
      
            function getCurrentYear() {
               return new Date().getFullYear().toString();
            }
      
            // Default filter values
            $scope.filters = {
               startMonth: getCurrentMonth(),
               endYear: getCurrentYear()
            };
      
            // Fetch data with selected month and year
            $scope.fetchData = function () {
               let requestData = {
                  month: $scope.filters.startMonth,
                  year: $scope.filters.endYear
               };
      
               $http({
                  method: "POST",
                  url: "{{ route('datafilter') }}",
                  data: requestData,
                  headers: {
                     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                     "Content-Type": "application/json"
                  }
               }).then(function (response) {
                  $scope.tableData = response.data;
               }).catch(function (error) {
                  console.error("Error fetching data:", error);
               });
            };
      
            // Reset to default values
            $scope.resetFilters = function () {
               $scope.filters.startMonth = getCurrentMonth();
               $scope.filters.endYear = getCurrentYear();
               $scope.fetchData();
            };
      
            // Initial fetch
            $timeout(function () {
               $scope.fetchData();
            }, 0);
         });
      
         // Live time updater
         function updateTime() {
            const now = new Date();
            const options = { day: '2-digit', month: 'short', year: 'numeric' };
            const formattedDate = now.toLocaleDateString('en-GB', options);
            const formattedTime = now.toLocaleTimeString('en-US', {
               hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true
            });
            document.getElementById('currentTime').innerHTML = `${formattedDate}, ${formattedTime}`;
         }
      
         setInterval(updateTime, 1000);
         updateTime();
      </script>
      
   </body>
   
</html>