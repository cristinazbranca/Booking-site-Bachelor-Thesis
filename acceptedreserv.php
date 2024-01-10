<?php include 'config.php'; ?>
<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pensiunea Casa Cristina</title>

  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">

  <link rel="stylesheet" href="css/vertical-layout-light/style.css">

</head>
<body>
  <div class="container-scroller">

     <?php include 'partials/_navbar.php';
     ?>

    <div class="container-fluid page-body-wrapper">

      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">Culoare</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">Culoare</p>
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
                  <h3 class="font-weight-bold">Informații rezervare</h3>
                  
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>

         <?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }


                                if (isset($_GET['delete'])) {
                                    
                                    $id = $_GET['delete'];

                                    $delete = mysqli_query($conn, "UPDATE bookings SET Status = 'Plecare' WHERE user_id = '$id'");
                                    if ($delete) {
                                        $_SESSION['message'] = "<div class='alert alert-success'><strong>Alerta! </strong> Inregistrare stearsă cu succes!</div>";
                                        header("Location: acceptedreserv.php");
                                    } else {
                                        $_SESSION['message'] = "<div class='alert alert-danger'><strong>Alerta! </strong> Nu s-a putut efectua ștergerea.</div>";
                                        header("Location: acceptedreserv.php");
                                    }
                                }

                            ?>

   

                                      <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                     <th scope="col">Nume utilizator</th>   
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Camere</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                
                        </tr>
                      </thead>
                      <tbody>

                                        <?php

$bookings = mysqli_query($connection, "
  SELECT  
    bookings.user_id, 
    bookings.title, 
    bookings.booking_date, 
    bookings.Status,
    users.id, 
    users.name, 
    users.phone, 
    users.email 
  FROM 
    bookings 
  INNER JOIN 
    users 
  ON 
  bookings.user_id = users.id
  WHERE
    Status = 'Accepted'
");
                                            $inc = 1;
                                            

                                                while ($booking = mysqli_fetch_array($bookings)) {

                                                    ?>

                                                    <tr>
                                                      


                                                        <td><?php echo $booking['name'] ?></td>
                                                         <td><?php echo $booking['email'] ?></td>
                                                         <td><?php echo $booking['phone'] ?></td>

                                                        <td><?php echo $booking['title'] ?></td>
                                                        <td><?php echo $booking['booking_date'] ?></td>
                                                        <td><?php echo $booking['Status'] ?></td>


<td> <a href="acceptedreserv.php?delete=<?php echo $booking['id']; ?>" class="btn btn-success" onclick="return confirm('Checking Out?');">Plecare</a></td>
                                                    

                                                   <?php
                                                    $inc++;
                                                }
                                            
                                        ?>
                                        
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>
    </div>
<?php include("includes/footer.php"); ?>

  <script src="vendors/js/vendor.bundle.base.js"></script>

  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>


  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
 
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>

</body>

</html>

