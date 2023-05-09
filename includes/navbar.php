<nav class="sb-topnav navbar navbar-expand navbar-white bg-white">
<?php 
include_once('../../includes/config.php');
error_reporting(0 );

?>
            <!-- Navbar Brand-->
			<div class="logo-details">
            <div class="logo">
                <img src="HIPPOERP Final Png.png">
            </div>
        </div>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                 &nbsp;
                </div>
            </form>
             <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-5 my-5 my-md-0" method="post" action="search-result.php">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search User by name , email and contact number" title="Search User by name , email and contact number" aria-describedby="btnNavbarSearch" name="searchkey" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit" ><i class="fas fa-search"></i></button>
                </div>
            </form>

            <?php

            //$sql_get = mysqli_query($conn,"SELECT * FROM comments WHERE is_read=0");
            //$count = mysqli_num_rows($sql_get);

            $sql = "SELECT COUNT(*) AS count FROM comments WHERE is_read = '0'";

// Execute query
$result = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($result)['count'];

// Return count as JSON response
//echo json_encode(['count' => $count]);
            ?>

            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                   <div id="bell-icon">
                     <span id="notification-count">
                   <a class="nav-link" id="navbarDropdown" href="bell-alerts.php" role="button"  aria-expanded="false"><i class="fas fa-bell"></i><span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"><?php echo $count; ?></span></a>
                         
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <?php
                     $sql_get1 = mysqli_query($conn,"SELECT * FROM comments WHERE is_read=0");
                     if(mysqli_num_rows($sql_get1)>0)
                     {
                       while($result = mysqli_fetch_assoc($sql_get1))
                        {
                           echo '<a class="dropdown-item text-primary font-weight-bold" href="bell-alerts.php"></a>';
                           echo '<div class="dropdown-divider"></div>';
                        } 
                     }
                    else
                     {
                        echo '<a class="dropdown-item text-danger font-weight-bold" href="#">Sorry! No Messages</a>';
                     }

                    ?>-->


                  </div>
                </span>
                    </div>
                </li>
            </ul>



            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="admin-profile.php">My Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
