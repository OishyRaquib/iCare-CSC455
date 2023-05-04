<?php
$contact=$_POST['phone'];
$pass=$_POST['pass'];
$type=$_POST['type'];




$link=mysqli_connect("localhost","root","","hospital");

if($link===false){
    
die("Could not connect".mysqli_connect_error());
}

if($type=="Patient")
{
$res=mysqli_query($link,"SELECT* FROM patient_details where pat_phone='$contact' AND pat_pass='$pass'");
$count=mysqli_num_rows($res);
if($count==1)
{
    $url = "index.php?phone=" . urlencode($contact);
    header("Location:". $url);
}
else{
    header("Location:login.html?error=user doesn't exist");
   exit();
}
mysqli_close($link);
}


else if($type=="Doctor")
{
$res=mysqli_query($link,"SELECT* FROM doctor_details where doc_phone='$contact' AND doc_pass='$pass'");
$count=mysqli_num_rows($res);
if($count==1)
{
    $url = "doctor_dashboard.html?phone=" . urlencode($contact);
    header("Location:". $url);
}
else{
    header("Location:login.html?error=user doesn't exist");
   exit();
}
mysqli_close($link);
}

else if($type=="Admin") {  
    
        header('Location: admin_login.php'); 
    }



?>






