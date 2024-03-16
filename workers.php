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
            <h1>WORKERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- Main content -->
    <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  ADD WORKERS
                </button>
                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">WORKERS BIO DATA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form role="form" method="POST" action="wks.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Full name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <input type="text"  name="gender" class="form-control"  placeholder=" Enter Gender">
                  </div>
                  <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control"  placeholder="Enter Cntact">
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="contact" class="form-control"  placeholder="Enter Address">
                  </div>
                  <div class="form-group">
                    <label for="">Department</label>
                    <input type="text"  name="department" class="form-control"  placeholder="Enter Department">
                  </div>
                  </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
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
            <th>Gender</th>
            <th>Contact</th>
            <th>address</th>
            <th>Department</th>
            <th>ACTION</th>
        </tr>
        </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM workers";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>                                   
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['contact'] ?></td>
                                    
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['department'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default4_<?php echo $row['id']; ?>">
                                            Edit
                                        </button>
                                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>&table=teachers" role="button">Delete</a>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="modal-default4_<?php echo $row['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                          <h4 class="modal-title">Edit worker's Data</h4>
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="POST" action="wks_update.php">
                                                    <div class="form-group">
                                                        <label for="name">worker's Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name" value="<?php echo $row['name']; ?>" required>
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <input type="gender" id="gender" name="gender" class="form-control" placeholder="Enter gender" value="<?php echo $row['gender']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact">Contact</label>
                                                        <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter contact" value="<?php echo $row['contact']; ?>" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $row['address']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="department">department</label>
                                                        <input type="text" id="department" name="department" class="form-control" placeholder="Enter department" value="<?php echo $row['department']; ?>" required>
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
