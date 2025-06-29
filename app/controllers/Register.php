<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Register extends Controller {

    public function index() {
        $this->requireRole("Administration","ADM");
        $user = new User();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $functions = new functions();
            $customId = $functions->generateCustomId($_POST['role']);
            $_POST['user_id'] = $customId;

            $existingUser = $user->where(['email' => $_POST['email']]);

            if ($existingUser) {
                $_SESSION['message'] = "This email is already registered.";
                $_SESSION['message_type'] = 'error';
                functions::redirect('register');
                return;
            }


            try {

                
                $user->insert($_POST);

                $pdo = $user->getConnection();  
                $role = $_POST['role'];
                $pass = password_hash("12345678",PASSWORD_DEFAULT);

                if ($role === "Administration") {
                    $stmt = $pdo->prepare("INSERT INTO admins (user_id, pass, department) VALUES (:id, :pass, :dept)");
                } elseif ($role === "HR") {
                    $stmt = $pdo->prepare("INSERT INTO hr (user_id, pass, department) VALUES (:id, :pass, :dept)");
                } elseif ($role === "Employee") {
                    $stmt = $pdo->prepare("INSERT INTO employee (user_id, pass, department) VALUES (:id, :pass, :dept)");
                } else {
                    throw new Exception("Invalid role.");
                }

                $stmt->execute([
                    ':id' => $customId,
                    ':pass' => $pass,
                    ':dept' => $role,
                ]);

                

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
                    $mail->addAddress($_POST['email'], $_POST['name']);

                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome to ERP System';
                    $mail->Body    = "
                        <h3>Hello {$_POST['name']},</h3>
                        <p>Welcome to the ERP System!</p>
                        <p><strong>User ID:</strong> {$_POST['user_id']}<br>
                        <strong>Default Password:</strong> 12345678</p>
                        <p>Please change your password after your first login.</p>
                        <p>Regards,<br>ERP Admin Team</p>
                    ";

                    $mail->send();
                    
                } catch (Exception $e) {
                    
                    error_log("Mailer Error: " . $mail->ErrorInfo);
                }


                
                $_SESSION['message'] = "User registered successfully!";
                $_SESSION['message_type'] = "success";
                functions::redirect('login');

            } catch (PDOException $e) {
                $_SESSION['message'] = "Database Error: " . $e->getMessage();
                $_SESSION['message_type'] = 'error';
                functions::redirect('register');
            } catch (Exception $e) {
                $_SESSION['message'] = "Error: " . $e->getMessage();
                $_SESSION['message_type'] = 'error';
                functions::redirect('register');
            }
        }

        
        $data["errors"] = $user->errors ?? [];
        $this->view("signup", $data);
    }
}
?>
