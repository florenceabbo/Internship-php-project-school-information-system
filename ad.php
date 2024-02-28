<?php
include('dbconn.php');
if(isset($_POST['submit'])) {
    extract($_POST);
    $name = trim($name);
    $email = trim($email);
    $contact = trim($contact);
    $address = trim($address);
   

    // Check if the email already exists
    $check_query = "SELECT * FROM admins WHERE email='$email'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email already exists');</script>";
        echo "<script>window.location.href='admin.php';</script>";
        exit(); 
    } else {
        $query = "INSERT INTO admins (name, email, contact, address) VALUES ('$name', '$email', '$contact', '$address')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Admin registered successfully');</script>";
            echo "<script>window.location.href='admin.php';</script>";
            exit(); 
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>