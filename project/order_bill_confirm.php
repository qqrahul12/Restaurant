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
    $info2 = mysqli_query($con,"SELECT id from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info2);
    $bill_id = $row[0];
}
?>

<head>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/input.css">
    <script type="text/javascript" src="js/redirect.js" ></script>
</head>
<body>
<div class="card">
    <h2>Your Bill</h2>
    <table align="center">
        <tr>
            <td>Bill id</td>
            <td><?php echo $bill_id; ?></td>
        </tr>
        <tr>
            <td>Bill Date</td>
            <td><?php echo(date("Y-m-d")); ?></td>
        </tr>
        <tr>
            <td>user id</td>
            <td><?php echo $user; ?></td>
        </tr>
        <tr>
            <td>Bill type</td>
            <td><?php echo $type; ?></td>
        </tr>
        <tr>
            <td>Order id</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>Bill amount</td>
            <td><?php echo $amount; ?></td>
        </tr>
    </table><hr>
    <button type="submit" onclick="redirect('admin_home.php')">Back to Home</button>
</div>
</body>