<?php 
class NotificationModel{
    use Model;
 protected $table='meetings';
    public function getNotificationsByUser($user_id){
        if(!isset($_SESSION['USER'])){
            functions::redirect('login');
        }

        $pdo = $this->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM $this->table WHERE callee_id = :id ");
        $stmt->execute(['id' => $user_id]);
        $meetings = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $meetings;

    }

    public function markNotificationAsJoined($meeting_id) {
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare("DELETE FROM $this->table WHERE room_name = :meeting_id");
        $stmt->execute(['meeting_id' => $meeting_id]);

    }
}

?>