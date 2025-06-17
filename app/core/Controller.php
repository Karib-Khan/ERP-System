<?php

class Controller{

    public function view($name, $data=[])
    {
 
        if(!empty($data)){
         extract($data);

        }

         $fileName="../app/views/".$name.".view.php";
         if(file_exists($fileName)){
            require $fileName;
         }else{
            require "../app/views/404.view.php";
         }
    }

    protected function requireRole($expectedRole, $idPrefix = null, $requireActive = true) {
      if (!isset($_SESSION['USER'])) {
          $this->unauthorized();
      }
  
      $user = $_SESSION['USER'];
  
      
      if (strtolower($user['role']) !== strtolower($expectedRole)) {
          $this->unauthorized();
      }
  
      
      if ($idPrefix && strpos($user['user_id'], $idPrefix) !== 0) {
          $this->unauthorized();
      }
  
      
      if ($requireActive && ($user['state'] ?? 'Inactive') !== 'Active') {
          $this->unauthorized();
      }
  }
  
  protected function unauthorized() {
      $_SESSION['message'] = "Unauthorized access.";
      $_SESSION['message_type'] = "error";
      functions::redirect('unauthorized'); // or 'login'
      exit;
  }
  
  
}

?>