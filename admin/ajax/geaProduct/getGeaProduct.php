<?php
include("../../../config/connect.php");
$database = new Connection();
$conn = $database->openConnection();

$id = (int)$_POST['id'];
if ($id != '' && is_int($id)) {
    $chk_user = "SELECT * FROM gea_product WHERE id=:id";
    $chk_user_prepare = $conn->prepare($chk_user);
    $chk_user_prepare->execute([":id" => $id]);
    if ($chk_user_prepare->rowCount() >= 1) {
        @session_start();
        $_SESSION['edit_gea_product_id'] = $id;
        echo json_encode(array("result" => 1));
    } else {
        echo json_encode(array("result" => 0));
    }
}