<?php
include('dbconn.php');
if(isset($_POST['submit']))
{
 trim(extract($_POST));
$query=mysqli_query($conn, "insert into parents(fname,mname,pcontact,address,occupation) values('$fname','$mname', '$pcontact','$address','$occupation')");
}
?>



<?php
include('dbconn.php');
if(isset($_POST['submit'])) {
    trim(extract($_POST));
        $query = "INSERT INTO parents (fname,mname,pcontact,address,occupation) VALUES ('$fname','$mname', '$pcontact','$address','$occupation')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Parent registered successfully');</script>";
            echo "<script>window.location.href='parents.php';</script>";
            exit(); 
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
