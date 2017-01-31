<?php
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connecet_error());}
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$productCode = $request->productCode;
@$productName = $request->productName;
@$productLine = $request->productLine;
@$productScale = $request->productScale;
@$productVendor = $request->productVendor;
@$productDescription = $request->productDescription;
@$quantityInStock = $request->quantityInStock;
@$buyPrice = $request->buyPrice;
@$MSRP = $request->MSRP;
echo $zap="UPDATE `products` SET  `productCode` = '".$productCode."', `productName` = '".$productName."',`productLine` = '".$productLine."', `productScale` = '".$productScale."', `productVendor` = '".$productVendor."', `productDescription` = '".$productDescription."', `quantityInStock` = ".$quantityInStock.", `buyPrice` = ".$buyPrice.",  `MSRP` = ".$MSRP." WHERE `products`.`productCode` = '".$productCode."'";
$conn->query("SET NAMES utf8");
$wynik=$conn->query($zap);
if($wynik){
    echo "udało się";
}else{
    echo "nie udało się";
}
?>