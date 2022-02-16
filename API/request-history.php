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

    if($requestMethod == "POST"){

        $sql = "SELECT * FROM t_visitor";

        if(!empty($data)){
            $page = $data->page;
            $search = $data->search;
            $datetime = $data->datetime;
            if($page || $search || $datetime){
                $sql .= " WHERE";
            }
    
            if($page){
                $sql .= " status = 'pending'";
            }
    
            if($page && ($search || $datetime)){
                $sql .= " AND";
            }
    
            if($search){
                $sql .= " (name LIKE '%$search%' OR company LIKE '%$search%' OR number LIKE '%$search%')";
            }
    
            if($search && $datetime){
                $sql .= " AND";
            }
    
            if($datetime){
                $sql .= " visitDate BETWEEN '$datetime 00:00:00' AND '$datetime 23:59:59'";
            }
        }

        $sql .= ' ORDER BY id ASC ;';
        // echo $sql;
        $result = mysqli_query($link, $sql);
        $history = array();
        while ($row = mysqli_fetch_assoc($result)){
            $history[] = $row;
        }

        echo json_encode($history);
    }
?>