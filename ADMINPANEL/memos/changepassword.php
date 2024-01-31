<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<section class="section_form">
   <form id="form" method="post" action="password_reset_code.php">
        <h1>Reset your Password</h1>
        <input type="hidden" name="password_token" value="<?php if(isset($_GET['verify_token'])){echo $_GET['verify_token'];} ?>">
        <div class="input-container"> 
        <input type="text"  placeholder="Email address" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>"  required>
        </div>
        <div class="input-container"> 
        <input type="text"  placeholder="new password" name="newpassword"   required>
        </div>
        <div class="input-container"> 
        <input type="text"  placeholder="confirm password" name="confirmpassword"  required>
        </div>
        <button type="submit" name="reset_password" > Submit </button>
    </form>
      
    
</body>
</html>