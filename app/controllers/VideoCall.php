<?php
class VideoCall extends Controller {
    public function index() {
        
        if (!isset($_SESSION['USER'])) {
            functions::redirect('login');
            return;
        }
        $adminModel=new AdminModel();
        $data=$adminModel->getCombinedData();

        $this->view('video_call_list',$data);

       
    }

    public function call($otherUserId) {
        if (!isset($_SESSION['USER'])) {
            functions::redirect('login');
            return;
        }

        $currentUserId = $_SESSION['USER']['user_id'];

        $min = min($currentUserId, $otherUserId);
        $max = max($currentUserId, $otherUserId);
        $roomName = "ERPCall_" . $min . "_" . $max;
        
        $meetingModel = new MeetingModel();
        $meetingModel->createOrUpdateMeeting($roomName, $currentUserId, $otherUserId);
        
        $this->view('video_call', ['roomName' => $roomName]);
    }
}
?>
