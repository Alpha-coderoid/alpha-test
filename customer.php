<?php

class customer
{
    public $id;
    public $name;
    public $phone;
    public $address;
    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from customers where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();
            $this->id = $row["id"];
            $this->name = $row["name"];

            $this->phone = $row["phone"];
            $this->address = $row["address"];
        }
    }

    public static function add($name, $phone, $address)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");
        $name = trim($name, "%^&;!@$#");

        $supplier = " insert into customers (name,phone,address) values ('$name','$phone','$address')";

        echo $supplier;
        mysqli_query($con, $supplier);
        echo mysqli_error($con);
    }
    public static function update($id, $name, $phone, $address)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");
        $name = trim($name, "%^&;!@$#");

        $supplier = " update customers set name='$name' ,phone = '$phone' ,address='$address' where id=$id";


        mysqli_query($con, $supplier);
        echo mysqli_error($con);
    }
}
