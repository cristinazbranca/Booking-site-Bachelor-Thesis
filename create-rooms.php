<?php include 'config.php'; ?>
<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Pensiunea Casa Cristina</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  
</head>
<body>
  <div class="container-scroller">

    
     <?php include 'partials/_navbar.php';
     ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
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

      <?php include 'partials/_sidebar2.php';
      ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Adăugare de camere</h3>
                  
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          


    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">

        


        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    
                    <div class="col-7 align-self-center">
                        
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="card p-5">
                            
                            <form action="" method="POST" enctype="multipart/form-data">
<?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_POST['create-room'])) {
        
        $title = mysqli_real_escape_string($conn, $_POST['title']);
         $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];

        move_uploaded_file($picture_tmp, "../images/$picture");

                $create_room = mysqli_query($conn, "

                    INSERT 
                        INTO 
                            rooms
                                (
                                    title,
                                    description, 
                                    price, 
                                    picture
                                )
                            VALUES
                                (
                                '$title', 
                                '$description',
                                '$price', 
                                '$picture'

                                )

                    ");
                if ($create_room) {
                    $_SESSION['message'] = "<div class='alert alert-success'><strong> Perfect! </strong> Camera a fost creată cu succes!</div>";
                    header("Location: create-rooms.php");
                } else {
                    $_SESSION['message'] = "<div class='alert alert-danger'><strong> Eroare! </strong> Ceva nu a funcționat.</div>";
                    header("Location: create-rooms.php");
                }
                
 

    }




?>
                                <div class="form-group">
                                    <label for="">Titlu</label>
                                    <input type="text" name="title" placeholder="Tipul de cameră" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Descriere</label>
                                    <input type="text" name="description" placeholder="Descrierea camerei" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Preț</label>
                                    <input type="number" name="price" placeholder="Prețul camerei" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="">Fotografie atașată</label>
                                    <input type="file" name="picture" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="create-room" value="Afișează camera pe pagină" class="btn btn-primary btn-block">
                                </div>
                            </form>

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

