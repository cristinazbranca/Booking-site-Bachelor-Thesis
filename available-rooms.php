<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
      <img src="images/5.jpg" class="w-100 d-block">
        
		<div class="my-5 px-4">
		<h2 class=" fw-bold h-font text-center"> Camere disponibile</h2>
		<div class="h-line bg-dark"></div>
			
        <section class="accomodation_area section_gap">
            <div class="container">

                    <?php

                        if (isset($_SESSION['message'])) {
                            ?>  
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['message']);
                        }



                    ?>

                <div class="row mb_30">

                    <?php
                        $getRooms = mysqli_query($connection, "SELECT * FROM rooms");
                        if (mysqli_num_rows($getRooms) > 0) {
                            while ($room = mysqli_fetch_array($getRooms)) {
                            
                            ?>
							  <div class="col-lg-6 col-sm-6">
                                <div class="accomodation_item text-center">
                                    <div class="hotel_img">
                                        <img src="images/<?php echo $room['picture']; ?>" alt="">
                                        <a href="available-rooms.php?book=<?php echo $room['id']; ?>&title=<?php echo $room['title']; ?>" class="btn theme_btn button_hover">Rezervare</a>
                                    </div>
                                    <a href="#"><h4 class="sec_h4"><?php echo $room['title']; ?></h4></a>
                                    <a href="#"><p class="sec_h9"><?php echo $room['description']; ?></p></a>
                                    <h5><?php echo $room['price']; ?> RON<small>/noapte</small></h5>
                                    <br><br><br><br>
                                </div>
                            </div>
                            <?php
                            }
                        } else {
                            echo "<div class='col-md-12 text-center'><h4>Nu sunt camere disponibile!</h4></div>";
                        }
                    ?>
                            
                </div>
            </div>
        </section>
        
<?php

    if (isset($_GET['book']) AND isset($_GET['title'])) {
        
        if (isset($_SESSION['id'])) {
            
            $userid = $_SESSION['id'];

            $roomid = $_GET['book'];

            $title = $_GET['title'];
            $today = date("Y-m-d");
            $check_rebooking = mysqli_query($connection, "SELECT * FROM bookings WHERE room_id = '$roomid' AND booking_date = '$today'");

            if (mysqli_num_rows($check_rebooking) > 0) {

                $_SESSION['message'] = "<div class='alert alert-danger'><strong> Eroare! </strong> Cineva a rezerva deja camera solicitată!</div>";
                header("Location: available-rooms.php");

            } else {

                $book = mysqli_query($connection, "

                    INSERT 
                        INTO 
                            bookings
                                (
                                    user_id, 
                                    room_id, 
                                    title, 
                                    booking_date
                                )
                            VALUES
                                (
                                '$userid', 
                                '$roomid', 
                                '$title', 
                                now()
                                )

                    ");

                $_SESSION['message'] = "<div class='alert alert-success'><strong> Rezervare efectuată! </strong> Camera a fost rezervată cu succes!</div>";
                header("Location: available-rooms.php");
 
            }

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Vă rugăm să vă înregistrați înainte de a rezerva camera!</div>";
            header("Location: available-rooms.php");
        }

    }





?>        <?php include("includes/footer.php"); ?>
