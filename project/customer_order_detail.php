<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("Location:login.php");
    }
?>
<head>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/rc.css">
</head>
<body>
<div class="card">
    <h2>Order Details</h2>
    <table align="center">
        <tr>
            <td>Order id</td>
            <td><?php echo $_SESSION["order_id"];?></td>
        </tr>
        <tr>
            <td>date</td>
            <td><?php echo $_SESSION["dates"];?></td>
        </tr>
        <tr>
            <td>Order Amount</td>
            <td><?php echo $_SESSION["total"];?></td>
        </tr>
        <tr>
            <td>date</td>
            <td><?php echo $_SESSION["description"];?></td>
        </tr>
    </table><br>
    <a  href="history.php#1" >view order</a>
    <a  href="user_home.php" >back to home</a>
</div>
</body>
<?php
    unset($_SESSION["order_id"]);
    unset($_SESSION["total"]);
    unset($_SESSION["dates"]);
    unset($_SESSION["description"]);
?>