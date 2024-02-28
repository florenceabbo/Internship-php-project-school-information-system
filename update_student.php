<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $dob = $_POST['dob'];
    $pname = $_POST['pname'];
    $pcontact = $_POST['pcontact'];
    
    // Update the student record in the database
    $sql = "UPDATE students SET fname=?, gender=?, email=?, level=?, dob=?, pname=?, pcontact=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $fname, $gender, $email, $level, $dob, $pname, $pcontact, $id);
    if ($stmt->execute()) {
        echo "Record updated successfully. Redirecting...";
        echo "<meta http-equiv='refresh' content='2;url=students.php'>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    // Display confirmation dialog
    $id = $_GET['id'];
    echo "<script>
            if (confirm('Are you sure you want to update this record?')) {
                window.location.href = 'update_student.php?id=$id';
            } else {
                window.location.href = 'students.php'; // Redirect to a different page if cancellation is clicked
            }
        </script>";
}

$conn->close();
?>
