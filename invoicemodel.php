<?php



include_once "customer.php";
include_once "product.php";
class invoice
{
    public $id;

    public $buyerobj;
    public $productobj;
    public $qty;
    public $total;


    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from invoice where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();
            $this->name = $row["name"];
            $this->qty = $row["qty"];
            $this->total = $row["total"];
            $this->productobj = new product($row["pid"]);
            $this->buyerobj = new customer($row["bid"]);
        }
    }


    public static function add($bid, $pid, $qty, $total)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");


        $invoice = " insert into invoice (bid,pid,qty,total) values ('$bid','$pid','$qty','$total')";

        mysqli_query($con, $invoice);
        echo mysqli_error($con);
    }
}
