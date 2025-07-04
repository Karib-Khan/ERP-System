<?php 

if($_SERVER['SERVER_NAME']=='localhost'){
    // define('ROOT','http://localhost/projects/ERP/public');
    define('ROOT', rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/'));

    define('DBHOST','localhost');
    define('DBNAME','erp-system');
    define('DBUSER','root');
    define('DBPASS','');
}else{
    define('ROOT', rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/'));
    define('DBHOST','sql300.infinityfree.com');
    define('DBNAME','if0_39392674_my_erp_db');
    define('DBUSER','if0_39392674');
    define('DBPASS','pJNk7HMwdMeNj');
}

    define("DEBUG",true);
?>