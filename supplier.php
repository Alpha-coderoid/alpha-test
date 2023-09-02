<?php

class supplier
{
    public $id;
    public $name;
    public $companyname;
    public $phone;
    public $address;
    public $balance = 0;
    public $taxnumber;
    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from supplier where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();
            $this->id = $row["id"];
            $this->name = $row["name"];
            $this->companyname = $row["companyname"];
            $this->phone = $row["phone"];
            $this->address = $row["address"];
            $this->balance = $row["balance"];
            $this->taxnumber = $row["taxnumber"];
        }
    }

    public static function add($name, $companyname, $phone, $balance, $address, $taxnumber)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");
        $name = trim($name, "%^&;!@$#");

        $supplier = " insert into supplier (name,companyname,phone,balance,address,taxnumber) values ('$name','$companyname','$phone','$balance','$address','$taxnumber')";


        mysqli_query($con, $supplier);
        echo mysqli_error($con);
    }
}
