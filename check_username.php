<?php
require "db.php";
$username = $_POST['username'];
$check_username = $conn->prepare("SELECT * FROM user_master where username = :username");
$check_username->bindParam(":username", $username);
$check_username->execute();
if ($check_username->rowCount() > 0) {
    header('Content-Type: application/json');
    echo json_encode(["flag" => 1, 'msg' => "<font style='color:red;'>$username  already taken</font>"]);
    exit();
} else {
    header('Content-Type: application/json');
    echo json_encode(["flag" => 1, "msg" => "<font style='color:green;'>$username is available</font>"]);
    exit();
}
?>
