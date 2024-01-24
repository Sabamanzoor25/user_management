<?php
$id = $_GET['email'];
//Connect DB
include_once '../DB/db.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$query = "DELETE FROM vworlduser WHERE vid='$id'";

if (mysqli_query($conn, $query)) {
    mysqli_close($conn);
    $message = "User Deleted";
    echo "<script>  alert('$message');window.location.href='dashboardvm.php'; </script>";
    exit;
} else {
    echo "Error deleting record";
}