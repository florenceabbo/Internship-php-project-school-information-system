<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    
    // Update the workers record in the database
    $sql = "UPDATE workers SET name=?, gender=?, contact=?, address=?, department=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $gender, $contact, $address, $department, $id);
    if ($stmt->execute()) {
        echo "Record updated successfully. Redirecting...";
        echo "<meta http-equiv='refresh' content='2;url=workers.php'>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    // Display confirmation dialog
    $id = $_GET['id'];
    echo "<script>
            if (confirm('Are you sure you want to update this record?')) {
                window.location.href = 'wkrs_update.php?id=$id';
            } else {
                window.location.href = 'workers.php'; // Redirect to a different page if cancellation is clicked
            }
        </script>";
}

$conn->close();
?>
