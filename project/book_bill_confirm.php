<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    $book_id = $_SESSION["book_id"];
    $type  = $_SESSION["type"];
    $user = $_SESSION["user"];
    $amount = $_SESSION["total"];
    $count  = $_SESSION["count"];

    mysqli_query($con,"INSERT into bill(user_id,type,type_id,amount) values($user,'$type',$book_id,$amount)");
    mysqli_query($con,"UPDATE book_history set pending = 0 where id = $book_id");
    $info = mysqli_query($con,"SELECT avl_tables from vals");
    $upd = mysqli_fetch_row($info)[0]+$count;
    mysqli_query($con,"UPDATE vals set avl_tables = $upd");
    $info2 = mysqli_query($con,"SELECT id,day from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info2);
    $_SESSION['bill_id'] = $row[0];
    $_SESSION["date"] = $row[1];

    header("Location:book_bill_detail.php");
?>
