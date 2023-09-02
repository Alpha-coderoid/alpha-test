<?php
include_once "dashboard.php";
include_once "db.php";
include_once "customer.php";
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers List</h1>

    </div>
    <a href="addcustomer.php">
        <button type="button" class="btn btn-dark">Add Customer</button> <br><br>
    </a>




    <div id="table">

    </div>




    <script>
        function search(text) {
            //  document.getElementById("table").innerHTML = text;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "searchcustomersajax.php?key=" + text, true);
            xmlhttp.send();
        }
    </script>
    <?php include_once "dashboardfooter.php" ?>