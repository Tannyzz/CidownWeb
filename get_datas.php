<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/connector.php';

 
// connecting to db
$db = new DB_CONNECT();
 $estado = $_GET["estado"];
// get all products from products table
$result = mysql_query("SELECT * FROM directorio_cidown WHERE estado='$estado'") or die(mysqli_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["nombre"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["id"];
        $product["nombre"] = $row["nombre"];
        
        /*$product["direccion"] = $row["direccion"];
        $product["estado"] = $row["estado"];
        $product["deleg"] = $row["deleg"];
        $product["cp"] = $row["cp"];
        $product["tel1"] = $row["tel1"];
        $product["tel2"] = $row["tel2"];
        $product["email1"] = $row["email1"];
        $product["email2"] = $row["email2"];
        $product["pob_atiende"] = $row["pob_atiende"];
        $product["serv_pro"] = $row["serv_pro"];
        $product["web"] = $row["web"];
        $product["facebook"] = $row["facebook"];
        $product["twitter"] = $row["twitter"];
        $product["fecha_leg"] = $row["fecha_leg"];
        $product["lat"] = $row["lat"];
        $product["lng"] = $row["lng"];*/

        // push single product into final response array
        array_push($response["nombre"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No existen registro en el directorio CIDOWN";
 
    // echo no users JSON
    echo json_encode($response);
}
?>