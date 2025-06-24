<?php 
//user class
class User{
    use Model;

    protected $table ='users';

    protected $allowedColumns =[
        'name','age',"dob","gender","nationality","maritial_status","address","phone","email","nid","user_id"
    ];

    protected $allowedTables = ['admins', 'employee', 'hr'];



 public function login($userid,$table){
  
    $pdo=$this->getConnection();

    $query="SELECT * FROM $table WHERE user_id = :user_id LIMIT 1";
    $stmt=$pdo->prepare($query);
    $stmt->execute(['user_id'=>$userid]);
    $user=$stmt->fetch(PDO::FETCH_OBJ);

    return $user;

 }


 public function updatePassword($table, $userID, $password){

    if (!in_array($table, $this->allowedTables)) {
        throw new Exception("Invalid table specified.");
    }

    $pdo=$this->getConnection();
    $query="UPDATE $table SET pass = :pass WHERE user_id = :user_id";
    $stmt=$pdo->prepare($query);
    $stmt->execute(['pass'=>$password,'user_id'=>$userID]);
    
 }

 public function getEmailById($userid) {
   $pdo = $this->getConnection();
   $query = "SELECT email FROM users WHERE user_id = :user_id LIMIT 1";
   
   $stmt = $pdo->prepare($query);
   $stmt->execute(['user_id' => $userid]);
   
   return $stmt->fetch(PDO::FETCH_OBJ);
}



    
}


?>