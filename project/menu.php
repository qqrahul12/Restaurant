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
<?php
	    for($j=0;$j<$i;$j++){
	    	echo '<p class="dish-name">'.$name[$j].'</p>';

	    	echo '<p><span class="dish-price">Rs'.$price[$j].'</span></p>';
	    	echo '<p class="description">'.$description[$j].'</p>'; 
	    	echo '<hr>';

	    }
	}
?>
<a  href="order.php" >order online</a>
<a  href="book_table.php" >Book table</a><br>
<a  href="user_home.php">back to home</a><br>

</div>

</body>	

