<?php 

// if($_SERVER['SERVER_NAME']=='localhost'){
//     // define('ROOT','http://localhost/projects/ERP/public');
//     define('ROOT', rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/'));

//     define('DBHOST','localhost');
//     define('DBNAME','erp-system');
//     define('DBUSER','root');
//     define('DBPASS','');
// }else{
//     define('ROOT', rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/'));
//     define('DBHOST','sql300.infinityfree.com');
//     define('DBNAME','if0_39392674_my_erp_db');
//     define('DBUSER','if0_39392674');
//     define('DBPASS','pJNk7HMwdMeNj');
// }

//     define("DEBUG",true);





// define('ROOT', rtrim((isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']), '/'));

// // Use environment variables or fallback to local dev defaults
// define('DBHOST', getenv('DB_HOST') ?: 'localhost');
// define('DBNAME', getenv('DB_NAME') ?: 'erp-system');
// define('DBUSER', getenv('DB_USER') ?: 'root');
// define('DBPASS', getenv('DB_PASS') ?: '');

// define("DEBUG", true);

try {
    $options = [
        PDO::MYSQL_ATTR_SSL_CA => '/etc/ssl/certs/ca-certificates.crt',
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // optionally true for full cert validation
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $pdo = new PDO(
        "mysql:host=" . DBHOST . ";port=4018;dbname=" . DBNAME . ";charset=utf8mb4",
        DBUSER,
        DBPASS,
        $options
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


?>