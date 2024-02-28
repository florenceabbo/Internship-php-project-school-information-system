<?php
include('dbconn.php');
if(isset($_POST['submit'])) {
    trim(extract($_POST));

    // `id`, `name`, `gender`, `contact`, `address`, `department`
        $query = "INSERT INTO workers (name, gender, contact, address, department) VALUES ('$name', '$gender', '$contact',  '$address', '$department')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Worker registered successfully');</script>";
            echo "<script>window.location.href='workers.php';</script>";
            exit(); 
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
