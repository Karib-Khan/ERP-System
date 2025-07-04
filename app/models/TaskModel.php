<?php 

class TaskModel{
use Model;

protected $table='tasks';


public function assignTask($assigned_by,$assigned_to,$title,$description,$dueDate){

    

    $pdo = $this->getConnection();
    $query="INSERT INTO $this->table (assigned_by, assigned_to, task_title, description, due_date) 
                                   VALUES (:assigned_by, :assigned_to, :title, :description, :due_date)";
    $stmt = $pdo->prepare($query);

            $stmt->execute([
                ':assigned_by' => $assigned_by,
                ':assigned_to' => $assigned_to,
                ':title' => $title,
                ':description' => $description,
                ':due_date' => $dueDate
            ]);
}

public function AllTasks() {
    $pdo = $this->getConnection();
    $query = "SELECT * FROM tasks";

    $stmt = $pdo->prepare($query);
    if ($stmt->execute()) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    return []; 
}

public function deleteById($task_id){
    $pdo = $this->getConnection();
    $query = "DELETE FROM tasks WHERE task_id = :task_id LIMIT 1
";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['task_id'=>$task_id]);

}

public function TasksById($user_id) {
    $pdo = $this->getConnection();
    $query = "SELECT * FROM tasks WHERE assigned_to=:assigned_to";

    $stmt = $pdo->prepare($query);
    if ($stmt->execute(['assigned_to'=>$user_id])) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    return []; 
}




}


?>