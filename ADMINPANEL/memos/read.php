<?php 

include "config.php";

$sql = "SELECT * FROM staff";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Registered Users</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>USERS</h2>

<table class="table">

    <thead>

        <tr>

        <th>id</th>

        <th>FirstName</th>

        <th>LastName</th>

        <th>username</th>

        <th>department</th>

        <th>user</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['FirstName']; ?></td>

                    <td><?php echo $row['LastName']; ?></td>

                    <td><?php echo $row['username']; ?></td>

                    <td><?php echo $row['department']; ?></td>

                    <td><?php echo $row['user']; ?></td>

                

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>