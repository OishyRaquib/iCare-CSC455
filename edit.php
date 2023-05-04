<?php
  require("dbconnection.php");
$pat_phone = $_GET['pat_phone'];
$query="SELECT * FROM `patient_details`WHERE pat_phone ='$pat_phone'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
    $name = $row['pat_name'];
    $age = $row['pat_age'];
    $original_phone = $row['pat_phone'];
    $password = $row['pat_pass'];
    $gender = $row['pat_gender'];
    $email = $row['pat_email'];

  if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

 $query = "UPDATE `patient_details` SET pat_name='$name', pat_age='$age', pat_phone='$phone', pat_pass='$password', pat_gender='$gender', pat_email='$email' WHERE pat_phone='$original_phone'";


    mysqli_query($con, $query) or die("Error Updating");
    
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
	<input type="text" name="name" autocomplete="off" placeholder="Patient name.."class="form-control" value="<?php echo $name;?>">
</div>
<div class="mb-3">
    <label for="name">Age</label>
	<input type="text" name="age" autocomplete="off" placeholder="Patient age.."class="form-control"value="<?php echo $age;?>">
</div>
<div class="mb-3">
    <label for="name">Phone</label>
	<input type="text" name="phone" autocomplete="off" placeholder="Patient Phone.."class="form-control"value="<?php echo $original_phone;?>">
</div>
<div class="mb-3">
    <label for="name">Email</label>
	<input type="text" name="email" autocomplete="off" placeholder="Patient Email.."class="form-control"value="<?php echo $email;?>">
</div>
<div class="mb-3">
    <label for="name">Password</label>
	<input type="text" name="password" autocomplete="off" placeholder="Patient password.."class="form-control"value="<?php echo $password;?>">
</div>
<div class="mb-3">
    <label for="name">Gender</label>
	<input type="text" name="gender" autocomplete="off" placeholder="Patient Gender.."class="form-control"value="<?php echo $gender;?>">
</div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
    
  </body>
</html>