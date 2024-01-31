<?php 

include "config.php";

  if (isset($_POST['submit'])) {
    

    $first_name = $_POST['FirstName'];

    $last_name = $_POST['LastName'];

    $username = $_POST['username'];

    $email = $_POST['email'];

    $department = $_POST['department'];
    
    $user = $_POST['user'];

    $password = $_POST['password'];


    $sql = "INSERT INTO `staff`(`FirstName`, `LastName`, `username`,`email`, `department`,`user`, `password`) VALUES ('$first_name','$last_name','$username','$email','$department','$user','$password')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New User registered.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="body">
    <section id="header"> <p>Information and Communication Technology Authority</p></section>
    <div id="field">
    <section class="section_form">
    <form id="form" method="post" action="">
    <h1>EMPLOYEE INFOMARMATION</h1>
        <div class="input-container"> 
        <input type="text" id="FirstName" placeholder="Enter FirstName" name="FirstName"  required>
        </div>
        <div class="input-container"> 
        <input type="text" id="LastName" placeholder="Enter LastName" name="LastName"  required>
        </div>
        <div class="input-container"> 
        <input type="text" id="username" placeholder="Enter Username" name="username"  required>
        </div>
        <div class="input-container"> 
        <input type="text" id="username" placeholder="Enter Email" name="email"  required>
        </div>
        <div class="input-container">
            <select name="department" required>
                <option name ="department" value="" >SELECT DEPARTMENT </option>
                <option name ="department" value="CEO" >CEO </option>
                <option name ="department" value="registry" >REGISTRY </option>
                <option name ="department" value="procurement" >PROCUREMENT </option>
                <option name ="department" value="finance" >FINANCE </option>
                <option name ="department" value="ict" >ICT </option>
                <option name ="department" value="hrm" >HRM </option>
            </select> 
        
        </div>
        <div class="input-container">
            <select name="user" required>
                <option name ="user" value="" >SELECT USER </option>
                <option name ="user" value="ADMIN" >ADMIN </option>
                <option name ="user" value="CEO" >CEO </option>
                <option name ="user" value="DCEO" >DCEO </option>
                <option name ="user" value="HOD" >HOD </option>
                <option name ="user" value="USER" >USER </option>
            </select> 
        
        </div>
    
        <div class="input-container">
           <input type="password" id="password" placeholder="Enter Your Password"  name="password"  required>
        </div>
        
    
        <button type="submit" value ="submit" name="submit">+Add</button>
        
        <img class="img" src="download.png" alt="" width="170px"  >
        
        
    </form>
    <button type="submit" class="button" > <a href="read.php"> USERS </a> </button>
    
    </section>
    </div>    
</body>
</html>