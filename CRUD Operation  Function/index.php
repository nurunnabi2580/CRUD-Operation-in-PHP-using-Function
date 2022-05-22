<?php include "header.php";
  session_start();
  if (!isset($_SESSION['userName'])) {
    header('location: login.php');
  }
?>

<!--   |.....................................|
       |============Content Here=============|
       |.....................................| -->
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
     
      <div class="col-md-10 offset-md-1 bd mt-2 p-0">
        <div class="head bg-primary p-3 mb-2">
          <h3 class="float-left">User List User Name:<?php   
            if (isset($_SESSION['userName'])) {
              echo $_SESSION['userName'];
            }
           ?></h3>
          <a href="addUser.php" class="float-right btn btn-warning"><i class="fa-solid fa-plus"></i>Add User</a>
          <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
          <div class="p-3">
            <table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Serial Number</th>
              <th>Full Name</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           <?php 
              include 'database/function.php';

              if (isset($_GET['id'])) {
                $data=deleteUser($_GET['id']);
              }

              $data=dataShow();

              if ($data->num_rows>0) {
                  $sl=1;
                  while ($show=$data->fetch_assoc()) {
                    ?>
                    <tr>

                      <td><?php echo $sl ?></td>
                      <td><?php echo $show['fname'];  ?></td>
                      <td><?php echo $show['userName'];?></td>
                      <td><?php echo $show['email'];?></td>
                      <td><?php echo $show['phone'];?></td>
                      <td>
                        <?php 
                          if ($show['status']==1) {
                            echo '<span class="badge badge-info">Active</span>';
                          }
                          else{
                            echo '<span class="badge badge-warning">Inactive</span>';
                          }
                        ?>   
                      </td>
                      <td>
                        <a href="editUser.php?userId=<?php echo $show['id']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#delete<?php echo $show['id'] ?>" ><i class="fa-solid fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php $sl++;
                  ?>
                  <!-- Modal -->
                  <div class="modal fade" id="delete<?php echo $show['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirmation Messege</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are You Sure want To Delete this user?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                          <a href="index.php?id=<?php echo $show['id'] ?> " type="button" class="btn btn-danger">Confirm</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                
              }
              else{
                echo "not found";
              }

           ?>

         </tbody>
        </table>
          </div>
      </div>
  </div>
</div>

<?php include "footer.php" ?> 

  
