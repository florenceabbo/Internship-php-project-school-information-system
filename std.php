<?php
include('dbconn.php');
if(isset($_POST['submit'])) {
    // Extract and trim the POST data
    extract($_POST);
    $fname = trim($fname);
    $gender = trim($gender);
    $email = trim($email);
    $level = trim($level);
    $dob = trim($dob);
    $pname = trim($pname);
    $pcontact = trim($pcontact);

    // Check if the email already exists
    $check_query = "SELECT * FROM students WHERE email='$email'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        // Display error message using JavaScript
        echo "<script>alert('Email already exists');</script>";
        // Redirect back to students.php
        echo "<script>window.location.href='students.php';</script>";
        exit(); // Ensure that no other output is sent before the redirection
    } else {
        // Insert the record
        $query = "INSERT INTO students (fname, gender, email, level, dob, pname, pcontact) VALUES ('$fname', '$gender', '$email', '$level', '$dob', '$pname', '$pcontact')";
        if (mysqli_query($conn, $query)) {
            // Use JavaScript to show success message and then redirect to student.php
            echo "<script>alert('Student registered successfully');</script>";
            echo "<script>window.location.href='students.php';</script>";
            exit(); // Ensure that no other output is sent before the redirection
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
