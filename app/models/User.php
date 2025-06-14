<?php 
//user class
class User{
    use Model;

    protected $table ='users';

    protected $allowedColumns =[
        'name','age',"dob","gender","nationality","maritial_status","address","phone","email","nid","user_id"
    ];



    public function validate($data){
        $this->errors = [];
    
        if (empty($data['email'])) {
            $this->errors['email'] = "Email field is empty";
        } else if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        }
    
        if (empty($data['password'])) {
            $this->errors['password'] = "Password field is empty";
        }
    
        return empty($this->errors);
    }
    
}


?>