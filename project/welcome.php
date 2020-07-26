<?php
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }

    echo "Hello " . $_SESSION['name'];
?>