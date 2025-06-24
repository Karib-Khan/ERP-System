<?php 
class Resetpassword extends Controller {

    public function index() {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $pass1 = strval($_POST['password'] ?? '');
            $pass2 = strval($_POST['confirm_password'] ?? '');

            
            if ($pass1 !== $pass2) {
                $_SESSION['message'] = "Passwords do not match.";
                $_SESSION['message_type'] = 'error';
                functions::redirect('resetpassword');
                return;
            }

            $user_id = $_SESSION['USER']['user_id'];
            $role    = $_SESSION['USER']['role'];

            
            if ($role === "Administration") {
                $table = 'admins';
            } elseif ($role === "HR") {
                $table = 'hr';
            } elseif ($role === "Employee") {
                $table = 'employee';
            } else {
                $_SESSION['message'] = "Invalid role.";
                $_SESSION['message_type'] = 'error';
                functions::redirect('resetpassword');
                functions::show('Table not found');
                return;
            }

            try {
                $password = password_hash($pass1, PASSWORD_DEFAULT);

                $user = new User();  
                $user->updatePassword($table, $user_id, $password);

                $_SESSION['message'] = "Password updated successfully.";
                $_SESSION['message_type'] = 'success';
                session_unset();    
                session_destroy();  
                session_start();
                functions::redirect('login');

            } catch (Exception $e) {
                $_SESSION['message'] = "Error updating password: " . $e->getMessage();
                $_SESSION['message_type'] = 'error';
                functions::redirect('resetpassword');
            }
        }

        $this->view('reset_password');
    }
}
?>
