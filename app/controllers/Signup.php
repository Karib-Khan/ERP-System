<?php 
class Signup extends Controller{


 public function index(){

    $user=new User();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($user->validate($_POST)) {
            $user->insert($_POST);
            functions::redirect('home');
        }
    }


    $data["errors"]=$user->errors;
    $this->view("signup",$data);
 }

}


?>