<?php 
//user class
class User{
    use Model;

    protected $table ='users';

    protected $allowedColumns =[
        'name','age',"dob","gender","nationality","maritial_status","address","phone","email","nid","user_id"
    ];


 public function login($userid,$table){
  
    $pdo=$this->getConnection();

    $query="SELECT * FROM $table WHERE user_id = :user_id LIMIT 1";
    $stmt=$pdo->prepare($query);
    $stmt->execute(['user_id'=>$userid]);
    $user=$stmt->fetch(PDO::FETCH_OBJ);

    return $user;

 }

    
}


?>