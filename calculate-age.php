<?php
    $dateOfBirth = $_POST['dob'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    if($diff){
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>1, 'msg'=>$diff->format('%y').' Years,'.$diff->format('%m').' months,'.$diff->format('%d').' days'));
        exit;
    }else{
        header('Content-Type: application/json');
        echo json_encode(array('flag'=>0, 'msg'=>'something went wrong!'));
        exit;
    }
?>
