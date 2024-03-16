<?php include 'auth.php'; ?>


<?php
include('dbconn.php');

?>
    
    <?php include('header.php')?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TEACHERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">add teachers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- Main content -->
    <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  ADD TEACHERS
                </button>
                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TEACHER BIO DATA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form role="form" method="POST" action="trs.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="tname" class="form-control"  placeholder="Enter Full name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text"  name="email" class="form-control"  placeholder=" Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="">Classes</label>
                    <input type="text" name="classes" class="form-control"  placeholder="Enter classes">
                  </div>
                  <div class="form-group">
                    <label for="">Subjects</label>
                    <input type="text"  name="subject" class="form-control"  placeholder="Enter Subjects">
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contact</label>
                    <input type="text"  name="contact" class="form-control"  placeholder="Enter Contact">
                  </div>
                  </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
              </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>  
              <!-- /.card -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Classes</th>
                        <th>Subject</th>
                        <th>Address</th>
                        <th> Contact</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM teachers";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['tname'] ?></td>                                   
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['classes'] ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['contact'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default2_<?php echo $row['id']; ?>">
                                            Edit
                                        </button>
                                        <a class="btn btn-danger"  href="deletetea.php?id=<?php echo $row['id']; ?>&table=teachers" role="button1">Delete</a>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="modal-default2_<?php echo $row['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          <h4 class="modal-title">Edit Teacher's Data</h4>
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="POST" action="tea_update.php">
                                                    <div class="form-group">
                                                        <label for="tname">Teacher's Name</label>
                                                        <input type="text" id="tname" name="tname" class="form-control" placeholder="Enter Full Name" value="<?php echo $row['tname']; ?>" required>
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $row['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="classes">Classes</label>
                                                        <input type="text" id="classes" name="classes" class="form-control" placeholder="Enter classes" value="<?php echo $row['classes']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subject">Subjects</label>
                                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter Subjects" value="<?php echo $row['subject']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $row['address']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact">Contact</label>
                                                        <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact" value="<?php echo $row['contact']; ?>" required>
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
