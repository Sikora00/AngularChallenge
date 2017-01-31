<?php
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connecet_error());}
echo $postdata = file_get_contents("php://input");
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
$zap="INSERT INTO `products` (`productCode`, `productName`, `productLine`, `productScale`, `productVendor`, `productDescription`, `quantityInStock`, `buyPrice`, `MSRP`) VALUE ('".$productCode."','".$productName."','".$productLine."','".$productScale."','".$productVendor."','".$productDescription."','".$quantityInStock."','".$buyPrice."','".$MSRP."');";
echo $zap;
$conn->query("SET NAMES utf8");
$wynik=$conn->query($zap);
if($wynik){
    echo "udało się";
}else{
    echo "nie udało się";
}
?>