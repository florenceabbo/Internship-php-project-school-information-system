<?php
include('dbconn.php');

?>  
    <?php include('header.php')?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STUDENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Students</li>
            
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  ADD STUDENT
                </button>
               
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">STUDENT BIO DATA</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        
                        <form role="form" method="POST" action="std.php">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Full name</label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter Full name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Gender</label>
                                        <input type="text" name="gender" class="form-control" placeholder="Enter Gender">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <input type="text" name="level" class="form-control" placeholder="Enter Level">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Date of birth</label>
                                        <input type="date" name="dob" class="form-control" placeholder="Enter Date of birth">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Parents name</label>
                                        <input type="text" name="pname" class="form-control" placeholder="Enter parents name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Parents contact</label>
                                        <input type="text" name="pcontact" class="form-control" placeholder="Enter parents contact">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>  
            </div>
            <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Date of Birth</th>
                        <th>Parents Name</th>
                        <th>Parents Contact</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM students";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['fname'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['level'] ?></td>
                                    <td><?php echo $row['dob'] ?></td>
                                    <td><?php echo $row['pname'] ?></td>
                                    <td><?php echo $row['pcontact'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default1_<?php echo $row['id']; ?>">
                                            Edit
                                        </button>
                                        <a class="btn btn-danger"  href="delete.php?id=<?php echo $row['id']; ?>&table=students" role="button">Delete</a>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="modal-default1_<?php echo $row['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Student Data</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
 <?php include ('footer.php')?>
