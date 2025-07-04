<?php 

class MeetingModel{
    use Model;

    public function createOrUpdateMeeting($room, $caller, $callee) {
        $pdo = $this->getConnection();
    
        $stmt = $pdo->prepare("SELECT id FROM meetings WHERE room_name = :room");
        $stmt->execute(['room' => $room]);
        $existing = $stmt->fetch();
    
        if (!$existing) {
            $stmt = $pdo->prepare("INSERT INTO meetings (room_name, caller_id, callee_id) VALUES (:room, :caller, :callee)");
            $stmt->execute([
                'room' => $room,
                'caller' => $caller,
                'callee' => $callee
            ]);
        }
    }
    
}

?>