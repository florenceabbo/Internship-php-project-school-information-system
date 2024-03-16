<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $pcontact = $_POST['pcontact'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    
    // Update the parents record in the database
    $sql = "UPDATE parents SET fname=?, mname=?, pcontact=?, address=?, occupation=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $fname, $mname, $pcontact, $address, $occupation, $id);
    if ($stmt->execute()) {
        echo "Record updated successfully. Redirecting...";
        echo "<meta http-equiv='refresh' content='2;url=parents.php'>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
} else {
    // Display confirmation dialog
    $id = $_GET['id'];
    echo "<script>
            if (confirm('Are you sure you want to update this record?')) {
                window.location.href = 'pa_update.php?id=$id';
            } else {
                window.location.href = 'parents.php'; // Redirect to a different page if cancellation is clicked
            }
        </script>";
}

$conn->close();
?>
