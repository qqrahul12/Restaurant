<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
    	header("Location:login.php");
    }

    $count = $_POST['count'];   #input from form(book_table.php)

    $con = mysqli_connect("localhost","root","","RoyalCafe");
    if($con){
    	$id = $_SESSION["id"];

    	$info = mysqli_query($con,"SELECT avl_tables from vals");
        $available = mysqli_fetch_row($info)[0];
    	if($available>=$count){

			mysqli_query($con,"INSERT into book_history(user_id,number_of_tables)
					values($id,$count)");
            mysqli_query($con,"UPDATE vals set avl_tables = $available-$count");
    	}

        else{
            ?>
            <script type="text/javascript">
                alert("enough tables not available");
                window.location.href = "user_home.php";
            </script>
        <?php
        }

    }
    $info  = mysqli_query($con,"SELECT * from book_history order by id Desc limit 1");
    $row = mysqli_fetch_row($info);
    $_SESSION["dates"] = $row[3];
    $_SESSION["book_id"] = $row[0];
    $_SESSION["count"] = $count;
    header("Location:customer_book_detail.php")

?>
