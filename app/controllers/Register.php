<?php 
class Register extends Controller {

    public function index() {
        $this->requireRole("Administration","ADM");
        $user = new User();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $functions = new functions();
            $customId = $functions->generateCustomId($_POST['role']);
            $_POST['user_id'] = $customId;

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
