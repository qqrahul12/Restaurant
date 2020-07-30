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
    <style type="text/css">
        td{
            padding: 5px;
        }
    </style>
</head>
<?php
    $info1 = mysqli_query($con,"SELECT count(id),sum(amount) from bill where user_id  = $id and type = 'Booking' ");
    $row1 = mysqli_fetch_row($info1);
    $info2 = mysqli_query($con,"SELECT count(id),sum(price) from order_history where user_id  = $id ");
    $row2  = mysqli_fetch_row($info2);
?>
<body>
<div class="card">
    <h2>user stats</h2>
    <table align="center">
        <tr>
            <td>user id</td>
            <td><?php echo $id;?></td>
        </tr>
        <tr>
            <td>total booking</td>
            <td><?php echo $row1[0];?></td>
        </tr>
        <tr>
            <td>total booking amount</td>
            <td><?php echo $row1[1];?></td>
        </tr>
        <tr>
            <td>total order</td>
            <td><?php echo $row2[0];?></td>
        </tr>
        <tr>
            <td>total order amount</td>
            <td><?php echo $row2[1];?></td>
        </tr>
        <tr>
            <td>total amount</td>
            <td><?php echo $row1[1]+$row2[1];?></td>
        </tr>
    </table>
    <a href="manage_user.php">back</a>
</div>
</body>