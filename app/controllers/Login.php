<?php 
class Login extends Controller {

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userid = $_POST["userId"]; 
            $password = $_POST["password"];
            $role = $_POST["role"];
            $table = "";

            
            if ($role === "admin") {
                $table = "admins";
            } else if ($role === "hr") {
                $table = "hr";
            } else if ($role === "employee") {
                $table = "employee";
            } else {
                $_SESSION['message'] = "Invalid role selected.";
                $_SESSION['message_type'] = 'error';
                functions::redirect('login');
                return;
            }

            $user = new User();
            $userData = $user->login($userid, $table);
            functions::show($userData);

            if ($userData) {
                if ($userData->state !== "Active") {
                    $_SESSION['message'] = "This account is blocked.";
                    $_SESSION['message_type'] = 'error';
                    functions::redirect('login');
                    return;
                }

                if (password_verify($password, $userData->pass)) {
                    $_SESSION['USER'] = [
                        "user_id"    => $userData->user_id,
                        "role" => $userData->department,
                        "state" => $userData->state,
                        
                    ];

                    $_SESSION['message'] = "Login successful!";
                    $_SESSION['message_type'] = 'success';

                    functions::redirect('register');
                    return;
                } else {
                    $_SESSION['message'] = "Incorrect password.";
                    $_SESSION['message_type'] = 'error';
                }

            } else {
                $_SESSION['message'] = "User not found.";
                $_SESSION['message_type'] = 'error';
            }

            functions::redirect('login');
        }

        $this->view("login");
    }
}


?>
