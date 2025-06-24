<?php 
class functions{
    use Database;
    public static function show($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    
    }

    public static function esc($str){
       return htmlspecialchars(($str));
    }


    public static function redirect($path){
       header("Location: ".ROOT."/".$path);
       die;
    }


    public function generateCustomId($role) {
        $pdo = $this->getConnection();
    
        
        $stmt = $pdo->query("SELECT MAX(id) AS max_id FROM users");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $row ? (int)$row['max_id'] : 0;
    
        
        $newIdNum = $lastId + 1;
    
        
        $prefix = match (strtoupper($role)) {
            'ADMINISTRATION' => 'ADM',
            'HR'             => 'HRM',
            'EMPLOYEE'       => 'EMP',
            default          => 'UNK',
        };
    
        $paddedNumber = str_pad($newIdNum, 5, '0', STR_PAD_LEFT);
    
        return $prefix . $paddedNumber;
    }


    public function generateCode(){
        return random_int(100000,999999);
        
    }
    

}
?>