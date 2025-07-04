<?php 

class Employee Extends Controller{

    public function index(){
        $this->requireRole('Employee','EMP');
        $this->view('employee/dashboard');

}

public function profile(){
    $this->requireRole('Employee','EMP');
    $user_id=$_SESSION['USER']['user_id'];
    $adminModel=new AdminModel();
    $profile = $adminModel->getAllUserData($user_id);

    $data=['profile'=>$profile];
    $this->view('employee/profile',$data);
}



public function userProfile($user_id){
    $this->requireRole('Employee','EMP');
           $adminModel=new AdminModel();
           $profile = $adminModel->getAllUserData($user_id);
           $data=['profile'=>$profile];
           $this->view('employee/profile',$data);
       }





}


?>