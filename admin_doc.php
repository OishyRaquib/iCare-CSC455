<?php
  require("dbconnection.php");
  if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $experience = $_POST['experience'];
    $department = $_POST['department'];
    $password = $_POST['password '];
    $description = $_POST['description'];

     $query = "INSERT INTO doctor_details (doc_name, doc_phone, doc_exp, doc_dept,doc_pass,doc_desc)
     VALUES ('{$name}', '{$contact}', '{$experience}', '{$department}','{$password}','{$description}')";

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

    <title>Create Doctor</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="post">
        
<div class="mb-3">
    <label for="name">Name</label>
	<input type="text" name="name" autocomplete="off" placeholder="Doctor name.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Contact</label>
	<input type="text" name="contact" autocomplete="off" placeholder="Doctor contact.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Experience</label>
	<input type="text" name="experience" autocomplete="off" placeholder="Doctor experience.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Department</label>
	<input type="text" name="department" autocomplete="off" placeholder="Doctor department.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Password</label>
	<input type="text" name="password" autocomplete="off" placeholder="Doctor password.."class="form-control">
</div>
<div class="mb-3">
    <label for="name">Description</label>
	<input type="text" name="description" autocomplete="off" placeholder="Doctor details.."class="form-control">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
    
  </body>
</html>