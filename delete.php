<?php
include('dbconn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Sanitize the ID
    $id = intval($id);
    
    if (isset($_GET['confirm']) && $_GET['confirm'] == '1') {
        $tables = ['students', 'teachers', 'admins', 'parents'];

        foreach ($tables as $table) {
            $sql = "DELETE FROM $table WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Record deleted successfully from $table table<br>";
                
                // Redirect to a specific page after deletion
                switch ($table) {
                    case 'students':
                        header("Location: students.php");
                        exit();
                    case 'teachers':
                        header("Location: teachers.php");
                        exit();
                    case 'admins':
                        header("Location: admins.php");
                        exit();
                    case 'parents':
                        header("Location: parents.php");
                        exit();
                    default:
                        header("Location: index.php");
                        exit();
                }
            } else {
                echo "Error deleting record from $table table: " . $stmt->error . "<br>";
            }
        }
    } else {
        echo "<script>
                if (confirm('Are you sure you want to delete this record?')) {
                    window.location.href = 'delete.php?id=$id&confirm=1';
                } else {
                    window.location.href = 'index.php'; // Redirect to a different page if cancellation is clicked
                }
            </script>";
    }
}

$conn->close();
?>
