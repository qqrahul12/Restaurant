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
  <title>RC Login</title>
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
      <form action="http://localhost/Restaurant/vlogin.php" method="post">
            
        <label for="Mobile">Mobile<br></label>
        <input class="ipt" type="text" name="mobile" id="Mobile" required >
            <br>   
            
        <div style="margin-top: 10px">        
          <label for="pasword">Password<br></label> 
          <input class="ipt" type="Password" name="pasword" id="pasword" required>
            <br>
          </div>

        <div style="margin-top: 10px">
          <button type="submit">Submit</button></div>
    </form>
   <a  href="signup.php" role="button">Not Registered yet?</a> <br>
   <a  href="index.php" role="button">back to home</a> 
</div>  
</body>
</html>