<?php 

class AdminModel{
    use Model;

    protected $table='users';

    public function getAllUserData($user_id){

        if(!isset($_SESSION['USER'])){
            functions::redirect('login');
            return;
        }

        

        $pdo = $this->getConnection();
        $query = "SELECT * FROM $this->table WHERE user_id = :user_id LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
        

    }

    public function getCombinedData() {
        $pdo = $this->getConnection();
    
        
        $stmt1 = $pdo->prepare("SELECT * FROM hr");
        $stmt1->execute();
        $hrs = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    
        
        $stmt2 = $pdo->prepare("SELECT * FROM admins");
        $stmt2->execute();
        $admins = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
        
        $stmt3 = $pdo->prepare("SELECT * FROM employee");
        $stmt3->execute();
        $employees = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    
        
        $combined = array_merge($hrs, $admins, $employees);

        usort($combined, function($a, $b) {
            return strcmp($a['user_id'], $b['user_id']);
        });
    
        return $combined;
    }

    public function getUserDataById($user_id){

        if(!isset($_SESSION['USER'])){
            functions::redirect('login');
            return;
        }

        

        $pdo = $this->getConnection();
        $query = "SELECT * FROM $this->table WHERE user_id = :user_id LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
        

    }
    

}

?>