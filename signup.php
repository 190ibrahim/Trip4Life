<?php require "includes/head.php"; ?>
<?php require "includes/dbcon.php"; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = [];
    // First name validation
    if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
        $validation['firstname'] = 'First name field is required.';
    } else {
        $firstname = $_POST['firstname'];
    }

    // Last name validation
    if (!isset($_POST['lastname']) || $_POST['lastname'] === '') {
        $validation['lastname'] = 'Last name field is required.';
    } else {
        $lastname = $_POST['lastname'];
    }

    // Password validation
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $validation['password'] = 'Password field is required.';
    } else if (!isset($_POST['password_confirm']) || $_POST['password'] !== $_POST['password_confirm']) {
        $validation['password_confirm'] = 'Password and password confirmation must match.';
        $validation['password'] = 'Password and password confirmation must match.';
    } else if (strlen($_POST['password']) < 10) {
        $validation['password'] = 'Password must have a length of 10 at least.';
    } else {
        $password = $_POST['password'];
        $confirm = $_POST['password_confirm'];
    }

    // Validate date of birth
    if (!isset($_POST['birthday']) || $_POST['birthday'] === '') {
        $validation['birthday'] = 'Date of birth field is required.';
    } else {
        $epoch = strtotime($_POST['birthday']);
        if (!$epoch) {
            $validation['birthday'] = 'Date of birth must be a valid date.';
        } else if ($epoch > time() || $epoch < strtotime('-150 years', time())) {
            $validation['birthday'] = 'Date of birth must be a valid date.';
        } else {
            $birthday = $_POST['birthday'];
        }
    }

    // Username validation
    if (!isset($_POST['username']) || $_POST['username'] === '') {
        $validation['username'] = 'Username field is required.';
    } else {
        $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $query->execute([$_POST['username']]);
        $usernames = $query->fetchAll();

        if (is_array($usernames) && count($usernames) > 0) {
            $validation['username'] = 'This username is already registered.';
        } else {
            $username = $_POST['username'];
        }
    }

    // Email validation
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $validation['email'] = 'Email address field is required.';
    } else {
        $valid = preg_match('/[0-z]+[@][0-z]+[.][A-z]+/', $_POST['email']) === 1;
        if (!$valid) {
            $validation['email'] = 'Email address must have a valid email format.';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $query->execute([$_POST['email']]);
            $emails = $query->fetchAll();

            if (is_array($emails) && count($emails) > 0) {
                $validation['email'] = 'This email is already registered.';
            } else {
                $email = $_POST['email'];
            }
        }
    }

    // Sex validation
    if (!isset($_POST['sex']) || $_POST['sex'] === '') {
        $validation['sex'] = 'Sex field is required.';
    } else {
        switch ($_POST['sex']) {
            case 'Female':
                $sexDbval = 'Female';
                break;
            case 'Male':
                $sexDbval = 'Male';
                break;
            case 'Other':
                $sexDbval = null;
                break;
            default:
                $validation['sex'] = 'Sex field must contain one of the options.';
                break;
        }
        if (isset($sexDbval)) {
            $sex = $_POST['sex'];
        }
    }

    // License validation
    if (!isset($_POST['license']) || $_POST['license'] !== '1') {
        $validation['license'] = 'License agreement must be accepted.';
    } else {
        $license = $_POST['license'];
    }

    // Phone number validation
    if (!isset($_POST['phonenumber']) || $_POST['phonenumber'] == '') {
        $validation['phonenumber'] = 'Phone number must be filled in';
    } else {
        $phonenumber = $_POST['phonenumber'];
    }


    if (count($validation) === 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $pdo->prepare('INSERT INTO users(username, email, password_hash, firstname, lastname, birthday, sex, phonenumber, license_accepted, verified) VALUES(?, ?, ?, ?, ?, ?, ?, ?, 1, 1)');
        $query->execute([$username, $email, $hash, $firstname, $lastname, $birthday, $sex, $phonenumber]);

        //Pull out the last inserted ID THEN set sessions for it
        $user_id = $pdo->lastInsertId();
        $query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$user_id]);
        $user = $query->fetch();

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['sex'] = $user['sex'];
        $_SESSION['phonenumber'] = $user['phonenumber'];
        $_SESSION['birthday'] = $user['birthday'];
        $_SESSION['email'] = $user['email'];

        echo "<br><br><br><br><h6> New user successfully registered</h6>";
        header("Location: index.php");
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="icon" href="pictures\favicon (1).ico">

    <!-- css -->

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--   Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!--   Awesome fonts -->
    <script src="https://kit.fontawesome.com/de7c5bb96e.js" crossorigin="anonymous"></script>
</head>

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

</html>
<br><br>
<br><br>
<br><br>
<br><br>
<?php require "includes/footer.php"; ?>