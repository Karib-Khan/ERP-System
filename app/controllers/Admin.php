<?php 

class Admin extends Controller{

public function index(){
    if(!isset($_SESSION['USER'])){
        functions::redirect('login');
        return;
    }
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


public function toggleUserStatus($user_id) {
        try {
            $user = new AdminModel(); 
            $user->toggleUserState($user_id);
    
            $_SESSION['message'] = "User status updated successfully!";
            $_SESSION['message_type'] = 'success';
        } catch (Exception $e) {
            $_SESSION['message'] = "Error: " . $e->getMessage();
            $_SESSION['message_type'] = 'error';
        }
        $this->showAllemployes();
        
    }
    


}



?>