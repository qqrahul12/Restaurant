<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
?>

<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/input.css">
	<script type="text/javascript" src="js/redirect.js" ></script>
</head>
<body>
<div class="card">
    <h2>Booking Bill</h2>
    <form action="table_bill.php" method="POST">
        <label for="order_id" >Booking id</label><br>
        <input type="number" name="book_id" id = "order_id" min=1 class="ipt" required><br>
        <input type="hidden" name="type" value="order">
        <button type="submit">Create Bill</button>
    </form>
</div>
</body>