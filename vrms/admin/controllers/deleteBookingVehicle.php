<?php
   include('C:\xampp\htdocs\VehicleRental\vrms\includes\dbconnection.php');

   $type = null;

   if($_POST['type'] == 'twowheeler'){
    $type = 'tblbookingtwowheeler';
   }else{
    $type = 'tblbookingcar';
   }

    $ret=mysqli_query($con,"delete from ".$type." where id ='".$_POST['booking_id']."'");
    if(!$ret){
        echo 'error!';
        die();
    }
?>