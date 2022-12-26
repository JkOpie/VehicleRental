<?php
   include('C:\xampp\htdocs\VehicleRental\vrms\includes\dbconnection.php');

   $type = null;

    $ret=mysqli_query($con,"delete from tblbrand where id ='".$_POST['brand_id']."'");
    if(!$ret){
        echo 'error!';
        die();
    }
?>