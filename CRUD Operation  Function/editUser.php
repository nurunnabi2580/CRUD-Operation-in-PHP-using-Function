<?php include "header.php" ?>

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
	          <h2 class="bg-success">Student Information Form</h2>

	          <?php
	            
	            include "database/function.php";
	            if (isset($_POST['save'])) {
	              $fname=$_POST['fname'];
	              $userName=$_POST['uname'];
	              $email=$_POST['email'];
	              $phone=$_POST['phone'];
	              $status=$_POST['status'];

	              if (empty($fname)) {
	                echo '<div class="alert alert-danger" role="alert">Name reqired! </div>';
	              }
	              else if (empty( $userName)) {
	                echo '<div class="alert alert-danger" role="alert">User Name reqired! </div>';
	              }
	              else if (empty( $email)) {
	                echo '<div class="alert alert-danger" role="alert">Emailreqired! </div>';
	              }
	              else if (empty($phone)) {
	                echo '<div class="alert alert-danger" role="alert">Phone number reqired! </div>';
	              }
	              else if (empty($status)) {
	                echo '<div class="alert alert-danger" role="alert">Select status! </div>';
	              }

	              else{
	              	$id=$_GET['userId'];
	                $msg=userUpdate($fname,$userName,$email,$phone,$status,$id);
	                echo  $msg;
	              }
	            }
	          ?>

	          <?php 
				

				if (isset($_GET['userId'])) {
				$id=$_GET['userId'];
				$data=dataShowforEdit($id);
				while ($show=$data->fetch_assoc()) {?>

	          <div class="form-group">
	            <label for="fname">Enter your Full Name</label>
	            <input name="fname" type="text " class="form-control" id="fname"  placeholder="Enter Your Name..." value="<?php echo $show["fname"]; ?> ">
	          </div>

	          <div class="form-group">
	            
	            <label for="fname">Enter your User Name</label>
	            <input name="uname" type="text " class="form-control" id="uname" placeholder="Enter Your User Name..." value="<?php echo $show["userName"]; ?>">
	          </div>

	          <div class="form-group">
	            
	            <label for="email">Enter your Email</label>
	            <input name="email" type="email" class="form-control" id="email" placeholder="Enter Your Email..." value="<?php echo $show["email"]; ?>">
	          </div>

	          <div class="form-group">
	            
	            <label for="phone">Enter your Phone</label>
	            <input name="phone" type="number " class="form-control" id="phonetext" placeholder="Enter Your Phone..." value="<?php echo $show["phone"]; ?>">
	          </div>


	          <div class="form-group">
	            
	            <label for="phone">Status</label>
	            <select class="form-control" name="status">
	              <option value="<?php echo $show["status"]; ?>" ><?php if ($show["status"]==1) {
	              		echo "Active";
	              }else{
	              	echo "Inactive";
	              }
	               ?></option>
	              <option value="1">Active</option>
	              <option value="2">Inactive</option>
	            </select>
	          </div>  
	          <button name="save" type="submit" class="btn btn-primary">Update</button>
	        </form>
	        		<?php 
						} 
					}
					else
					{
						header('location:index.php');
					}
				?>
      </div>
	</div>
</div>

<?php include "footer.php" ?>








	