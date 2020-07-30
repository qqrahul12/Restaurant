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
	    while($row=$info->fetch_assoc()){
	    	$name[$i]=$row["name"];
	    	$price[$i] = $row["price"];
	    	$description[$i] = $row["description"];
	    	$i++;
	    }

	    $quantity = array();

	    for($j=0;$j<$i;$j++){
	    	$p = 'qunty'.$j;
	    	$quantity[$j]= $_POST["qunty".$j];
	    }

	}
?>

<head>
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/card.css">
	<script type="text/javascript" src="js/redirect.js"></script>
</head>

<body style="background-color: #888888">
<div class="card">
<?php
	$total = 0;
	for($j=0;$j<$i;$j++){
		if($quantity[$j]>0){
		echo '<p style="display: inline-block;">'.$quantity[$j].'*'.$name[$j].'</p>';
		echo '<p style="float: right; margin-right:10px">'.$price[$j]*$quantity[$j]. '</p>';
		echo '<br>';
		$total = $total+$quantity[$j]*$price[$j];
		}
	}
	$_SESSION["total"] = $total;
	echo '<hr>';
	echo '<button class="button" onclick=redirect("normal_bill_confirm.php")>Create bill for '.$total.'</button>';
?>
</div>
</body>
