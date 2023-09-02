<?php

$con = new mysqli("sql8.freesqldatabase.com:3306", "sql8644025", "ywHWWfkHnt", "sql8644025");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
