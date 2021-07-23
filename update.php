<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("#myModal").modal('show');
        });
    </script>
<style> 
.modal-body{
    background: linear-gradient(to top, #ffffff 0%, #0000ff 100%);
  
}
.btn btn-success{
    border-radius:15px;

    

}
.modal-content{
    border-radius:15px;
}
.form-group{
    border-radius:30px;
    margin-left:10px;
    margin-right:50px;
   
}
.bi bi-cloud-upload-fill{
    font-size:36px;
}

</style>
</head>
<?php
include "connect.php";
$sno = $_GET['sno'];

	$sql = "SELECT * FROM `data` WHERE `sno` = '$sno' ";
	$query = mysqli_query($connect,$sql);
	
    if($row = mysqli_fetch_array($query)){
        echo $sno;
    $uid= $row["id"];
    $uname= $row["name"];
    $uaddress= $row["address"];
    $usalary= $row["salary"];
    }

?>

<body>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">UPDATE DATA</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><h3>Update Your Detail <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z"/>
</svg></h3></p>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="Name" value="<?php echo $uname ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Id" name="Id" value="<?php echo $uid ?>">
                        </div>
                       <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo $uaddress ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Salary" name="Salary" value="<?php echo $usalary ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST["update"])){
$upname=$_POST["Name"];
$upid=$_POST["Id"];
$upaddress=$_POST["Address"];
$upsalary=$_POST["Salary"];
$sqli = "UPDATE `data` SET `name` = '$upname',`address` = '$upaddress',`id` = '$upid',`salary` = '$upsalary' WHERE `sno` = '$sno'";
$queryy = mysqli_query($connect,$sqli);

	if(isset($queryy))
	{
			echo '<script>alert("Success");</script>';
			header('location:index.php');
	}
	else
	{
			echo '<script>alert("Fail");</script>';
			header('location:index.php');
	}
}


?>