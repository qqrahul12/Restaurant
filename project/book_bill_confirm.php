<?php
    session_start();
    if(!isset($_SESSION["aid"]))
    {
        header("Location:admin.php");
    }

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if(!$con)
    die("connection failed".mysqli_connect_error());
    $book_id = $_SESSION["book_id"];
    $type  = $_SESSION["type"];
    $user = $_SESSION["user"];
    $amount = $_SESSION["total"];

    mysqli_query($con,"INSERT into bill(user_id,type,type_id,amount) values($user,'$type',$book_id,$amount)");
    mysqli_query($con,"UPDATE book_history set pending = 0 where id = $book_id");
    $info2 = mysqli_query($con,"SELECT id from bill ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_row($info2);
    $bill_id = $row[0];
?>

<head>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/input.css">
    <script type="text/javascript" src="js/redirect.js" ></script>
</head>
<body>
<div class="card">
    <h2>Your Bill</h2>
    <table align="center">
        <tr>
            <td>Bill id</td>
            <td><?php echo $bill_id; ?></td>
        </tr>
        <tr>
            <td>Bill Date</td>
            <td><?php echo(date("Y-m-d")); ?></td>
        </tr>
        <tr>
            <td>user id</td>
            <td><?php echo $user; ?></td>
        </tr>
        <tr>
            <td>Bill type</td>
            <td><?php echo $type; ?></td>
        </tr>
        <tr>
            <td>Booking id</td>
            <td><?php echo $book_id; ?></td>
        </tr>
        <tr>
            <td>Bill amount</td>
            <td><?php echo $amount; ?></td>
        </tr>
    </table><hr>
    <button type="submit" onclick="redirect('admin_home.php')">Back to Home</button>
</div>
</body>

<?php
    unset($_SESSION["book_id"]);
    unset($_SESSION["type"]);
    unset($_SESSION["user"]);
    unset($_SESSION["total"]);

?>