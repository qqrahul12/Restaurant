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
    <h2>Booking Details</h2>
    <table align="center">
        <tr>
            <td>Booking id</td>
            <td><?php echo $_SESSION["book_id"];?></td>
        </tr>
        <tr>
            <td>Number of tables</td>
            <td><?php echo $_SESSION["count"];?></td>
        </tr>
        <tr>
            <td>date</td>
            <td><?php echo $_SESSION["dates"];?></td>
        </tr>
    </table><br>
    <a  href="history.php#2" >view booking</a>
    <a  href="user_home.php" >back to home</a>
</div>
</body>
<?php
    unset($_SESSION["book_id"]);
    unset($_SESSION["count"]);
    unset($_SESSION["dates"]);
?>