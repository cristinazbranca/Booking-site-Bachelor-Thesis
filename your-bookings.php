
<?php include("includes/header.php"); ?>
        <?php include("includes/navigation.php"); ?>
        
<?php include 'admin1/./config.php'; ?>
 <?php

                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }


                                if (isset($_GET['delete'])) {
                                    
                                    $id = $_GET['delete'];

                                    $delete = mysqli_query($conn, "DELETE FROM bookings WHERE id = '$id'");
                                    if ($delete) {
                                        $_SESSION['message'] = "<div class='alert alert-success'><strong>Alert! </strong> Record Removed Successfully!</div>";
                                        header("Location: your-bookings.php");
                                    } else {
                                        $_SESSION['message'] = "<div class='alert alert-danger'><strong>Alert! </strong> Problem occured deleting record.</div>";
                                        header("Location: your-bookings.php");
                                    }
                                }

                            ?>
        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4><span class="text-gold"> Rezervările tale</span></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>Camera</th>
                                        <th>Data de  rezervare</th>
                                        <th>Status</th>
                                        <th></th>
                                    </thead>
                                    <tbody>


<?php



    $yourBookings = mysqli_query($connection, "SELECT * FROM bookings WHERE user_id = '" . $_SESSION['id'] . "'");
    if (mysqli_num_rows($yourBookings) > 0) {
        $inc = 1;
        while ($booking = mysqli_fetch_array($yourBookings)) {
            ?>
            <tr>
                <td><?php echo $booking['title']; ?></td>
                <td><?php echo $booking['booking_date']; ?></td>
                <td><?php echo $booking['Status']; ?></td>
                 <td> <a href="your-bookings.php?delete=<?php echo $booking['id']; ?>" class="btn btn-success" onclick="return confirm('Sigur vrei să renunți?');">Înapoi</a></td>
                 
            </tr>

           
            <?php
            $inc++;
        }
    } else {
        echo "<tr><td>Nu există rezervare făcută pe acest nume!</td></tr>";
    }

?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("includes/footer.php"); ?>