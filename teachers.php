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
                            <th>subjects</th>
                            <th>address</th>
                            <th>Contact</th>
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
                                    <a class="btn btn-primary" href="#" role="button">edit</a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" role="button">delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include ('footer.php')?>