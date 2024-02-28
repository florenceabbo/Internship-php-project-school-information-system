<?php
include('dbconn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the student record from the database
    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Display the edit form
        ?>
        <?php include 'header.php'; ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="modal-title text-center">EDIT STUDENT BIO DATA</h4>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="update_student.php">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter Full Name" value="<?php echo $row['fname']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <input type="text" id="gender" name="gender" class="form-control" placeholder="Enter Gender" value="<?php echo $row['gender']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <input type="text" id="level" name="level" class="form-control" placeholder="Enter Level" value="<?php echo $row['level']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pname">Parents Name</label>
                                    <input type="text" id="pname" name="pname" class="form-control" placeholder="Enter Parents Name" value="<?php echo $row['pname']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pcontact">Parents Contact</label>
                                    <input type="text" id="pcontact" name="pcontact" class="form-control" placeholder="Enter Parents Contact" value="<?php echo $row['pcontact']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Student not found";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
