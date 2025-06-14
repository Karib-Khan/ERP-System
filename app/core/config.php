<?php 

if($_SERVER['SERVER_NAME']=='localhost'){
    define('ROOT','http://localhost/projects/ERP/public');
    define('DBHOST','localhost');
    define('DBNAME','erp-system');
    define('DBUSER','root');
    define('DBPASS','');
}else{
    define('ROOT','https://www.youwebsite.com');
}

    define("DEBUG",true);
?>