<?php
include_once "dashboard.php";
?>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add a New Customer</h1>

    </div>

    <form action="addcustomerc.php" class="mx-auto" style="width: 500px;">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="f">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="phone" id="floatingPassword" placeholder="Password">
            <label for="floatingInput">Phone Number</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="address" id="floatingPassword" placeholder="Password">
            <label for="floatingInput">Address</label>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-dark mb-3">Add Customer</button>
        </div>
    </form>
    <?php include_once "dashboardfooter.php" ?>