<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login1.php");
    exit;
}
?>

<?php include ('header.php'); ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard 1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        include('dbconn.php');
                        $sql = "SELECT * FROM students";
                        $result = $conn->query($sql);
                        $total_students = $result->num_rows;
                        ?>
                        <h3><?= number_format($total_students); ?></h3>
                        <p>STUDENTS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Handling teachers box -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php
                        $sql = "SELECT COUNT(*) as count FROM teachers";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_teachers = $row['count'];
                        ?>
                        <h3><?= number_format($total_teachers); ?><sup style="font-size: 20px"></sup></h3>
                        <p>TEACHERS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="teachers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <!-- Handling Parents box -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                        $sql = "SELECT COUNT(*) as count FROM parents";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_parents = $row['count'];
                        ?>
                        <h3><?= number_format($total_parents); ?></h3>
                        <p>PARENTS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="parents.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- handling workers box -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php
                        $sql = "SELECT COUNT(*) as count FROM workers";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $total_worker = $row['count'];
                        ?>
                        <h3><?= number_format($total_worker); ?></h3>
                        <p>WORKERS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="worker.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php include ('footer.php');?>
