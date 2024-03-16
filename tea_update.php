<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $tname = $_POST['tname'];
    $email = $_POST['email'];
    $classes = $_POST['classes'];
    $subject = $_POST['subject'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    // Update the teachers record in the database
    $sql = "UPDATE teachers SET tname=?, email=?, classes=?, subject=?, address=?, contact=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $tname, $email, $classes, $subject, $address, $contact, $id);
    if ($stmt->execute()) {
        echo "Record updated successfully. Redirecting...";
        echo "<meta http-equiv='refresh' content='2;url=teachers.php'>";
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
                window.location.href = 'teachers.php'; // Redirect to a different page if cancellation is clicked
            }
        </script>";
}

$conn->close();
?>
