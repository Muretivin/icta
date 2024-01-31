<?php
session_start();
include ('config.php');
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require_once 'vendor/autoload.php';
 


function send_password_reset($get_first_name,$get_email,$token){
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'muretivincent6@gmail.com';                     //SMTP username
    $mail->Password   = '***';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('muretivincent6@gmail.com', $get_first_name);
    $mail->addAddress($get_email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'reset password notification';
    $email_template    = '<h1> hello</h1>
    <h3> you have recieved this email beacuse we recieved a password reset request for your accout
    <a href="http://localhost/ICTA/changepassword.php?verify_token=$token&email=$get_email"> click Me</a>';
    //$mail->AltBody = 'CLICK ME TO RESET YOUR PASSWORD';
    $mail->Body    = $email_template;
    $mail->send();
    echo "mail sent succesfuly";
} 
/*catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";


} 
*/

if (isset($_POST['password_reset_link'])) {
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $token = md5(rand());

     $check_email= " SELECT email  FROM staff WHERE email='$email' LIMIT 1";
     $check_email_run = mysqli_query($conn, $check_email);

     if(mysqli_num_rows($check_email_run)> 0){
        $row = mysqli_fetch_array($check_email_run);
        $get_first_name = $row['FirstName'];
        $get_email = $row['email'];

        $update_token = "UPDATE staff SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn,$update_token);
        
        if ($update_token_run) {
            send_password_reset($get_first_name,$get_email,$token);
            $_SESSION['status'] = "we mailed you a password reset link";
            header("Location: resetpassword.php");
            exit(0);
        }   
        }else{
            $_SESSION['status'] = "something went wrong";
            header("Location: resetpassword.php");
            exit(0);
         }

     }
     else{
        $_SESSION['status'] = "no email found";
        header("Location: resetpassword.php");
        exit(0);
     }

     if (isset($_POST['reset_password'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);
        $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
        $token = mysqli_real_escape_string($conn, $_POST['password_token']);
     }

     if (!empty($token)) {
        if (!empty($email) && !empty($newpassword) && !empty($confirmpassword)) {

            $check_token = "SELECT  verify_token FROM staff verify_token='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn,$check_token);


            if (mysqli_num_rows() > 0) {
                

                if ($newpassword == $confirmpassword) {
                    
                    $update_password = "UPDATE staff SET password='$newpassword' WHERE verify_token='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn,$update_password);

                    if ($update_password_run) {
                        $new_token = md5(rand());
                        $update_new_token = "UPDATE staff SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                        $update_new_token_run = mysqli_query($conn,$update_new_token);

                        $_SESSION['status'] = " password updated you can log in";
                        header("Location: login.php");
                        exit(0);
                        
                    }
                    else{

                        $_SESSION['status'] = " did not update the password something went wrong";
                        header("Location: changepassword.php");
                        exit(0);
                    }
                }
                else{

                    $_SESSION['status'] = " newpassword and confirm password does not match";
                    header("Location: changepassword.php");
                    exit(0);
                }
            }
            else{

                $_SESSION['status'] = " no token found";
                header("Location: changepassword.php");
                exit(0);
            }
            
            
        }
        else{

            $_SESSION['status'] = " All fields required";
            header("Location: changepassword.php");
            exit(0);
    
         }
        
     }else{

        $_SESSION['status'] = "no token available";
        header("Location: changepassword.php");
        exit(0);

     }

     



?>