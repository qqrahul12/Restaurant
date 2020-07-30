<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
    	header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    
    $id = $_POST["user_id"];
?>
<head>
	<link rel="stylesheet" href="css/card.css">
	<link rel="stylesheet" href="css/button.css">
	<link rel="stylesheet" href="css/rc.css">
</head>
<body>
<div class="card">
<h2>Current Bookings</h2>
<?php
    $info1 = mysqli_query($con,"SELECT * from order_history where user_id=$id and pending=1 order by id DESC ");
    if($info1->num_rows>0){
        while($row=$info1->fetch_assoc()){
            echo '<table align="center">';
            echo '<tr>';
            echo '<td>Date</td>';
            echo '<td>'.$row["dates"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Order id</td>';
            echo '<td>'.$row["id"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Price</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>items</td>';
            echo '<td>'.$row["description"].'</td>';
            echo '</tr>';
            echo '</table>';
            echo '<br>';
        }
    }
?>

<h2>Previous Bookings</h2>
<?php
    $info1 = mysqli_query($con,"SELECT * from order_history where user_id=$id and pending=0 order by id DESC ");
    if($info1->num_rows>0){
        while($row=$info1->fetch_assoc()){
            echo '<table align="center">';
            echo '<tr>';
            echo '<td>Date</td>';
            echo '<td>'.$row["dates"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Order id</td>';
            echo '<td>'.$row["id"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>Price</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>items</td>';
            echo '<td>'.$row["description"].'</td>';
            echo '</tr>';
            echo '</table>';
            echo '<br>';
        }
    }
?>
<a href="manage_user.php">back</a>
</div>
</body>