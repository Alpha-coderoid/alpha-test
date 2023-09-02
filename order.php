<?php
include_once "customer.php";
include_once "user.php";
class product
{
    public $id;

    public $buyerobj;

    public $staffobj;
    public $buytime;
    public $buydate;
    public $total;


    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from product where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();

            $this->id = $row["id"];

            $this->buytime = $row["buytime"];
            $this->buydate = $row["buydate"];
            $this->total = $row["total"];

            $this->buyerobj = new customer($row["bid"]);
            $this->staffobj = new customer($row["staffid"]);
        }
    }


    public static function add($bid, $staffid, $buytime, $buydate, $total)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");


        $order = " insert into product (bid,staffid,buytime,buydate,total) values ('$bid','$staffid','$buytime','$buydate','$total')";

        mysqli_query($con, $order);
        echo mysqli_error($con);
        return mysqli_insert_id($con);
    }
}
