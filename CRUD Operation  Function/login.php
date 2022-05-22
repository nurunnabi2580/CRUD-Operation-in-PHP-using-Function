<?php include "header.php" 

?>

<style type="text/css">
  .head{
    overflow: hidden;
  }
  .bd{
    box-shadow: 1px 1px 3px rgba(255, 0, 0, .5); 
  }
</style>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2  mt-4">
			<div class="head bg-primary p-3 ">
	          <h3 class="float-left">User List</h3>
	          <a href="index.php" class="float-right btn btn-warning"><i class="fa-solid fa-eye"></i>User</a>
	        </div>
	        <form method="POST" class="bd p-3">
	          <h2 class="bg-success">Login Form</h2>

	       <?php
	            if (isset($_POST['save'])) {
	            	$userName=$_POST['uname'];
	            	$password=$_POST['pass'];
	            	if ($userName=="admin" && $password=="12345") {
	            		session_start();
	            		$_SESSION['userName']=$userName;
	            		header('location:index.php');
	            	}

	            }
	            

	          ?>
	          <div class="form-group">
	            <label for="uname">Enter your Full Name</label>
	            <input name="uname" type="text " class="form-control" id="uname"  placeholder="Enter Your Name...">
	          </div>


	          <div class="form-group">
	            
	            <label for="password">Enter your Pasword</label>
	            <input name="pass" type="password " class="form-control" id="password" placeholder="Enter Your Password...">
	          </div>
	            
	          <button name="save" type="submit" class="btn btn-primary">Submit</button>
	        </form>
      </div>
	</div>
</div>

<?php include "footer.php" ?>