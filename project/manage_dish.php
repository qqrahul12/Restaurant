<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
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
	    $did = array();
	    while($row=$info->fetch_assoc()){
	    	$did[$i] = $row["did"];
	    	$name[$i]=$row["name"];
	    	$price[$i] = $row["price"];
	    	$description[$i] = $row["description"];
	    	$i++;
	    }
	?>
<head>
	
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<script type="text/javascript" src="js/redirect.js" ></script>
</head>
<body style="background-color: #888888">
	
<div class="card">
	<h1>Current Menu</h1><hr>
<?php
	    for($j=0;$j<$i;$j++){
	    	echo '<p class="dish-name">'.$did[$j]." ".$name[$j].'</p>';

	    	echo '<p><span class="dish-price">Rs'.$price[$j].'</span></p>';
	    	echo '<p class="description">'.$description[$j].'</p>'; 
	    	echo '<hr>';
	    }
	}
?>
<button type="submit" onclick="redirect('edit_menu.php')" >Edit Menu</button><br>
<a href="admin_home.php">back to home</a>
</div>
</body>	

