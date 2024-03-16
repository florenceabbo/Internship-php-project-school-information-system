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
            <h1>PARENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add parents</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- Main content -->
    <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  ADD PARENTS
                </button>
                <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">PARENT BIO DATA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <form role="form" method="POST" action="ps.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Father's name</label>
                    <input type="text" name="fname" class="form-control"  placeholder="Enter Father's name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mother's name</label>
                    <input type="text"  name="mname" class="form-control"  placeholder=" Enter Mother's name">
                  </div>
                  <div class="form-group">
                    <label for="">contact</label>
                    <input type="text" name="pcontact" class="form-control"  placeholder="Enter Parent's contact">
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text"  name="address" class="form-control"  placeholder="Enter Contact">
                  </div>
                  <div class="form-group">
                    <label for="">Occupation</label>
                    <input type="text" name="occupation" class="form-control" placeholder="Enter Address">
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
            <th>Father's name</th>
            <th>Mother's name</th>
            <th>Parent'contact</th>
            <th>Address</th>
            <th>Occupaton</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM parents";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['fname'] ?></td>
                    <td><?php echo $row['mname'] ?></td>
                    <td><?php echo $row['pcontact'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['occupation'] ?></td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default3_<?php echo $row['id']; ?>">
                     Edit
                    </button>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" role="button">delete</a>
                    </td>
                </tr>
                 <!-- Edit Modal -->
                 <div class="modal fade" id="modal-default3_<?php echo $row['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Parent Data</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" method="POST" action="pa_update.php">
                                                    <div class="form-group">
                                                        <label for="fname">Father's Name</label>
                                                        <input type="text" id="fname" name="fname" class="form-control" placeholder="Edit Father's Name" value="<?php echo $row['fname']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mname">Mother's Name</label>
                                                        <input type="text" id="mname" name="mname" class="form-control" placeholder="Edit Mother's Name" value="<?php echo $row['mname']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pcontact">Parent's Contact</label>
                                                        <input type="pcontact" id="pcontact" name="pcontact" class="form-control" placeholder="Edit Parent's Contact" value="<?php echo $row['pcontact']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" id="address" name="address" class="form-control" placeholder="Edit address" value="<?php echo $row['address']; ?>" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="occupation">Parents Occupation</label>
                                                        <input type="text" id="occupation" name="occupation" class="form-control" placeholder="Edit occupation" value="<?php echo $row['occupation']; ?>" required>
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
                <?php
            
        
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