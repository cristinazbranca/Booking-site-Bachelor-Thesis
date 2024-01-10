<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle"></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Acasa</a></li>
                        <li class="active">Panou de administrare</li>
                    </ol>
                </div>
            </div>
        </section>
 
        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4><span class="text-gold">Profilul</span></h4>
                            <div>
                                <form action="" method="POST">
                                    <?php

                                        if (isset($_POST['updatebtn'])) {
                                            
                                          

                                            $name = $_POST['name'];
                                            $phone = $_POST['phone'];
                                            $password = $_POST['password'];

                                      

                                            $name = mysqli_real_escape_string($connection, $_POST['name']);
                                            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
                                            $password = mysqli_real_escape_string($connection, $_POST['password']);
                                            $password = md5($password);

                                            if (strlen($phone) < 10 || strlen($phone) > 12) {
                                                
                                                ?>

                                                    <div class="alert alert-danger">
                                                        <strong>Eroare! </strong> Te rog să inserezi un număr valid de telefon.
                                                    </div>

                                                    <?php

                                            } else {

                                                $userid = $_SESSION['id'];

                                                $update = mysqli_query($connection, "
                                                    UPDATE users 
                                                        SET 
                                                            name = '$name', 
                                                            phone = '$phone', 
                                                            password = '$password' 
                                                            WHERE id = '$userid'
                                                    ");

                                                if ($update) {
                                                    
                                                    echo '
                                                        <div class="alert alert-success">
                                                            <strong>Alert! </strong> Profilul a fost modificat cu succes!
                                                        </div>
                                                    ';
                                                   
                                                } else {

                                                    echo '
                                                        <div class="alert alert-danger">
                                                            <strong>Eroare!</strong> Ceva nu a funcționat. Te rog să mai încerci!
                                                        </div>
                                                    ';

                                                }

                                            }

                                        }   

                                    ?>
                                    <div class="form-group">
                                        <label for="">Nume</label>
                                        <input type="text" name="name" value="<?php echo (isset($user['name']))? $user['name'] : ''; ?>" placeholder="Numele tău" class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="<?php echo (isset($user['email']))? $user['email'] : ''; ?>" placeholder=" Email" class="form-control form-control-lg" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Telefon</label>
                                        <input type="number" name="phone" value="<?php echo (isset($user['phone']))? $user['phone'] : ''; ?>" placeholder="Număr de telefon" class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Parolă</label>
                                        <input type="password" name="password" value="<?php echo (isset($user['password']))? $user['password'] : ''; ?>" placeholder="Parola " class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="updatebtn" value="Modifică profilul" class="btn btn-warning btn-block btn-lg text-white">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("includes/footer.php"); ?>