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
	<h2>Create bill</h2>
	<button onclick="redirect('order_bill.php')">Online order Bill</button><br><br>
	<button onclick="redirect('normal_bill.php')">Normal Bill</button><br><br>
	<button onclick="redirect('book_bill.php')">Table booking Bill</button><br>
	<a href="admin_home.php">back</a>
</div>
<br>

<?php
	$info = mysqli_query($con,"SELECT count(id),sum(amount) from bill");
	$row = mysqli_fetch_row($info);
	$total_bill = $row[0];
	$total_amount = $row[1];

	$info = mysqli_query($con,"SELECT count(id),sum(amount) from bill where type = 'order' ");
	$row = mysqli_fetch_row($info);
	$order_bill = $row[0];
	$order_amount = $row[1];

	$info = mysqli_query($con,"SELECT count(id),sum(amount) from bill where type = 'normal' ");
	$row = mysqli_fetch_row($info);
	$normal_bill = $row[0];
	$normal_amount = $row[1];

	$info = mysqli_query($con,"SELECT count(id),sum(amount) from bill where type = 'Booking' ");
	$row = mysqli_fetch_row($info);
	$book_bill = $row[0];
	$book_amount = $row[1];	
?>

<div class="card">
	<h2>Bill stastics</h2>
	<table align="center">
		<tr>
			<td>Total Bills</td>
			<td><?php echo $total_bill ?></td>
		</tr>
		<tr>
			<td>Total Amount</td>
			<td><?php echo $total_amount ?></td>
		</tr>
		<tr>
			<td>Average Amount</td>
			<td><?php echo round($total_amount/$total_bill,2) ?></td>
		</tr>
	</table><hr>

	<table align="center">
		<tr>
			<td>Order Bills</td>
			<td><?php echo $order_bill ?></td>
		</tr>
		<tr>
			<td>Order Amount</td>
			<td><?php echo $order_amount ?></td>
		</tr>
		<tr>
			<td>Average Amount</td>
			<td><?php echo round($order_amount/$order_bill,2) ?></td>
		</tr>
	</table><hr>

	<table align="center">
		<tr>
			<td>Normal Bills</td>
			<td><?php echo $normal_bill ?></td>
		</tr>
		<tr>
			<td>Normal Amount</td>
			<td><?php echo $normal_amount ?></td>
		</tr>
		<tr>
			<td>Average Amount</td>
			<td><?php echo round($normal_amount/$normal_bill,2) ?></td>
		</tr>
	</table><hr>

	<table align="center">
		<tr>
			<td>Booking Bills</td>
			<td><?php echo $book_bill ?></td>
		</tr>
		<tr>
			<td>Booking Amount</td>
			<td><?php echo $book_amount ?></td>
		</tr>
		<tr>
			<td>Average Amount</td>
			<td><?php echo round($book_amount/$book_bill,2) ?></td>
		</tr>
	</table>
<a href="admin_home.php">back</a>
</div>
</body>