<?php 
include '../../vendor/autoload.php';
include '../../vendor/setasign/fpdf/fpdf.php';

class UserPdf extends Controller {

    public function generate($user_id) {
        
        if (ob_get_level()) {
            ob_end_clean();
        }

        
        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=\"user_profile_$user_id.pdf\"");
        header("Cache-Control: private, max-age=0, must-revalidate");
        header("Pragma: public");

        $user = new AdminModel();
        $data = $user->getAllUserData($user_id);

        if (!$data) {
            
            exit;
        }

        $pdf = new FPDF('P','nm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'User Profile Details', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);

        
        $fields = [
            'Full Name' => $data->name,
            'User ID' => $data->user_id,
            'Age' => $data->age,
            'Gender' => $data->gender,
            'Date Of Birth' => $data->dob,
            'Nationality' => $data->nationality,
            'Nid/ Passport' => $data->nid,
            'Marital Status' => $data->maritial_status,
            'Phone' => $data->phone,
            'Email' => $data->email,
            'Address' => $data->address
        ];

        foreach ($fields as $label => $value) {
            $pdf->Cell(50, 10, $label . ':', 0, 0);
            $pdf->Cell(100, 10, utf8_decode($value), 0, 1);
        }

        $pdf->Output('I', "user_profile_{$user_id}.pdf");
        exit;
    }
}
?>
