<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        

       <div class="container">
		<h3>Panou administrare cont</h3>
		   </div>

        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4>Bine ai venit, <span class="text-gold"><?php echo $user['name']; ?> ! </span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        <?php include("includes/footer.php"); ?>