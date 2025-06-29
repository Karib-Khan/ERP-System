<?php 

class Admin extends Controller{

public function index(){
        $this->requireRole('Administration','ADM');
        $this->view('admin/dashboard');

}

public function profile(){
 $this->requireRole('Administration','ADM');
    $user_id=$_SESSION['USER']['user_id'];
    $adminModel=new AdminModel();
    $profile = $adminModel->getAllUserData($user_id);

    $data=['profile'=>$profile];
    $this->view('admin/profile',$data);
}

public function showAllemployes(){
        $adminModel=new AdminModel();
        $data=$adminModel->getCombinedData();

        $this->view('admin/employee-list-admin',$data);


}

public function userProfile($user_id){
        $this->requireRole('Administration','ADM');
           $adminModel=new AdminModel();
           $profile = $adminModel->getAllUserData($user_id);
           $data=['profile'=>$profile];
           $this->view('employee/profile',$data);
       }


}



?>