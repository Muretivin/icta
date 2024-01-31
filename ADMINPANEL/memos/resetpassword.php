<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password reset </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div> 
      <?php
       if (isset($_SESSION['status'])) {
        ?>
          <div class="alert alert-success">
              <h5> <? = $_SESSION['status']; ?> </h5>
          </div>
          <?php 
           unset($_SESSION['status']);
        }

      ?>


    </div>
<section class="section_form">
   <form id="form" method="post" action="password_reset_code.php">
        <h1>Reset your Password</h1>
        <div class="input-container"> 
        <input type="text" id="FirstName" placeholder="Email address"   required>
        </div>
        <button type="submit" name="password_reset_link" > Send </button>
    </form>
</section>
    
</body>
</html>