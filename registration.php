<!DOCTYPE HTML>

<html>

<head>
  <title>Registration</title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>



<?php

   include "database.php"; 

if(isset($_POST['op'])){
    $op = $_POST['op'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass1'];

    if ($op=="save")
    {
        // echo "$name - $email - $phone - $pass";

         $sql = "INSERT INTO users (name,email,phone,password)
                  VALUES ('$name','$email','$phone',PASSWORD('$pass'))";
         mysqli_query($link,$sql);

         if (mysqli_error($link))  echo "MySQL Error: " . mysqli_error($link);
         else  {
             ?>
                <div class="container p-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Success!</div>
                                <div class="panel-body">Your registration was successful.</div>
                            </div>
                </div>
             <?php
             //echo "Success!";
             header("location: login.php");
         }

         //exit;

    }
}

?>

<div class="container p-3">

    <div class="panel panel-default">
    <div class="panel-heading">Registration form</div>
    <div class="panel-body">

        <form method=POST action=registration.php>

            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" required/>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control"  name="email" required/>
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input type="text" class="form-control"  name="phone" required/>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control"  required name="pass1" onChange="form.pass2.pattern=this.value" />
            </div>

            <div class="form-group">
                <label>Password confirmation:</label>
                <input type="password" class="form-control"  name="pass2" required />
            </div>

            <div class="form-group">
                <label>Confirm</label>
                <input type="submit" class="btn btn-primary" value="Save data" />
            </div>

            <input type="hidden" name="op" value="save" />

        </form>
     </div>
     </div>

</div>

</body>

</html>