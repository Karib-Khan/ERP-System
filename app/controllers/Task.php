<?php 
class Task extends Controller{

    public function index(){

        if(!isset($_SESSION['USER'])){
            functions::redirect('login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $durationHours = floatval($_POST['duration']);
            $assigned_by = $_SESSION['USER']['user_id'];
            $assigned_to = $_POST['assigned_to']; 

        
            $dueDate = date('Y-m-d H:i:s', strtotime("+$durationHours hours"));

                try{
                    $taskModel=new TaskModel();
                    $taskModel->assignTask($assigned_by,$assigned_to,$title,$description,$dueDate);

                    $_SESSION['message'] = "Task assigned successfully!";
                    $_SESSION['message_type'] = "success";
                    functions::redirect('task/showTasks');
                }catch (PDOException $e) {
                    $_SESSION['message'] = "Database Error: " . $e->getMessage();
                    $_SESSION['message_type'] = 'error';
                    functions::redirect('task');
                }
    
        }

        
       

    }

    public function assign($user_id){

        $this->view('assign_task',['assigned_to'=>$user_id]);
    }

    public function delete($task_id){
        $task=new TaskModel();
        $task->deleteById($task_id);
        $this->showTasks();
    }

    public function showTasks(){
        $task=new TaskModel();
        $allTasks=$task->AllTasks();
        $this->view('task_list',['tasks'=>$allTasks]);
    }

    public function ShowTaskById($user_id){
        $task=new TaskModel();
        $allTasks=$task->TasksById($user_id);
        $this->view('employee/employee_task_list',['tasks'=>$allTasks]);
    }


}

?>