<?php
require("dbconnection.php");

if (isset($_GET['pat_phone'])) {
    $pat_phone = $_GET['pat_phone'];

    $query = "DELETE FROM patient_details WHERE pat_phone = '{$pat_phone}'";
    mysqli_query($con, $query) or die("Error deleting");

    header("Location: http://localhost/iCare-CSC455/admin_panel.php");
}
elseif(isset($_GET['doc_phone'])) {
    $doc_phone = $_GET['doc_phone'];

    $query = "DELETE FROM doctor_details WHERE doc_phone = '{$doc_phone}'";
    mysqli_query($con, $query) or die("Error deleting");

    header("Location: http://localhost/iCare-CSC455/admin_panel.php");
}
elseif(isset($_GET['app_pat_phone'])) {
    $app_pat_phone = $_GET['app_pat_phone'];

    $query = "DELETE FROM appointment_details WHERE app_pat_phone = '{$app_pat_phone }'";
    mysqli_query($con, $query) or die("Error deleting");

    header("Location: http://localhost/iCare-CSC455/admin_panel.php");
}

else {
    echo "Error: No phone number provided.";
}
?>