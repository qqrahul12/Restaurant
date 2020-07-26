<script>
  function printm(msg){
    alert(msg);
  }
</script>
<?php

    session_start();
    if(isset($_SESSION["aid"]))
    {
        header("Location:admin_home.php");
    }

    $conn = mysqli_connect("localhost","root","","RoyalCafe");

    $aid = $_POST["id"];
    $pasword = $_POST["pasword"];

    if(!$conn)
    die("connection failed".mysqli_connect_error());
    else
    {
      $info = mysqli_query($conn,"SELECT * FROM admin where id = $aid and pasword = '$pasword' ");
    if($info->num_rows>0) {

          $_SESSION["aid"] = $aid;
          ?>

        <script> printm("login success");
            window.location.href="admin_home.php";
          </script>';
          <?php
            } 

    else {  
          ?>
      <script type="text/javascript">
      printm("invalid credentials");
      window.location.href= "admin.php";
          </script>
          <?php
          }        
      }
?>