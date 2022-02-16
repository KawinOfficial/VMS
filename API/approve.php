<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set('Asia/Bangkok');

    $link = mysqli_connect('localhost', 'root', '', 'vam');
    mysqli_set_charset($link, 'utf8');
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    $dataJson = file_get_contents("php://input");
    $data = json_decode($dataJson);

    $visitorToken = "NzCo10w5eyDMtlrfvOppYBuyS0vyvpxgdCx01ToMayl"; 
    $guardToken = "1l6D2ha4KJKnSs4zJHljDhgXIx4zGRDDBNaWcsZ1pJm";

    function notify_message($message,$sToken){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");
        $sMessage = $message;
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        // $result = curl_exec( $chOne ); 
        curl_exec( $chOne ); 

        //Result error 
        // if(curl_error($chOne)) 
        // { 
        //     echo 'error:' . curl_error($chOne); 
        // } 
        // else { 
        //     $result_ = json_decode($result, true); 
        //     echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        // } 
        // curl_close( $chOne );   
    }
    
    if($requestMethod == 'POST'){
        if(!empty($data)){
            $number = $data->number;
            $name = $data->name;
            $company = $data->company;
            $toVisit = $data->toVisit;
            $visitDate = $data->visitDate;
            $status = $data->status;
            $note = $data->note;
        
            $sql = "UPDATE t_visitor SET status ='$status', note ='$note' WHERE number ='$number';";
            $result = mysqli_query($link, $sql);

            if ($result) {
                if($status == "approve"){
                    $msg = "\n" . "No: " . $number ."\n" . "Name: " . $name . "\n" . "Organization/Company: " . $company . "\n" . "To Visit: " . $toVisit . "\n" . "Visit date: " . $visitDate . "\n" . "Status: อนุมัติ" . "\n" . "Note: " . $note; 
                    notify_message($msg, $visitorToken);
                    notify_message($msg, $guardToken);
                }else {
                    $msg = "\n" . "No: " . $number ."\n" . "Name: " . $name . "\n" . "Organization/Company: " . $company . "\n" . "To Visit: " . $toVisit . "\n" . "Visit date: " . $visitDate . "\n" . "Status: ไม่อนุมัติ". "\n" . "Note: " . $note  ; 
                    notify_message($msg, $visitorToken);  
                }
                echo json_encode(['status' => 'ok', 'message' => 'Update Data Complete', 'state' => true]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error insertHistory', 'state' => false]);    
            }
        }
    }
?>