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
	<style type="text/css">
		textarea {
			border-color: #0080FF;
  			border-radius: 5px;
  			resize: none;
  			font-size: 150%;
		}
	</style>
</head>
<body>
<div class=card>
	<h2>Add Dish</h2>
	<form action="add_dish.php" method="post" >
		<label for="dish_name">dish name</label><br>
		<textarea name="dish_name" id="dish_name" rows="2" cols="20" required></textarea> <br><br>

		<label for="dish_price">Price</label><br>
		<input type="number" name="dish_price" id="dish_price" class="ipt" min="1" required ><br><br>

		<label for="description">Description</label><br>
		<textarea  rows="4" cols="20" name="description" id="description" ></textarea><br>
		<hr>
		<button type="submit">Add Now</button>
	</form>
<a href="manage_dish.php">check menu</a>
</div>
<br>

<div class="card">
	<h2>Change Price</h2>
	<form action="change_price.php" method="post">
		<label for="dish_id" >dish id</label><br>
		<input type="number" name="dish_id" id="dish_id" class="ipt" min="1" ><br><br>

		<label for="dish_price" >new price</label><br>
		<input type="number" name="dish_price" id="dish_price" class="ipt" min="1" ><hr>

		<button type="submit">Change Price</button>
	</form>
<a href="manage_dish.php">check menu</a>	
</div>
<br>

<div class="card">
	<h2>Change Name</h2>
	<form action="change_name.php" method="post">
		<label for="dish_id" >dish id</label><br>
		<input type="number" name="dish_id" id="dish_id" class="ipt" min="1" ><br><br>

		<label for="dish_name" >new name</label><br>
		<textarea name="dish_name" id="dish_name" rows="2" cols="20" required></textarea><hr>

		<button type="submit">Change Name</button>
	</form>
<a href="manage_dish.php">check menu</a>	
</div>
<br>

<div class="card">
	<h2>Change Description</h2>
	<form action="change_description.php" method="post">
		<label for="dish_id" >dish id</label><br>
		<input type="number" name="dish_id" id="dish_id" class="ipt" min="1" ><br><br>

		<label for="description" >new description</label><br>
		<textarea name="description" id="description" rows="4" cols="20" required></textarea><hr>

		<button type="submit">Change Description</button>
	</form>
<a href="manage_dish.php">check menu</a>	
</div>
<br>
<div class="card">
	<h2>Remove dish</h2>
	<form action="remove_dish.php" method="post">
		<label for="dish_id" >dish id</label><br>
		<input type="number" name="dish_id" id="dish_id" class="ipt" min="1" ><br><hr>

		<button type="submit">Remove dish</button>
	</form>
<a href="manage_dish.php">check menu</a>
<a href="admin_home.php">back to home</a>	
</div>
<br>

</body>