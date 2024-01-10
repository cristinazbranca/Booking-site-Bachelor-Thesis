<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
 <div class="swiper swiper-container">
    <div class="swiper-wrapper">
	<div class="swiper-slide">
      <img src="images/6.jpg" class="w-100 d-block">
    </div>
	<div class="swiper-slide">
      <img src="images/7.jpg" class="w-100 d-block">
    </div>
	<div class="swiper-slide">
      <img src="images/8.jpg" class="w-100 d-block">
    </div>
    </div>
  </div>
</div>

<div class="container-fluid px-lg-4 mt-4">
    <div class=" text-center">
       <h6><br><br>Pensiunea Casa Cristina</h6>
            <p>Te așteptăm în Inima Bucovinei să descoperi magia </p>
             <a href="available-rooms.php" class="btn theme_btn button_hover">Mai multe atracții turistice</a><br><br><br><br><br><br>
     </div>

 <section class="testimonial_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Pachete promoționale</h2>
                    <p>Citește mai multe detalii despre pachetele pe care vi le oferim</p>
                </div>
                <div class="testimonial_slider owl-carousel">
                    <div class="media testimonial_item">
                        <img class="rounded-circle" src="image/1.jpg" alt="" style="width: 50px; height: 50px;">
                        <div class="media-body">
                           


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
                        $getRooms = mysqli_query($connection, "SELECT * FROM updates");
                        if (mysqli_num_rows($getRooms) > 0) {
                            while ($room = mysqli_fetch_array($getRooms)) {
                            
                            ?>
                                <div class="accomodation_item text-center">
                            
                                    </div>
                                    <a href="index.php"><h4 class="sec_h4"><?php echo $room['title']; ?></h4></a><br><br>
                                    <h5><?php echo $room['updating']; ?><small><br></small></h5>
                                    
                                    <br><br><br>

                            </div>
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
            </div>
        </section>

        <?php include("includes/footer.php"); ?>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
 <script>
    var swiper = new Swiper(".swiper-container", {
       spaceBetween: 20,
       effect: "fade",
	   loop: true,
	   autoplay:{
		   delay: 3500,
		   disableOnInteraction: false
	   }
      });

      var swiper = new Swiper(".swiper-recenzii", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
		slidePerView:"3",
		loop:true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
		breakpoints:{
			320:{
				slidesPerView: 1, 
			},
			640:{
				slidesPerView: 1, 
			},
			768:{
				slidesPerView: 2, 
			},
			1024:{
				slidesPerView: 3, 
			},
		}
      });
    </script>