<?php

class Logout extends Controller {

    public function index() {
        
        session_unset();    
        session_destroy();  
        session_start();
        $_SESSION['message'] = "You have been logged out successfully.";
        $_SESSION['message_type'] = "success";

        
        functions::redirect('login');
    }

}
