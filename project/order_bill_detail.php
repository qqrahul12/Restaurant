<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    $order_id = $_SESSION["order_id"];
    $type  = $_SESSION["type"];
    $user = $_SESSION["user"];
    $amount = $_SESSION["amount"];
    $bill_id =  $_SESSION["bill_id"];
    $date = $_SESSION["date"];
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
            <td><?php echo $date; ?></td>
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
            <td><?php echo $order_id; ?></td>
        </tr>
        <tr>
            <td>Bill amount</td>
            <td><?php echo $amount; ?></td>
        </tr>
    </table><hr>
    <button type="submit" onclick="redirect('admin_home.php')">Back to Home</button>
</div>
</body>

<?php
    unset($_SESSION["order_id"]);
    unset($_SESSION["type"]);
    unset($_SESSION["user"]);
    unset($_SESSION["total"]);
    unset($_SESSION["bill_id"]);
    unset($_SESSION["date"]);

?>