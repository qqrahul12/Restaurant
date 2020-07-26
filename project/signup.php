<?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        header("Location:user_home.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Registeration</title>
<style>
.center{
      text-align: center;
    }
html {
    margin: auto;
    margin-top: 10%;
}

body {
    vertical-align: middle;
}
</style>

  <link rel= "stylesheet" type="text/css"  href="css/button.css">
  <link rel= "stylesheet" type="text/css"  href="css/rc.css">
  <link rel= "stylesheet" type="text/css"  href="css/input.css">
  <link rel= "stylesheet" type="text/css"  href="css/link.css">
</head>
<body>
  <div class="center">
    <form action="vsignup.php" method="post">
      <label for="name">Name</label><br>
      <input class="ipt" type="text" name="name" id="name" required><br>

      <label for="mobile">Mobile</label><br>
      <input class="ipt" type="text" name="mobile" id="mobile" required><br>

      <label for="pswd">Password</label><br> 
      <input class="ipt" type="Password" name="pasword" id="pswd" required><br>

      <button type="submit">Submit</button>

    </form>

   <a  href="login.php" role="button">Already Registered?</a><br>

   <a  href="index.php" role="button">back to home</a> 
</div> 
</body>
</html>