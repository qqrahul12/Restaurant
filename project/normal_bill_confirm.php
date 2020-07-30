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
    $info = mysqli_query($con,"SELECT id from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info);
    $bill_id = $row[0];
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
            <td>Bill type</td>
            <td><?php echo $type; ?></td>
        </tr>
        <tr>
            <td>Bill amount</td>
            <td><?php echo $amount; ?></td>
        </tr>
    </table><hr>
    <button type="submit" onclick="redirect('admin_home.php')">Back to Home</button>
</div>
</body>