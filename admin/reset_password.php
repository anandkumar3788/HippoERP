
<html>
    <head>
    	 <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reset Password</title>
        <link rel="shortcut icon" href="favicon.ico"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    </head>
    <body class="bg-indigo">
    	<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
       <main>
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                	<div class="card shadow-lg border-0 rounded-lg mt-5">
                		 <center><div class="logo">
                <img src="HIPPOERP Final Png.png">
            </div></center>

<?php
include_once('../../includes/config.php');
error_reporting(0);
 if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                        $key = $_GET["key"];                                                                                     
                        $email = $_GET["email"];
                        $curDate = date("Y-m-d H:i:s");
                        $query = mysqli_query($conn, "SELECT * FROM `password_reset` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
                        $row = mysqli_num_rows($query);
                        if ($row == "") {
                            $error .= '<h2>Invalid Link.</h2>';
                        } else {
                            $row = mysqli_fetch_assoc($query);
                            $expDate = $row['expDate'];
                            if ($expDate >= $curDate) {
 ?> 
 
 	<hr />
  <h2 class="text-center font-weight-light my-4"><img src="reset-password.png"></h2>
   <div class="card-body">
  
                                <form method="post" action="" name="update">

                                    <input type="hidden" name="action" value="update" class="form-control"/>


                                    <div class="form-group">
                                        <label><strong>Enter New Password:</strong></label>
                                        <input type="password"  name="pass1" value="update" class="form-control"/>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Re-Enter New Password:</strong></label>
                                        <input type="password"  name="pass2" value="update" class="form-control"/>
                                    </div>
                                    <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                                    <br />
                                    <div class="form-group">
                                        <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                                    </div>

                                </form>
                                <?php
                            } else {
                                $error .= "<h2>Link Expired</h2>>";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }
                    }


                    if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                        $error = "";
                        $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
                        $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
                        $email = $_POST["email"];
                        $curDate = date("Y-m-d H:i:s");
                        if ($pass1 != $pass2) {
                            $error .= "<p>Password do not match, both password should be same.<br /><br /></p>";
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $pass1 = md5($pass1);
                            mysqli_query($conn, "UPDATE `user_form` SET `password` = '" . $pass1 . "', `trn_date` = '" . $curDate . "' WHERE `email` = '" . $email . "'");

                            mysqli_query($conn, "DELETE FROM `password_reset` WHERE `email` = '$email'");

                            echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>';
                        }
                    }
                    ?>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

</div>
</div>
</main>
</div>
</div>
    </body>
</html>