<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    $id = $_POST["id"];
    $type  = $_POST["type"];
    $info = mysqli_query($con,"SELECT * from order_history where id = $id");
    $row = mysqli_fetch_row($info);
    $pending = $row[5];
    if($pending==0){ ?>
        <script type="text/javascript">
            alert('bill already paid');
            window.location.replace("bill.php");
        </script>
    <?php }
    else{
    $user = $row[1];
    $amount = $row[2];

    mysqli_query($con,"INSERT into bill(user_id,type,type_id,amount) values($user,'$type',$id,$amount)");
    mysqli_query($con,"UPDATE order_history set pending = 0 where id = $id");
    $info2 = mysqli_query($con,"SELECT * from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info2);
    $bill_id = $row[0];
    $_SESSION["date"] = $row[1];
    $_SESSION["user"] = $user;
    $_SESSION["type"] = $type;
    $_SESSION["order_id"]= $id;
    $_SESSION["amount"] = $amount;
    $_SESSION["bill_id"] = $bill_id;

    header("Location:order_bill_detail.php");
}
?>
