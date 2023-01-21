<?php require "includes/head.php"; ?>

<?php require "includes/dbcon.php"; ?>

<?php

//user the password_verify function to check for the correct password
if(isset($_POST['submit'])){

  if($_POST['email'] == '' OR $_POST['password'] == ''){
    echo 'Some inputs are empty';

  } else {
      $email = $_POST['email'];
      $password = $_POST['password'];



      $login = $conn->query("SELECT * FROM users WHERE email=?");

      $login->execute($_POST['email']);

      $data = $login->fetch(PDO::FETCH_ASSOC);


      if($login->rowCount() > 0 ){
        
        if(password_verify($password, $data['password_hash'])){

          $_SESSION['username'] = $data['username'];
          $_SESSION['email'] = $data['email'];

          header("Location: index.php");

          //echo "log in successfull";
        } else {
          echo "email or password is incorrect";
        }


      } else {
        echo "email or password is incorrect";
      }


  }
}


?>



<main class="form-signin w-50 m-auto">
  <form method="post" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput"   placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <!--
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="user.name">
      <label for="floatingInput">Username</label>
    </div>

        -->

    <div class="form-floating">
      <input name="password" type="password" class="form-control"  id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>


<!DOCTYPE html>
<html>
<?= include_once 'includes/head.php' ?>

<body class="form-signin w-50 m-auto">
   

    <form method="POST" action="login.php">
        
        <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>
        <div class="form-floating">
            <input name="username" type="text" class="form-control" value="<?= isset($username) ? $username : '' ?>" id="floatingInput"   placeholder="name@example.com">
            <label for="floatingInput">Email address or username</label>
            <?php
            if (isset($validation) && isset($validation['username'])) {
            ?>
            <span><?= $validation['username'] ?></span>
            <?php
            }
            ?>

        <!-- </div>
             <div>
            <label>Username or email address</label>
            <input type="text" name="username" value="<?= // isset($username) ? $username : '' ?>" />
            <?php
           // if (isset($validation) && isset($validation['username'])) {
            ?>
  
            <?php
          //  }
            ?>
        </div> -->
        <div class="form-floating">
            <input name="password" type="password" class="form-control" value="<?= isset($password) ? $password : '' ?>" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            <?php
            if (isset($validation) && isset($validation['password'])) {
            ?>
            <span><?= $validation['password'] ?></span>
            <?php
            }
            ?>
        </div>

        <!--<div>
            <label>Password</label>
            <input type="password" name="password" value="<?= //isset($password) ? $password : '' ?>" />
            <?php
           // if (isset($validation) && isset($validation['password'])) {
            ?>
            <!-- <span><?= //$validation['password'] ?></span> -->
            <?php
            //}
            ?>
        </div> 
        <input type="submit" value="Log in" /> -->

        
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
    </form>
    <?= include_once 'includes/footer.php' ?>
</body>
</html>
