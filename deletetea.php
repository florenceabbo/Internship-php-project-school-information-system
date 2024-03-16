<?php
include('dbconn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Sanitize the ID
    $id = intval($id);
    
    if (isset($_GET['confirm']) && $_GET['confirm'] == '1') {
        $sql = "DELETE FROM teachers WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Record deleted successfully from teachers table<br>";
            header("Location: teachers.php"); // Redirect to teachers.php after successful deletion
            exit();
        } else {
            echo "Error deleting record from teachers table: " . $stmt->error . "<br>";
        }
    } else {
        echo "<script>
                if (confirm('Are you sure you want to delete this teacher?')) {
                    window.location.href = 'delete.php?id=$id&confirm=1';
                } else {
                    window.location.href = 'index.php'; // Redirect to index.php if cancellation is clicked
                }
            </script>";
    }
}

$conn->close();
?>
