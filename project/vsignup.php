<script>
  function printm(msg){
    alert(msg);
  }
</script>

<?php

    session_start();
    if(isset($_SESSION["id"]))
    {
        header("Location:user_home.php");
    }

    $conn = mysqli_connect("localhost","root","","RoyalCafe");
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $pasword = $_POST["pasword"];

    if(!$conn)
    die("connection failed".mysqli_connect_error());
    else
    {
        $info = mysqli_query($conn,"SELECT * FROM Signin where mobile = '$mobile' ");
        if($info->num_rows>0) {
          ?>
          <script>
            printm("user already exists");
            window.location.href = "login.php";
          </script>
          <?php
          
        }    
        else {
            mysqli_query($conn,"INSERT into Signin(mobile,name,pasword) values('$mobile','$name','$pasword') ");

            $info = mysqli_query($conn,"SELECT *  FROM Signin where mobile = '$mobile' ");
            $id = mysqli_fetch_row($info);
            $_SESSION["id"] = $id[0];
            $_SESSION["name"] = $id[2];
            $_SESSION["mobile"]= $id[1];


        ?>
            <script type="text/javascript">
            printm("Welcome <?php echo $name; ?> ");
            window.location.href = "user_home.php"; </script>
            <?php
        } 

    }
?>