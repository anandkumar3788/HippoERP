<?php
use PHPMailer\PHPMailer\PHPMailer;
error_reporting(0);
?>
<html>
    <head>
         <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Recovery</title>    
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
                  
                    <hr />
                   <h4 class="text-center font-weight-light my-4"> <img src="forgot-password.png"> </h4> <br /> 
                    <div class="card-body">

                    <?php
                    include_once('../../includes/config.php');
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sel_query = "SELECT * FROM `user_form` WHERE email='" . $email . "'";
                            $results = mysqli_query($conn, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "User Not Found";
                            }
                        }
                        if ($error != "") {
                            echo "<div class='error'>" . $error . "</div><br />";
                        }

                        else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($conn, "INSERT INTO `password_reset` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/hippoerp/loginsystem/admin/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/hippoerp/loginsystem/admin/reset_password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            require '../vendor/autoload.php';
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->Host = "smtp.gmail.com"; // Enter your host here
                            $mail->SMTPAuth = true;
                            $mail->Username = "aaanandkumar6@gmail.com"; // Enter your email here
                            $mail->Password = "pzqeaqvrgejycvgv"; //Enter your passwrod here
                            $mail->Port = 587;
                            $mail->IsHTML(true);
                            $mail->From = "aaanandkumar6@gmail.com";
                            $mail->FromName = "HippoERP";

                            $mail->Subject = $subject;
                            $mail->Body = $body;
                            $mail->AddAddress($email_to);
                            if (!$mail->Send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            } else {
                                echo "<h4>An email has been sent</h4>";
                            }
                        }
                    }
                    ?>
                    <form method="post" action="" name="reset">
                        
                      <br />
                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" class="form-control"/>
                        </div>
                        <br />  
                        <div class="form-group">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                        </div>
                    </form>
                   </div> 
                </div>
            </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </main>
</div>
</div>

    </body>
</html>



