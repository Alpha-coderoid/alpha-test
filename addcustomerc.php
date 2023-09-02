<?php
include_once "customer.php";


$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];

echo $name;
customer::add($name, $phone, $address);
header("location:listallcustomers.php");
