<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set('Asia/Bangkok');

    $link = mysqli_connect('localhost', 'root', 'snc@2020', 'vam');
    mysqli_set_charset($link, 'utf8');
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "GET"){
        $sql = "SELECT COUNT(DISTINCT number) AS number FROM t_visitor WHERE status = 'pending' ;";
        $result = mysqli_query($link, $sql);
        while ($obj = $result -> fetch_object()) {
            $countNumber = $obj;
        }
        echo json_encode($countNumber);
        $result -> free_result();
    }
