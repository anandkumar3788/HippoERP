<?php session_start();
error_reporting(0);
include_once('../../includes/config.php');
// Check if the user is logged in as an administrator
	
if(isset($_POST['submit']))
{	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $email=$_POST['email'];
	$contact=$_POST['contact'];
	$user_role=$_POST['user_role'];
	$status=$_POST['status'];
	$date=$_POST['date'];

	$sql=mysqli_query($conn,"select id from user_form where email='$email'");
 $row=mysqli_num_rows($sql);
	 
	
	$sql = "insert into user_form (fname, lname, email, contact,user_role, status, date) values ('$fname', '$lname', '$email', '$contact', '$user_role', '$status', '$date')";
	
	if (mysqli_query($conn, $sql)) {
		echo "<script>alert('user added successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'manage-users.php'; </script>";
	} else {
		echo "Error" . $sql. "<br>" . mysqli_error($conn);
	
	
}
}
	
	mysqli_close($conn);


?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add User | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
					
				
	

					
					
					<h4 class="modal-title" style="padding:0px;">Add User Details</h4>
					 <ol class="breadcrumb mb-4">
					 <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="manage-users.php">Manage Users</a></li>
                            <li class="breadcrumb-item active">Add User Details</li>
                        </ol>
                        
   
                        <div class="card mb-4">
						
 						
						 
                     <form method="post" action="add-user.php">
					
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>First Name</th>
                                       <td><input class="form-control" id="fname" name="fname" type="text"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>Last Name</th>
                                       <td><input class="form-control" id="lname" name="lname" type="text"  required /></td>
                                   </tr>
                                        
                                       <th>Email</th>
                                       <td><input class="form-control" id="email" name="email" type="text"  required /></td>
                                   </tr>
								      
									   <tr>
                                       <th>Contact No.</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="contact" type="text"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10"  required /></td>
                                   </tr>


                                   <tr>
                                   <th>Role</th>
                                   <td>
                                   	<select class="form-control"  name="user_role" id="user_role" required />
                                   		<option value="">Select</option>
                                   <option value="user">User</option>
                                   <option value="Front Office">Front Office</option>
                                    <option value="Manager">Manager</option>
                               </select>
                           </td>
                           </tr>

                                    <tr>
                                   <th>Status</th>
                                   <td>
                                   	<select class="form-control"  name="status" id="status" required />
                                   		<option value="">Select</option>
                                   <option value="Active">Active</option>
                                   <option value="Inactive">Inactive</option>
                               </select>
                           </td>
                           </tr>
                                     
                                        <tr>
                                       <th>Reg. Date</th>
                                       <td><input class="form-control" id="date" name="date" type="Date"  required /></td>
                                   </tr>

                                   <tr>
                                   

                                   <tr>
                                       <td colspan="4" style="text-align:center ;">
                                     <button type="submit" class="btn btn-primary btn-block" name="submit" style="float:right;">Add</button>

                                       		
                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>

                    </div>
                </main>
        
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>

