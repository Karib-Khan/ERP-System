<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Verification extends Controller{
    public function index(){
        
        if(!isset($_SESSION['USER'])){
            functions::redirect('404');
            return;
        } 

        $user=new User();
        $email=$user->getEmailById($_SESSION['USER']['user_id']);
        $function= new functions();
        $code=$function->generateCode();
        
        $_SESSION['USER']['VERIFICATION_CODE'] = $code;

        
            require '../vendor/autoload.php'; 
    
                    $mail = new PHPMailer(true);
    
                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'kkarib87@gmail.com'; 
                        $mail->Password   = 'blbwpnborltzreoc';     
                        $mail->SMTPSecure = 'tls';
                        $mail->Port       = 587;
    
                        $mail->setFrom('kkarib87@gmail.com', 'ERP Admin');
                        $mail->addAddress($email->email, 'User');
    
                        $mail->isHTML(true);
                        $mail->Subject = 'Reset Password';
                        $mail->Body    = "
                            <h3>Hello User,</h3>
                            <p>This is your one-time Verification Code.</p>
    
                            <p> <strong>CODE: $code</strong> </p>
    
                            <p>Regards,<br>ERP Admin Team</p>
                        ";
    
                        $mail->send();
                        
                    } catch (Exception $e) {
                        
                        error_log("Mailer Error: " . $mail->ErrorInfo);
                    }

                    $this->view("verify_password");
        }

        public function verifyCode(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $given_code=strval($_POST['verificationCode']);
                $session_code=strval($_SESSION['USER']['VERIFICATION_CODE']);

                if(isset($_SESSION['USER']['VERIFICATION_CODE']) && $given_code===$session_code){
                    unset($_SESSION['USER']['VERIFICATION_CODE']);
                    functions::redirect('resetpassword');
                }else{
                    $_SESSION['message']='Invalid Verification code';
                    $_SESSION['message_type']='error';
                    functions::redirect('admin');
                }

            }

        }


    }


?>