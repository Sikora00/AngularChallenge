
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: " .mysqli_connecet_error());}
$showData = "SELECT * FROM products";
$data = array();
$result = mysqli_query($conn, $showData);
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $rs["productDescription"] = str_replace('"','\\"',$rs["productDescription"]);

    $remove = array("\n", "\r\n", "\r");
    $rs["productDescription"] = str_replace($remove, "\\n", trim($rs["productDescription"]));

    if ($outp != "") {$outp .= ",";}
    $outp .= '{"productCode":"'  . $rs["productCode"] . '",';
    $outp .= '"productName":"'  . $rs["productName"] . '",';
    $outp .= '"productLine":"'   . $rs["productLine"]        . '",';
    $outp .= '"productScale":"'. $rs["productScale"]     . '",';
    $outp .= '"productVendor":"'. $rs["productVendor"]     . '",';
    $outp .= '"productDescription":"'. $rs["productDescription"]     . '",';
    $outp .= '"quantityInStock":"'. $rs["quantityInStock"]     . '",';
    $outp .= '"buyPrice":"'. $rs["buyPrice"]     . '",';
    $outp .= '"MSRP":"'. $rs["MSRP"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();
echo($outp);
?>