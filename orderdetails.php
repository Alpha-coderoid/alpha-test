<?php
include_once "order.php";
include_once "product.php";
class product
{
    public $id;

    public $orderobj;

    public $productobj;
    public $qty;

    public $total;


    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from orderdetails where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();

            $this->id = $row["id"];

            $this->qty = $row["qty"];

            $this->total = $row["total"];

            $this->orderobj = new customer($row["oid"]);
            $this->productobj = new customer($row["pid"]);
        }
    }


    public static function add($oid, $pid, $qty, $total)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");


        $orderd = " insert into orderdetails (oid,pid,qty,total) values ('$oid','$pid','$qty','$total')";

        mysqli_query($con, $orderd);
        echo mysqli_error($con);
        return mysqli_insert_id($con);
    }
}
