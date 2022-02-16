<?php 
   header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    // header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set('Asia/Bangkok');

    $conn = new PDO("mysql:host=localhost;dbname=vam", "root", "");

    $req = (object) json_decode(file_get_contents('php://input'), true);
    $data = array();


    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if (isset($req->username) && isset($req->password)) {
        $data = array(
            ":username"=> $req->username,
            ":password"=> $req->password,
        );
        

        $query = $conn->prepare("SELECT * FROM t_user WHERE username=:username AND password=:password");
        $query->execute($data);

        if($query->rowCount() > 0) {
            session_start();
            $_SESSION["username"] = $req->username;
            $_SESSION["isLoggedIn"] = true;
            
            echo json_encode(["state"=> true, "msg"=> "Login success.", "isLoggedIn"=> $_SESSION["isLoggedIn"]]);
        } else {
            echo json_encode(["state"=> false, "msg"=> "Login failed."]);
        }
    }