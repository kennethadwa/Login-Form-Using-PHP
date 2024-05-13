<?php
require_once('database.php');

$con = new database();
 
if(isset($_POST['signup'])) {
  $username = $_POST['user_name'];
  $password = $_POST['user_pass'];
  $confirm = $_POST['confirm_pass'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $birthday = $_POST['birthday'];
  $sex = $_POST['sex'];

  if($password == $confirm) {
    if($con -> signup($username, $password, $first_name, $last_name, $birthday, $sex)){
        header('location: login.php');
    } else {
        $error_message = "Username already exists. Please choose a different username";
}

} else {
        $error_message = "Password did not match";
}
}
 
?>
 

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp Page</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
    }
  </style>
</head>
<body>


<div class="container-fluid login-container rounded shadow">
  <h2 class="text-center mb-4">Register Now</h2>
  <form method="post">

    <!-- FIST NAME -->
  <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
    </div>

    <!-- LAST NAME -->
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
    </div>

    <!-- BIRTHDAY -->
    <div class="form-group">
      <label for="birthday">Birthday:</label>
      <input type="date" class="form-control" name="birthday">
    </div>
    <div class="form-group">
      <label for="sex">Sex:</label>
      <select class="form-control" name="sex">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select>
    </div>

    <!-- USERNAME -->
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control"  name = 'user_name' placeholder="Enter Username">
    </div>

    <!-- PASSWORD -->
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control"  name = 'user_pass' placeholder="Enter Password">
    </div>

    <!-- CONFIRM PASSWORD -->
    <div class="form-group">
      <label for="password">Confirm Password:</label>
      <input type="password" class="form-control"  name = 'confirm_pass' placeholder="Confirm Password">
    </div>
    <div class="container">
      <div class="row gx-1">
        <div class="col"> 

             <input type="submit" id="signup" class = "btn btn-danger btn-block" name = "signup" value = "Sign Up">

        </div>
      </div>
    </div>
  </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>