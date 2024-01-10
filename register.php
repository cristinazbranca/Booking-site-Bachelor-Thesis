<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>

        <div class="my-5 px-4">
			<h2 class=" fw-bold h-font text-center">Vrei să îți creezi un cont?</h2>
		</div>

        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-4 offset-4 formDesign">
                                
                        <form action="" method="POST">
                            <?php

                                if (isset($_POST['registerbtn'])) {
                                    
                                  

                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $password = $_POST['password'];

                                    $number = preg_match('@[0-9]@', $password);
                                    $uppercase = preg_match('@[A-Z]@', $password);
                                    $lowercase = preg_match('@[a-z]@', $password);
                                    $specialChars = preg_match('@[^\w]@', $password);


                                    $name = mysqli_real_escape_string($connection, $_POST['name']);
                                    $email = mysqli_real_escape_string($connection, $_POST['email']);
                                    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
                                    $password = mysqli_real_escape_string($connection, $_POST['password']);
                                    $password = sha1(md5($password));
                                    


                                    


                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $errors[] = "Please Enter a valid Email";
                                    }

                                    if (strlen($phone) < 10 || strlen($phone) > 12) {
                                        $errors[] = "trebuie să introduci un număr valabil de telefon.";
                                    }

                                    $check = mysqli_query($connection, "SELECT email FROM users WHERE email = '$email'");

                                    if (mysqli_num_rows($check) > 0) {
                                        $errors[] = "Există deja un cont cu acest email.Poți încerca cu unul neutilizat!";
                                    }

                                    if(strlen($password) < 6 || !$number || !$lowercase) {
                                        $errors[] = "Parola trebuie să conțină cel puțin 6 caractere.Trebuie să fie formată din cel puțin o literă și o cifră";
                                    } 


                                    if (!empty($errors)) {
                                        
                                        foreach ($errors as $error) {
                                            ?>

                                            <div class="alert alert-danger">
                                                <strong>Eroare! </strong> <?php echo $error; ?>
                                            </div>

                                            <?php
                                        }

                                    } else {

                                       

                                        $insert = mysqli_query($connection, "INSERT INTO users(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')");

                                        if ($insert) {
                                            
                                            echo '
                                                <div class="alert alert-success">
                                                    <strong>Perfect! </strong> Te-ai înregistrat cu succes! <a href="login.php"><strong>Login</strong></a>
                                                </div>
                                            ';
                                            
                                        } else {

                                            echo '
                                                <div class="alert alert-danger">
                                                    <strong>Eroare! </strong> Ceva nu a mers bine! Mai încearcă!
                                                </div>
                                            ';

                                        }

                                    }

                                }   

                            ?>
                            <div class="form-group">
                                <label for="">Numele</label>
                                <input type="text" name="name" value="<?php echo (isset($_POST['name']))? $_POST['name'] : ''; ?>" placeholder="Numele tău" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?php echo (isset($_POST['email']))? $_POST['email'] : ''; ?>" placeholder="Contul de Email" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Număr de telefon</label>
                                <input type="number" name="phone" value="<?php echo (isset($_POST['phone']))? $_POST['phone'] : ''; ?>" placeholder="Numărul de telefon" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Parola</label>
                                <input type="password" name="password" value="<?php echo (isset($_POST['password']))? $_POST['password'] : ''; ?>" placeholder="Parola" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="registerbtn" class="btn btn-warning btn-block btn-lg text-white"><br><br>
                                <a href="login.php" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Ai deja un cont?</a>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Perfect!</h2>
                        <p> Mesajul a fost trimis cu succes!</p>
                    </div>
                </div>
            </div>
        </div>



        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Scuze!</h2>
                        <p>Ceva nu a funcționat! </p>
                    </div>
                </div>
            </div>
        </div>

        
        
<?php include("includes/footer.php"); ?>