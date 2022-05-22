<?php 
$con=new mysqli("localhost","root","","table_all");

 function userInsert($fname,$userName,$email,$phone,$status){
 	  global $con;
 	$command="INSERT INTO tb_student(fname,userName,email,phone,status) VALUES('$fname','$userName','$email','$phone','$status') ";
 	$result=$con->query( $command);
 	if ($result) {
 		return '<div class="alert alert-success" role="alert"> successfully insert! </div>';
 	}
 	else{
 		return '<div class="alert alert-danger" role="alert">Error not save!'.$con->error.' </div>';
 	}
 }
 function dataShow(){
 	global $con;
 	$command="SELECT *FROM tb_student"; 
 	$result=$con->query($command);
 	return $result; 
 }
function dataShowforEdit($id){
    global $con;
    $command= "SELECT *FROM tb_student WHERE id='$id'";
    $result=$con->query($command);
    return $result;

}

function userUpdate($fname,$userName,$email,$phone,$status,$id){
      global $con;
    $command="UPDATE tb_student SET fname='$fname',userName='$userName',email='$email',phone='$phone',status='$status' WHERE id='$id'";
    $result=$con->query( $command);
    if ($result) {
        header('location:index.php');
    }
    else{
        return '<div class="alert alert-danger" role="alert">Error not save!'.$con->error.' </div>';
    }
 }

 function deleteUser($id){
    global $con; 
    $command="DELETE FROM tb_student WHERE id='$id'";
    $result=$con->query( $command);
    if ($result) {
        header('location:index.php');
    }
    else{
        return '<div class="alert alert-danger" role="alert">Error not save!'.$con->error.' </div>';
    }
 }