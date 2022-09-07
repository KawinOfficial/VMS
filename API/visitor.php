<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Bangkok');

$msg = require('./libs/messageLine.php');

$link = mysqli_connect('localhost', 'root', 'snc@2020', 'vam');
mysqli_set_charset($link, 'utf8');
$requestMethod = $_SERVER["REQUEST_METHOD"];

$dataJson = file_get_contents("php://input");
$data = json_decode($dataJson);

$visitorToken = "NzCo10w5eyDMtlrfvOppYBuyS0vyvpxgdCx01ToMayl";
$adminToken = "x2RNGA7rdomkZWjAGp35PyRyaSA5rX1Hr55mkeg7q5y";

function notify_message($message, $sToken)
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Bangkok");
    $sMessage = $message;
    $chOne = curl_init();
    curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($chOne, CURLOPT_POST, 1);
    curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
    // $result = curl_exec( $chOne ); 
    curl_exec($chOne);

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

function run_number($link)
{
    // $link = mysqli_connect('localhost', 'root', '', 'vam');
    $now = new DateTime();
    $toDate = $now->format('Y-m-d');
    $sql = "SELECT COUNT(DISTINCT number) AS number FROM t_visitor WHERE datetime BETWEEN '$toDate 00:00:00' AND '$toDate 23:59:59' ;";
    $result = mysqli_query($link, $sql);
    while ($obj = $result->fetch_object()) {
        $countNumber = $obj->number;
    }
    $result->free_result();

    $count  = $countNumber + 1;
    return $now->format('Ymd') . ($count < 10 ? "0" . $count : $count);
}

if ($requestMethod == 'POST') {
    if (!empty($data)) {
        $i = 0;
        $visitor = "";
        $timelimeAll = "";
        $website = 'https://snc-services.sncformer.com/venderCOVID/client/index.php';
        $webAD = 'https://snc-services.sncformer.com/venderCOVID/client/Login.php';

        while ($i < count($data)) {
            $number = run_number($link);
            $name = $data[$i]->name;
            $company = $data[$i]->company;
            $toVisit = $data[$i]->toVisit;
            $purposeVisit = $data[$i]->purposeVisit;
            $visitDate = $data[$i]->visitDate;
            $vaccineDose1 = $data[$i]->vaccineDose1;
            $vaccineDose2 = $data[$i]->vaccineDose2;
            $vaccineDose3 = $data[$i]->vaccineDose3;
            $vaccineDose4 = $data[$i]->vaccineDose4;
            $vaccineDose5 = $data[$i]->vaccineDose5;
            $doseDate1 = $data[$i]->doseDate1;
            $doseDate2 = $data[$i]->doseDate2;
            $doseDate3 = $data[$i]->doseDate3;
            $doseDate4 = $data[$i]->doseDate4;
            $doseDate5 = $data[$i]->doseDate5;
            $vaccine = $data[$i]->vaccine;
            $atk = $data[$i]->atk;
            $atkDate = $data[$i]->atkDate;
            $status = "pending";
            $fdatetime = (new DateTime())->format('Y-m-d H:i:s');
            $timelineJson = json_encode($data[$i]->timeline, JSON_UNESCAPED_UNICODE);
            $questionJson = json_encode($data[$i]->question, JSON_UNESCAPED_UNICODE);


            if ($i + 1 == count($data)) {
                $comma = "";
            } else {
                $comma = ",";
            }

            $visitor .= "('$number','$name','$company','$toVisit','$purposeVisit','$visitDate','$vaccineDose1','$vaccineDose2','$vaccineDose3','$vaccineDose4','$vaccineDose5','$doseDate1','$doseDate2','$doseDate3','$doseDate4','$doseDate5',$vaccine,'$atk','$atkDate','$status', '$questionJson', '$timelineJson','$fdatetime','')$comma";
            $i++;
        }

        $insertVisitor = "INSERT INTO t_visitor (number, name, company, toVisit, purposeVisit, visitDate, vaccineDose1, vaccineDose2, vaccineDose3, vaccineDose4, vaccineDose5, doseDate1, doseDate2, doseDate3, doseDate4, doseDate5, vaccine, atk, atkDate, status, question, timeline, datetime, note) VALUES $visitor ;";
        $result1 = mysqli_query($link, $insertVisitor);

        if ($result1) {
            echo json_encode(['status' => 'ok', 'message' => 'Insert Data Complete', 'state' => true]);

            notify_message($msg('visitor', $number, 'กรอกข้อมูลแล้ว/รออนุมัติ', $data[0], $website), $visitorToken);
            notify_message($msg('admin', $number, 'กรอกข้อมูลแล้ว/รออนุมัติ', $data[0], $webAD), $adminToken);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error', 'state' => false]);
            // echo $insertVisitor;
        }
    }
}
