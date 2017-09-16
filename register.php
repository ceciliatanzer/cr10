<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" || isset($_SESSION['login'])){
  header("Location: index.php"); // redirects to index.php
 }
 include_once 'dbconnect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);

  $lname = trim($_POST['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);  // remove whitespace
  $pass = strip_tags($pass); // remove html and php tags
  $pass = htmlspecialchars($pass); // special characters to html code

  $account = $_POST['account'];
  $account = strip_tags($account);
  $account = htmlspecialchars($account);
  

  // basic name validation
  if (empty($fname)) {
   $error = true;
   $fnameError = "Please enter your first name.";
  } else if (strlen($fname) < 3) {
   $error = true;
   $fnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $fnameError = "First name must contain lethers.";
  }

    if (empty($lname)) {
   $error = true;
   $lnameError = "Please enter your last name.";
  } else if (strlen($lname) < 3) {
   $error = true;
   $lnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
   $error = true;
   $lnameError = "Last name must contain lethers.";
  }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }

  if (empty($account)){
   $error = true;
   $accountError = "Please enter account number.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(firstName,lastName,userEmail,userPass,account_nr) VALUES('$fname','$lname','$email','$password','$account')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($fname);
    unset($lname);
    unset($email);
    unset($pass);
    unset($account);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }


 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
</head>
<style>
    #header{
      max-height: 100px;
      width: 100%;
      background-color: grey;
      font-family: cursive;
    }
    a {
      color: turquoise;
      font-size: 20px;
    }
   body{
    background-color: grey;
    color: black;
  }

</style>
<body>
  <?php echo "<div class=\"container-fluid\">";
            echo "<div class=\"row\" id=\"header\" >";
            echo "<h1>" . "Welcome to Big-E!"."</h1>";
            echo" </div>" ; //header 
  ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


             <h2>Register.</h2>
             <hr />

            <?php

   //old code error

   if(isset($errMSG)){
     echo "<div class=\"alert\">";
     echo $errMSG;
     echo "</div>";
   }
   ?>




             <input type="text" name="fname" class="form-control" placeholder="Enter first Name" maxlength="50" value="<?php echo $fname ?>" />

                <span class="text-danger"><?php echo $fnameError; ?></span>

            <input type="text" name="lname" class="form-control" placeholder="Enter last Name" maxlength="50" value="<?php echo $lname ?>" />

                <span class="text-danger"><?php echo $lnameError; ?></span>



             <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />

                <span class="text-danger"><?php echo $emailError; ?></span>
               





             <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $pass ?>"/>

                <span class="text-danger"><?php echo $passError; ?></span>

             

             <input type="number" name="account" class="form-control" placeholder="Enter account number" value="<?php echo $account ?>"/>

                <span class="text-danger"><?php echo $accountError; ?></span>

             <hr />


             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
             <hr />

             <a href="index.php">Login</a>


    </form>
</body>
</html>
<?php ob_end_flush(); ?>