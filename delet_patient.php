<?php
include 'connect.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // DELETE QUERY
    $sql = "DELETE FROM patients WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        header("Location: view_patients.php");
    } else {
        echo "Error deleting record";
    }

}
?>