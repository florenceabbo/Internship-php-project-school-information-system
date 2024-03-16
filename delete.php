<?php
include('dbconn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Sanitize the ID
    $id = intval($id);
    
    if (isset($_GET['confirm']) && $_GET['confirm'] == '1') {
        $sql = "DELETE FROM students WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Record deleted successfully from students table<br>";
            echo "<meta http-equiv='refresh' content='2;url=students.php'>";
            exit();
        } else {
            echo "Error deleting record from students table: " . $stmt->error . "<br>";
        }
    } else {
        echo "<script>
                if (confirm('Are you sure you want to delete this student?')) {
                    window.location.href = 'delete.php?id=$id&confirm=1';
                } else {
                    window.location.href = 'index.php'; // Redirect to index.php if cancellation is clicked
                }
            </script>";
    }
}

$conn->close();
?>
