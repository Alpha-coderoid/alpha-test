<?php
include_once "customer.php";

$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];


customer::update($id, $name, $phone, $address);
header("location:listallcustomers.php");
