<?php
$fname=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['phone'];
$age=$_POST['age'];
$pass=$_POST['pass'];
$gender = $_POST['gender'];



$link=mysqli_connect("localhost","root","","hospital");

if($link===false){
    
die("Could not connect".mysqli_connect_error());
}

$sql="INSERT INTO patient_details(pat_name, pat_phone,pat_age, pat_pass, pat_gender,pat_email) VALUES ('$fname','$contact','$age','$pass','$gender','$email')";
if (mysqli_query($link,$sql)){
    header("Location:login.html?error=Form submitted succesfully");
    exit();
}
else{
    echo"fail to execute" .mysqli_error($link);
}

mysqli_close($link);
?>
