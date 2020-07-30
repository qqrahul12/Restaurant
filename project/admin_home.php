<?php

    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }
    $conn = mysqli_connect("localhost","root","","RoyalCafe");
    $aid = $_SESSION["aid"];
    $info = mysqli_query($conn,"SELECT * from admin where id = $aid");
    $row = mysqli_fetch_row($info);
    $name = $row[1];
?>

<head>
	<link rel="stylesheet" href="css/card.css">
<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/rc.css">
	<script type="text/javascript" src="js/redirect.js"></script>
</head>
<body>
<body style="background-color: #888888">
<div class="card">
	<h2 style="text-align: left">Hello <?php echo $name?></h2>

	<p>check all the orders and order stastics.</p>
	<button onclick="redirect('manage_order.php')" type="submit">Manage Orders</button>
	<hr>

	<p>check all the bookings and booking stastics</p>
	<button onclick="redirect('manage_booking.php')" type="submit">Manage Booking</button>
	<hr>

	<p>change in menu such as price change of dishes, add new dishes and remove unavailable dishes.</p>
	<button onclick="redirect('manage_dish.php')" type="submit">Manage Menu</button>
	<hr>

	<p>Generate a bill for normal customers,online orders and reserved customers.</p>
	<button onclick="redirect('bill.php')" type="submit">Create bill</button>
	<hr>

	<p>check all users count,bookings,orders,user stastics</p>
	<button onclick="redirect('manage_user.php')" type="submit">Manage users</button>
	<hr>

	<button onclick="redirect('alogout.php')" type="submit">logout</button>
</div>
</body>
