<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db_pdo.php';
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    
    $id = isset($_GET['productId']) ? $_GET['productId'] : "";
    
    var_dump($id);
    // echo $id;
    $sql = "DELETE FROM `cart_product` WHERE product_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);  
    $stmt -> execute();
    echo json_encode ("Deleted sucessfully"); 
    header('Location: http://localhost/e-commerce/backend/cart.php');

}else {
    $data = [
        'error' => "Method Not Allowed",
        'status' => 405
    ];
    echo json_encode($data);
}
?>