<?php 

class Admin extends Controller{

public function index(){
$this->requireRole('Administration','ADM');
$this->view('admin/dashboard');

}

public function profile(){
    
    $this->view('admin/profile');
}


}



?>