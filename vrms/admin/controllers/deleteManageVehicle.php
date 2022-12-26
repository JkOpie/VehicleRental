<?php
   include('C:\xampp\htdocs\VehicleRental\vrms\includes\dbconnection.php');

   $type = null;

   if($_POST['type'] == 'fourwheeler'){
    $type = 'tblvehiclecar';
   }else{
    $type = 'tblvehicle';
   }


    $ret=mysqli_query($con,"delete from ".$type ." where id ='".$_POST['vehicle_id']."'");
    if(!$ret){
        echo 'error!';
        die();
    }
?>