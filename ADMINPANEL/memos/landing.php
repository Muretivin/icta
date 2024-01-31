

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    

</head>

<body class="bod">
  <section>
      <h3>Hello, <?php echo $_SESSION['FirstName']; ?></h3>
      <a href="logout.php">Logout</a>
  </section>
  <div class="divide">
     <ul>
         <li> MEMO </li>
         <li> SENT </li>
         <li> RECIEVED </li>
    </ul>
     <section>
     <form id="form" method="post" action="">
    
        <div class="input-container">
            <select name="department" required>
                <option name ="department" value="" > DEPARTMENT </option>
                <option name ="department" value="CEO" >CEO </option>
                <option name ="department" value="registry" >REGISTRY </option>
                <option name ="department" value="procurement" >PROCUREMENT </option>
                <option name ="department" value="finance" >FINANCE </option>
                <option name ="department" value="ict" >ICT </option>
                <option name ="department" value="hrm" >HRM </option>
            </select> 
        
        </div>
        
        <div class="input-container">
            <select name="department" required>
                <option name ="department" value="" > DEPARTMENT </option>
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
                <option name ="user" value="" >SENDER </option>
                <option name ="user" value="ADMIN" >ADMIN </option>
                <option name ="user" value="CEO" >CEO </option>
                <option name ="user" value="DCEO" >DCEO </option>
                <option name ="user" value="HOD" >HOD </option>
                <option name ="user" value="USER" >USER </option>
            </select> 
        
        </div>
        <div class="input-container">
            <form action="/action_page.php">
                <input type="file" id="myFile" name="filename">
                
            </form>
        </div>
        
        
        
    
        
        
        
        
        
    </form>
     </section>
     <div>
        <h3> announcements </h3>
     </div>
  </div>

</body>

</html>

