<?php
include('dbconn.php');
if(isset($_POST['submit'])) {
    extract($_POST);
    $tname = trim($tname);
    $email = trim($email);
    $classes = trim($classes);
    $subject = trim($subject);
    $address = trim($address);
    $contact = trim($contact);

    // Check if the email already exists
    $check_query = "SELECT * FROM teachers WHERE email='$email'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email already exists');</script>";
        echo "<script>window.location.href='teachers.php';</script>";
        exit(); 
    } else {
        $query = "INSERT INTO teachers (tname, email, classes, subject, address, contact) VALUES ('$tname', '$email', '$classes', '$subject', '$address', '$contact')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Teacher registered successfully');</script>";
            echo "<script>window.location.href='teachers.php';</script>";
            exit(); 
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
