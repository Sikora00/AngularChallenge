<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connecet_error());}
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
@$id = $request->id;
$zap="DELETE FROM `products` WHERE `products`.`productCode` = '".$id."' ;";
$conn->query("SET NAMES utf8");
$wynik=$conn->query($zap);
if($wynik){
    echo "usunięto";
}else{
    echo "nie udało się";
}
?>