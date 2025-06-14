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
}

?>