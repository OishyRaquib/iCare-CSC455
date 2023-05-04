<?php
  require("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="assets/css/admin_login.css">
</head>
<body>
  <div class="container">
    <h1>Admin Login Panel</h1>
    <form  method="POST">
      <label for="username">Username:</label>
      <input type="text"  name="username" >

      <label for="password">Password:</label>
      <input type="password"  name="password" >

      <button type="submit" name="send">Login</button>
    </form>
  </div>
<?php 
if(isset($_POST['send']))
{
    $query = "SELECT * FROM `admin_data` WHERE `admin_name`='$_POST[username]' AND `admin_password`='$_POST[password]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['adminloginid']=$_POST['username'];
        header("location:admin.html");
       
    }
    else
    {
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>

</body>
</html>