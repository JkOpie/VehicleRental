<?php 
    include_once('C:\xampp\htdocs\VehicleRental\vrms\includes\dbconnection.php');
    // Set API endpoint URL
    $url = 'https://terminal.adasms.com/api/v1/send';
    session_start();
    // Set cURL options
    date_default_timezone_set('Asia/Singapore');
    $newTime = date("Y-m-d H:i",strtotime(date("Y-m-d H:i")." +1 minutes"));
    // var_dump($newTime);
    // die();

    $vid=$_POST['viewid'];
    $status=$_POST['status'];
    $remark=$_POST['remark'];
    $tcost=$_POST['cost'];
    $type = $_POST['type'];
    
    $table = null;$mobile=null;

    if($type == 'fourwheeler'){
        $table = 'tblbookingcar';
    }else{
        $table = 'tblbookingtwowheeler';
    }

    $bookingCarSql = "select * from $table where id = $vid";
    $result=mysqli_query($con, $bookingCarSql);

    while ($row=mysqli_fetch_array($result)) {

        $mobile = $row['MobileNumber'];

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                '_token' => '5bhpPOKJbNKHM4YnvNffSc0upoiivvQa',
                //'phone' => '60174132810',
                //'phone' => '60108414438',
                'phone' => $row['MobileNumber'],
                'message' => 'You Vehicle booking approved! Remaks: '.$remark,
                'send_at' => $newTime,
            ],
            CURLOPT_HTTPHEADER => [
                'Content-Type: multipart/form-data',
            ],
        ];

    }

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt_array($ch, $options);

    // Execute cURL request and get response
    $response = curl_exec($ch);
    $responseJson =json_decode($response, true);

    if (isset($responseJson['error'])) {
        $_SESSION['error'] = $mobile.' '.$responseJson['error'];
        header('Location: /VehicleRental/vrms/admin/view-'.$type.'-booking.php?viewid='.$vid);
        die();
    }

    $query=mysqli_query($con, "update $table set TotalCost='$tcost', Status='$status' ,Remark='$remark' where ID='$vid'");

    if ($query) {
       
        $_SESSION['success'] = 'Vehicle Booking has been updated.';
        header('Location: /VehicleRental/vrms/admin/view-'.$type.'-booking.php?viewid='.$vid);

    }else {
        // Print response
        echo $response;
    }

    // Close cURL session
    curl_close($ch);

  
?>