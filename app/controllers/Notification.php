<?php 

class Notification extends Controller{

    public function index(){
        $user_id=$_SESSION['USER']['user_id'];

        $call=new NotificationModel();
        $logbook=$call->getNotificationsByUser($user_id);

        $this->view('logBook',['logbook'=>$logbook]);
    }

    public function join($meeting_id) {
        $notification = new NotificationModel();
    
        $notification->markNotificationAsJoined($meeting_id);
        functions::redirect('notification');
        
        
    }
    // public function join($meeting_id) {
    //     echo "JOIN FUNCTION CALLED with ID = " . $meeting_id;
    //     die();
    // }
    
    
}
?>