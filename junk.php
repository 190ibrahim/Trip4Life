<header id="header" class="header-section">
    <h1 class="header-title">Your sailing adventure starts here!</h1>
    <div class="experience">
        <h3 class="experience-title">Experience required</h3>
        <p>Know how to swim</p>
        <p>Above 18 years old</p>
        <p>Have boat driving lisence upto 40ft</p>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel-container">
        <div class="carousel">
            <?php
            $query = $pdo->prepare("SELECT * FROM trips");
            $query->execute();
            $trips = $query->fetchAll();
            foreach ($trips as $trip) {
                $trip_title = $trip['trip_title'];
                $trip_image = $trip['trip_image'];
                $trip_id = $trip['id'];
            ?>
                <div class="carousel-item active">
                    <img src="pictures\<?php echo $trip_image
                                        ?>" alt="<?php echo $trip_title
                                                    ?>">
                    <div class="carousel-caption">
                        <h3><?php echo $trip_title
                            ?></h3>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>



<body>
    <br><br>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register</h3>


                            <form action="signup.php" method="POST">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input name="firstname" type="text" id="firstName" class="form-control form-control-lg" value="<?= isset($firstname) ? $firstname : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['firstname'])) {
                                            ?>
                                                <span><?= $validation['firstname'] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input name="lastname" type="text" id="lastName" class="form-control form-control-lg" value="<?= isset($lastname) ? $lastname : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['lastname'])) {
                                            ?>
                                                <span><?= $validation['lastname'] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthday" class="form-label">Birthday</label>
                                            <input name="birthday" type="date" class="form-control form-control-lg" id="birthday" value="<?= isset($birthday) ? $birthday : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['birthday'])) {
                                            ?>
                                                <span><?= $validation['birthday'] ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <h6 class="mb-2 pb-1">Gender: </h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="femaleGender" value="Female" />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="maleGender" value="Male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="otherGender" value="Other" />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                        <?php
                                        if (isset($validation) && isset($validation['sex'])) {
                                        ?>
                                            <span><?= $validation['sex'] ?></span>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailaddress">Email</label>
                                            <input name="email" type="email" id="emailaddress" class="form-control form-control-lg" value="<?= isset($email) ? $email : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['email'])) {
                                            ?>
                                                <span><?= $validation['email'] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="phonenumber">Phone Number</label>
                                            <input name="phonenumber" type="text" id="phonenumber" class="form-control form-control-lg" value="<?= isset($phonenumber) ? $phonenumber : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['phonenumber'])) {
                                            ?>
                                                <span><?= $validation['phonenumber'] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <h6 class="mb-2 pb-1">Please chose a user name </h6>
                                            <label class="form-label" for="username">Username</label>
                                            <input name="username" type="text" id="username" class="form-control form-control-lg" value="<?= isset($username) ? $username : '' ?>" />
                                            <?php
                                            if (isset($validation) && isset($validation['username'])) {
                                            ?>
                                                <span><?= $validation['username'] ?></span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="register-contianer">I accept the license agreement.
                                                <input type="checkbox" name="license" value="1" />
                                                <span class="checkmark"></span>
                                            </label>
                                            <?php
                                            if (isset($validation) && isset($validation['license'])) {
                                            ?>
                                                <span><?= $validation['license'] ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="password">Password</label>
                                                <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Atleast 10 characters" />
                                                <?php
                                                if (isset($validation) && isset($validation['password'])) { ?>
                                                    <span><?= $validation['password'] ?></span>
                                                <?php } ?>

                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <label class="form-label" for="password_confirm">Confirm
                                                    password</label>
                                                <input name="password_confirm" type="password" id="password_confirm" class="form-control form-control-lg" />
                                                <?php
                                                if (isset($validation) && isset($validation['password_confirm'])) { ?>
                                                    <span><?= $validation['password_confirm'] ?></span>
                                                <?php } ?>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <input name="submit" class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>