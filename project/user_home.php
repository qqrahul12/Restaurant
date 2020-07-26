<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>RoyalCafe</title>

  <link rel= "stylesheet" type="text/css"  href="css/rc.css">
  <link rel= "stylesheet" type="text/css"  href="css/button.css">
  <script src = "js/redirect.js"> </script>

  <style type="text/css">
  	#menu {
  		top:10%;
  		margin-top : 100px;
  	}

  </style>

</head>


<body>
	<?php include 'welcome.php'?>
	<div class="center">
	<div id="menu">
	<div class="vertispace">
	<button class="btn btn-primary" onclick="redirect('menu.php')" type="submit">Check menu</button>
</div>
</div>

	<div class="vertispace">
	<button class="button" onclick="redirect('book_table.php')" type="submit">Book table</button>
</div>
	<div class="vertispace">
	<button class="button" onclick="redirect('order.php')" type="submit">Order Online</button>
</div>

	<div class="vertispace">
	<button class="btn btn-primary" onclick="redirect('history.php')" type="submit">Your orders</button>
</div>

	<div class="vertispace">
	<button class="btn btn-primary" onclick="redirect('logout.php')" type="submit">logout</button>
</div>
</div>
</body>