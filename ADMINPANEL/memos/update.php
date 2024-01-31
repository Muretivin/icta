<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $first_name = $_POST['FirstName'];

        $last_name = $_POST['LastName'];

        $username = $_POST['username'];

        $department = $_POST['department'];
    
        $user = $_POST['user'];

        $password = $_POST['password'];

        $sql = "UPDATE `staff` SET `FirstName`='$first_name',`LastName`='$last_name',`department`='$department',`username`='$username',`password`='$password'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $staff_id = $_GET['id']; 

    $sql = "SELECT * FROM `staff` WHERE `id`='$staff_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['FirstName'];

            $last_name = $row['LastName'];

            $username = $row['username'];

            $email = $row['email'];

            $department = $row['department'];

            $user = $row['user'];

            $password = $row['password'];

            $id = $row['id'];

        } 

    ?>
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
    <form id="form" method="post" action="">
    <h1> UPDATE EMPLOYEE INFOMARMATION</h1>
        <div class="input-container"> 
        <input type="text" id="FirstName" placeholder="Enter FirstName" name="FirstName" value="<?php echo $first_name; ?>" required>
        </div>
        <div class="input-container"> 
        <input type="text" id="LastName" placeholder="Enter LastName" name="LastName" value="<?php echo $last_name; ?>" required>
        </div>
        <div class="input-container"> 
        <input type="text" id="username" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>
        </div>
        <div class="input-container"> 
        <input type="text" id="username" placeholder="Enter email" name="username" value="<?php echo $email; ?>" required>
        </div>
        <div class="input-container">
            <select value="<?php echo $department; ?>" required>
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
            <select value="<?php echo $user; ?>" required>
                <option name ="user" value="" >SELECT USER </option>
                <option name ="user" value="ADMIN" >ADMIN </option>
                <option name ="user" value="CEO" >CEO </option>
                <option name ="user" value="DCEO" >DCEO </option>
                <option name ="user" value="HOD" >HOD </option>
                <option name ="user" value="USER" >USER </option>
            </select> 
        
        </div>
    
        <div class="input-container">
           <input type="password" id="password" placeholder="Enter Your Password"  name="password" value="<?php echo $password; ?>" required>
        </div>
    
        <button type="submit">+Add</button>
        <img class="img" src="download.png" alt="" width="170px"  >
        
        
    </form>
    
    </section>
</div>    
</body>
</html>
<?php

    } else{ 

        header('Location: read.php');

    } 

}

?> 