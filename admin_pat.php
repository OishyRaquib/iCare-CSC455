<?php
  require("dbconnection.php");
  if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

     $query = "INSERT INTO patient_details (pat_name, pat_age, pat_phone, pat_pass,pat_gender,pat_email)
     VALUES ('{$name}', '{$age}', '{$phone}', '{$password}','{$gender}','{$email}')";

    mysqli_query($con, $query) or die("Error inserting");
    
    header("location: http://localhost/iCare-CSC455/admin_panel.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Create Patients</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
        
<div class="mb-3">
    <label for="name">Name</label>
	<input type="text" name="name" autocomplete="off" placeholder="Patient name.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Age</label>
	<input type="text" name="age" autocomplete="off" placeholder="Patient age.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Phone</label>
	<input type="text" name="phone" autocomplete="off" placeholder="Patient Phone.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Email</label>
	<input type="text" name="email" autocomplete="off" placeholder="Patient Email.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Password</label>
	<input type="text" name="password" autocomplete="off" placeholder="Patient password.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Gender</label>
	<input type="text" name="gender" autocomplete="off" placeholder="Patient Gender.."class="form-control">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    
  </body>
</html>