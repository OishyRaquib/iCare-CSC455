<?php
    $link=mysqli_connect("localhost","root","","hospital");
    if(!$link){  
        die("Unable to connect to the database".mysqli_connect_error());
    }
      if(isset($_GET['del_id'])){
        $id=$_GET['del_id'];
        $d_id=$_GET['user_phone'];
        $sql="DELETE FROM `prescription` WHERE p_patphone='$id'";
        $result=mysqli_query($link, $sql);
        if($result){
        //   deleteReport();
        ?>
        <html>
            <a href="viewReport.php?user_phone=<?php echo $d_id;?>"></a>
        </html>
<?php     
        }
        else{
          die(mysqli_error($link));
        }
      }
?>