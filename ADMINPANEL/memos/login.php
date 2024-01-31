<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="body">
    <section id="header"> <p>Information and Communication Technology Authority</p></section>
    <div id="field">
    <section class="section_form">
    <form id="form" method="post" action="login2.php">
 
    <h1>EMPLOYEE LOGIN</h1>
    <?php if (isset($_GET['error'])) { ?>

        <p class="error"> <?php echo $_GET['error']; ?></p>

    <?php } ?>
        <div class="input-container">
           
        <input type="text" id="username" placeholder="Enter Username" name="username" required>
        </div>
    
        <div class="input-container">
           <input type="password" id="password" placeholder="Enter Your Password"  name="password" required>
        </div>
    
        <button type="submit">Login</button>
        <img class="img" src="download.png" alt="" width="170px"  >
        
        
    </form>
    
    </section>
    
   <a href="resetpassword.php"> <div id="reset"> <p> Reset Password </p> </div> </a>
</div>
  
  
    
</body>
</html>