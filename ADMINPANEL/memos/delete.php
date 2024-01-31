<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $staff_id = $_GET['id'];

    $sql = "DELETE FROM `staff` WHERE `id`='$staff_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "User Cleared successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>

