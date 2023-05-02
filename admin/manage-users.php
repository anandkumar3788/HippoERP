<?php session_start();
include_once('../../includes/config.php');

if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($conn,"delete from user_form where id='$adminid'"); 
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manage Users | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" />
		<link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> 
		
		
		
    </head>
    <body class="sb-nav-fixed">
       
	   <?php include_once('../../includes/navbar.php');?>
	   
        <div id="layoutSidenav">
           
		   <?php include_once('../../includes/sidebar.php');?>
		   
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="modal-title" style="padding:0px;">Manage Users</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage users</li>
                        </ol>
				
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered User Details

								
						<a href="add-user.php" class="btn btn-success" data-toggle="modal"style="float:right;"><i class="fas fa-plus"></i><span>Add New User</span></a>
								</div>

                     <script> 
                  $(document).ready(function() {
    $('#mydata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
                </script>



                            <div class="card-body">
                                  <table class="table.display.nowrap" id="mydata">
                                    <thead>
                                        <tr>
                                             <th>Sno.</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Role</th>
                                  <th>Status</th>
                                  <th>Reg. Date</th>
                                  <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                              <?php $ret=mysqli_query($conn,"select * from user_form");
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                                  <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['fname'];?></td>
                                  <td><?php echo $row['lname'];?></td>
                                  <td><?php echo $row['email'];?></td>
                                  <td><?php echo $row['contact'];?></td>
                                  <td><?php echo $row['user_role'];?></td>
                                  <td><?php echo $row['status'];?></td> 
                                   <td><?php echo $row['date'];?></td>
                                  <td>
                                     
                                    
                                     <a href="edit-profile.php?uid=<?php echo $row['id'];?>"class="btn btn-primary" data-toggle="modal"><i class="fas fa-edit"></i> <span>Edit</span> 
                          </a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>" onClick="return confirm('Do you really want to delete');"class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash"></i> <span>Delete</span></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  
            </div>
        </div>
        
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
		    
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
          <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet" />
		
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
 <script src="../js/scripts.js"></script>
        <script src="../js/datatables-simple-demo.js"></script>
		
		
    </body>
</html>
<?php } ?>