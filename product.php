<?php
include_once "supplier.php";
class product
{
    public $id;

    public $name;

    public $buyprice;
    public $sellprice;
    public $stock;
    public $supplierobj;
    public $barcode;
    public $supplierid;

    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from product where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();

            $this->name = $row["name"];

            $this->barcode = $row["barcode"];
            $this->buyprice = $row["buyprice"];
            $this->sellprice = $row["sellprice"];
            $this->stock = $row["stock"];
            $this->supplierobj = new supplier($row["supplier"]);
        }
    }


    public static function add($name, $barcode, $buyprice, $sellprice, $stock, $supplierid)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");
        $name = trim($name, "%^&;!@$#");

        $product = " insert into product (name,barcode,buyprice,sellprice,stock,supplier) values ('$name','$barcode','$buyprice','$sellprice','$stock','$supplierid')";
        echo $name;
        mysqli_query($con, $product);
        echo mysqli_error($con);
    }
}
