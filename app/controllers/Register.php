<?php 
class Register extends Controller {

    public function index() {
        $user = new User();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $functions = new functions();
            $customId = $functions->generateCustomId($_POST['role']);
            $_POST['user_id'] = $customId;

            try {
                // Insert into users table
                $user->insert($_POST);

                // Role-specific table insert
                $pdo = $user->getConnection();  
                $role = $_POST['role'];
                $pass = '12345678';

                if ($role === "Administration") {
                    $stmt = $pdo->prepare("INSERT INTO admins (admin_id, pass, department) VALUES (:id, :pass, :dept)");
                } elseif ($role === "HR") {
                    $stmt = $pdo->prepare("INSERT INTO hr (hr_id, pass, department) VALUES (:id, :pass, :dept)");
                } elseif ($role === "Employee") {
                    $stmt = $pdo->prepare("INSERT INTO employee (emp_id, pass, department) VALUES (:id, :pass, :dept)");
                } else {
                    throw new Exception("Invalid role.");
                }

                $stmt->execute([
                    ':id' => $customId,
                    ':pass' => $pass,
                    ':dept' => $role,
                ]);

                // Set success message
                $_SESSION['message'] = "User registered successfully!";
                $_SESSION['message_type'] = "success";
                functions::redirect('home');

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
