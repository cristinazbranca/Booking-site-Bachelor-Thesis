

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pensiunea Casa Cristina</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
     <?php include 'partials/_navbar.php';
     ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Stari culoare sidebar</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">Culoare header</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include 'partials/_sidebar2.php';
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Ești logat ca și administrator</h3>
                  
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          






          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../images/logo.png" alt="">
                  <div class="weather-info">
                    <div class="d-flex">
                    </div>
                  </div>
                </div>
              </div>
            </div>




            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Utilizatori</p>
                      <?php

                      require 'config.php';


                      $query = "SELECT id FROM users ORDER BY id";
                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1>'.$row.'</h1>';

                      ?>
                      <br>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Rezervări acceptate</p>
                      <?php


                      $query = "SELECT id FROM bookings WHERE Status = 'Acceptat' ORDER BY id";
                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1>'.$row.'</h1>';

                      ?>
                  
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Număr de camere</p>
                      <?php



                      $query = "SELECT id FROM rooms ORDER BY id";
                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1>'.$row.'</h1>';

                      ?>
                      <br>
               
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Rezervări în așteptare</p>
                      <?php



                      $query = "SELECT id FROM bookings WHERE Status = 'pending' ORDER BY id";
                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1>'.$row.'</h1>';

                      ?>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>