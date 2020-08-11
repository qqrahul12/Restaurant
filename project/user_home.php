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
  <link rel= "stylesheet" type="text/css"  href="css/card.css">
  <script src = "js/redirect.js"> </script>

  <style type="text/css">
  	#menu {
  		top:10%;
  		margin-top : 100px;
  	}

  </style>

</head>

<body style="background-color: #888888">
	<div class="card">
    <h2 style="text-align: left"><?php echo "Hello " . $_SESSION['name']; ?></h2>
	<button class="btn btn-primary" onclick="redirect('menu.php')" type="submit">Check menu</button>
  <br><br>

	<button class="button" onclick="redirect('book_table.php')" type="submit">Book table</button>
  <br><br>

	<button class="button" onclick="redirect('order.php')" type="submit">Order Online</button>
  <br><br>

	<button class="btn btn-primary" onclick="redirect('history.php')" type="submit">Your orders</button>
  <br><br>

	<button class="btn btn-primary" onclick="redirect('logout.php')" type="submit">logout</button>
</div>
</body>
