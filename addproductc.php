<?php
include_once "product.php";


$name = $_REQUEST["name"];
$buyprice = $_REQUEST["buyprice"];
$sellprice = $_REQUEST["sellprice"];
$stock = $_REQUEST["stock"];
$supplierid = $_REQUEST["supplierid"];
$barcode = $_REQUEST["barcode"];
product::add($name, $barcode, $buyprice, $sellprice, $stock, $supplierid);
