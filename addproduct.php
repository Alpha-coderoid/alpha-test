<!DOCTYPE html>
<html>

<head>
    <title>Add a new Product</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1,
        h4 {
            margin: 15px 0 4px;
            font-weight: 400;
        }

        h4 {
            margin: 20px 0 4px;
            font-weight: 400;
        }

        span {
            color: red;
        }

        .small {
            font-size: 10px;
            line-height: 18px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 3px;
        }

        form {
            width: 100%;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px #ccc;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            vertical-align: middle;
        }

        input:hover,
        textarea:hover,
        select:hover {
            outline: none;
            border: 1px solid #095484;
            background: #e6eef7;
        }

        .title-block select,
        .title-block input {
            margin-bottom: 10px;
        }

        select {
            padding: 7px 0;
            border-radius: 3px;
            border: 1px solid #ccc;
            background: transparent;
        }

        select,
        table {
            width: 100%;
        }

        option {
            background: #fff;
        }

        .day-visited,
        .time-visited {
            position: relative;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        input[type="time"]::-webkit-inner-spin-button {
            margin: 2px 22px 0 0;
        }

        .day-visited i,
        .time-visited i,
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 8px;
            font-size: 20px;
        }

        .day-visited i,
        .time-visited i {
            right: 5px;
            z-index: 1;
            color: #a9a9a9;
        }

        [type="date"]::-webkit-calendar-picker-indicator {
            right: 0;
            z-index: 2;
            opacity: 0;
        }

        .question-answer label {
            display: block;
            padding: 0 20px 10px 0;
        }

        .question-answer input {
            width: auto;
            margin-top: -2px;
        }

        th,
        td {
            width: 18%;
            padding: 15px 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
            vertical-align: unset;
            line-height: 18px;
            font-weight: 400;
            word-break: break-all;
        }

        .first-col {
            width: 25%;
            text-align: left;
        }

        textarea {
            width: calc(100% - 6px);
        }

        .btn-block {
            margin-top: 20px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            background-color: #095484;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0666a3;
        }

        @media (min-width: 568px) {
            .title-block {
                display: flex;
                justify-content: space-between;
            }

            .title-block select {
                width: 30%;
                margin-bottom: 0;
            }

            .title-block input {
                width: 31%;
                margin-bottom: 0;
            }

            th,
            td {
                word-break: keep-all;
            }
        }

        form {
            width: 60%;
            margin-top: 80px;
        }
    </style>
</head>

<body>

    <div class="testbox">
        <form action="addproductc.php" method="POST">
            <h1>Add a new Product</h1>
            <h4>Barcode</h4>

            <input class="name" type="text" name="barcode" placeholder="Product Barcode" />
            <h4>Name</h4>

            <input class="name" type="text" name="name" placeholder="Product Name" />



            <h4>Buy Price</h4>
            <input type="text" value="" placeholder="Product Price" name="buyprice" />

            <h4>Sell Price</h4>
            <input type="text" value="" placeholder="Selling Price" name="sellprice" />



            <h4>Stock</h4>
            <input type="text" value="" placeholder="Quantity" name="stock" />
            <h4>Supplier</h4>
            <select name="supplierid">
                <?php
                include_once "db.php";
                $s = "SELECT * FROM supplier";
                $r = $con->query($s);
                $i = 1;
                echo "<option value=' '>Choose Supplier</option>";
                while ($row = $r->fetch_assoc()) {
                    echo "<option value=" . $i . ">" . $row["name"] . "</option>";
                    $i++;
                }
                ?>
            </select>
            <div class="btn-block">
                <input type="submit" name="submit" value="Add" />
            </div>
        </form>
    </div>
</body>

</html>