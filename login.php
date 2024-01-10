<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        

      

        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-4 offset-4 formDesign">
                        
                        <form action="" method="POST">
                            <?php

if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
}

                         
                            if (isset($_POST['loginbtn'])) {
                                
                                $email = mysqli_real_escape_string($connection, $_POST['email']);
                                $password = mysqli_real_escape_string($connection, $_POST['password']);
                                $password = sha1(md5($password));

                                
                              

                                $check = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");

                                if (mysqli_num_rows($check) > 0) {
                                    
                                  
                                    $user = mysqli_fetch_array($check);

                                    

                                    if ($password == $user['password']) {
                                  
                                        $_SESSION['id'] = $user['id'];

                                       

                                        header("Location: dashboard.php");


                                    } else {
                                        echo "<div class='alert alert-danger'>Parolă incorectă!</div>";
                                    }

                                } else {
                                    echo "<div class='alert alert-danger'>Email introdus incorect!</div>";
                                }

                            }

                            ?>
                            <div class="form-group">
							
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Adresa ta de email" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Parolă</label>
                                <input type="password" name="password" placeholder="Parola" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="loginbtn" value="Conectare" class="btn btn-warning btn-block btn-lg text-white"><br><br>
                                <a href="register.php" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Nu ai cont?</a>
                                 <a href="forgot.php" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Ai uitat parola?</a>
                            </div>
							
                        </form>

                    </div>

                </div>
            </div>
        </section>
      
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Închide">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Mulțumim!</h2>
                        <p>Mesajul a fost trimis cu succes!</p>
                    </div>
                </div>
            </div>
        </div>



        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Închide">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Scuze!</h2>
                        <p> Ceva nu funcționat </p>
                    </div>
                </div>
            </div>
        </div>
     
        
<?php include("includes/footer.php"); ?>