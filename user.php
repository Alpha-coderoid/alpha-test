<?php
class user
{
    public $id;

    public $name;

    public $username;
    public $password;

    function __construct($id)
    {
        if ($id != "") {
            $con = new mysqli("localhost:3308", "root", "", "Alpha");
            $sql = "select * from user where id=" . $id;
            $r = $con->query($sql);
            $row = $r->fetch_assoc();
            $this->id = $row["id"];
            $this->name = $row["name"];

            $this->username = $row["username"];
            $this->password = $row["password"];
        }
    }


    public static function add($name, $username, $password)
    {
        $con = new mysqli("localhost:3308", "root", "", "Alpha");
        $name = trim($name, "%^&;!@$#");

        $user = " insert into user (name,username,password) values ('$name','$username','$password')";

        mysqli_query($con, $user);
        echo mysqli_error($con);
    }
}
