<?php
include_once "dashboard.php";
include_once "customer.php";
include_once "db.php";
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Invoice</h1>

    </div>
    <label style="font-size: 20px;">Customer </label>
    <select class="selectpicker" data-live-search="true">
        <option>Select Customer</option>
        <?php
        $s = "SELECT * FROM customers";
        $r = $con->query($s);
        while ($row = $r->fetch_assoc()) {
            $customer = new customer($row["id"]);
        ?>
            <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
        <?php } ?>
    </select>
    <br><br>


    <div class="row" style="width: 800px;">
        <div class="col-6">
            <input type="text" class="form-control" id="barcode" name="barcode" onchange="search(this.value)" placeholder="Product Barcode" aria-label="Product Barcode">
        </div>
        <div class="col-5" id="product">
            <input type="text" class="form-control" placeholder="pname" aria-label="pname">
        </div>

    </div>
    <br>
    <div class="row" style="width: 800px;">
        <div class="col-2">
            <input type="text" id="price" class="form-control" placeholder="Price" aria-label="Price">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" placeholder="Quantity" aria-label="Quantity">
        </div>
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Total" aria-label="Total">
        </div>
        <div class="col-1">
            <button type="button" class="btn btn-dark">Add</button> <br><br>
        </div>
    </div>
    <script>
        function search(text) {
            var txt = document.getElementById("barcode").innerHTML;
            // alert(txt);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("product").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "searchproductnameajax.php?key=" + text, true);
            xmlhttp.send();
        }
    </script>
    <?php include_once "dashboardfooter.php" ?>