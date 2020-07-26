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

    	$info = mysqli_query($con,"SELECT * from tables where curr_status=0 ");
    	if($info->num_rows>=$count){
			$empty = array();
			$i = 0;
			while($row= $info->fetch_assoc()){
				$empty[$i]=$row['id'];
				$i++;
			}

			for($i=0;$i<$count;$i++){

				mysqli_query($con,"UPDATE tables SET curr_status=1,
				user_id = $id where id=$empty[$i]");
			}

			mysqli_query($con,"INSERT into book_history(user_id,number_of_tables)
					values($id,$count)");
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

?>
<p>table booked successfully</p>
<p>visit RoyalCafe in the next 24 hours</p>
<a  href="user_home.php" >back</a>