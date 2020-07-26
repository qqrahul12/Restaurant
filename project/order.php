<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
	else{
	    $info = mysqli_query($con,"SELECT * from dish");
	    $i = 0;
	    $name = array();
	    $price = array();
	    $description = array();
	    while($row=$info->fetch_assoc()){
	    	$name[$i]=$row["name"];
	    	$price[$i] = $row["price"];
	    	$description[$i] = $row["description"];
	    	$i++;
	    }
	?>
<head>
	
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<script type="text/javascript" src="js/order.js"></script>
</head>
<body style="background-color: #888888">
<div class="card">
<form action="payment.php" method="post">
<?php
	    for($j=0;$j<$i;$j++){
	    	echo '<p class="dish-name">'.$name[$j].'</p>';
	    	echo '<button class="minus" type ="button" onclick="decrease('.$j.','.$price[$j].')">-</button>';
	    	echo '<input type="hidden" name="qunty'.$j.'" min="0" max="10" step="1" value="0" class="qunty" >  ';
	    	echo '<p class="qty">0</p>';
	    	echo '<button class="plus" type ="button" onclick="increase('.$j.','.$price[$j].')">+</button>';
	    	echo '<p><span class="dish-price">Rs'.$price[$j].'</span></p>';
	    	echo '<p class="description">'.$description[$j].'</p>'; 
	    	echo '<hr>';

	    }
	}
?>
<button class="button" type="submit">Checkout</button>
</form>

<a  href="book_table.php">Book table</a><br>
<span>check<a href="history.php#1">Current Orders</a><a href="history.php#3" >Previous Orders</a></span><br> 
<a  href="user_home.php" >back to home</a>
</div>

</body>	

