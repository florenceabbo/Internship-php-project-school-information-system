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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="students.php">Student</a></li>
              <li class="breadcrumb-item active">Edit Student</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="card-body">
           
                <div class="modal fade" id="modal-default1">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Student DATA</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
        </div>
      </div>
    </section>
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
 <?php include ('footer.php')?>