<?php session_start();
include_once('../../includes/config.php');



if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard | Registration and Login</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
     
	 <?php include_once('../../includes/navbar.php');?>
     
	 <div id="layoutSidenav">
          
            <div id="layoutSidenav_content">

     <?php include_once('../../includes/sidebar.php');?> 

                <main>
                    <div class="container-fluid px-4">
                       <h1 class="mt-0">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                           
                        </ol>
                        <div class="row">
<?php
$query=mysqli_query($conn,"select id from user_form");
$totalusers=mysqli_num_rows($query);
?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4" >
                                    <div class="card-body">Total Users 
                                        <span style="font-size:22px;"> <?php echo $totalusers;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="manage-users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
<?php
$query1=mysqli_query($conn,"SELECT id FROM user_form WHERE status='Active' "); 
$activeusers=mysqli_num_rows($query1);
?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Active Users 
                                        <span style="font-size:22px;"> <?php echo $activeusers;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="active-users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
$query2=mysqli_query($conn,"select id from feedback");
$feedback=mysqli_num_rows($query2);
?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-light text-dark mb-4">
                                    <div class="card-body"> Feedbacks
                                        <span style="font-size:22px;"> <?php echo $feedback;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-dark stretched-link" href="feedback-report.php">View Details</a>
                                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
$query3=mysqli_query($conn,"SELECT id from user_form WHERE status='Inactive' ");
$Inactiveusers=mysqli_num_rows($query3);
?>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Inactive Users
                                        <span style="font-size:22px;"> <?php echo $Inactiveusers;?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="inactive-users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
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
<?php } ?>
