<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    
    $type = 'normal';
    $amount = $_SESSION["total"];
    
    mysqli_query($con,"INSERT into bill(type,amount) values('$type',$amount)");
    $info = mysqli_query($con,"SELECT id,day from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info);
    $bill_id = $row[0];

    $_SESSION["bill_id"] = $bill_id;
    $_SESSION["type"]  = $type;
    $_SESSION["date"]  = $row[1];

    header("Location:normal_bill_detail.php");
?>
