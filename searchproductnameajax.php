<?php
include_once "db.php";
include_once "product.php";

// Assuming you have already established a database connection, you can include it here.
// Include your database connection code here if not already included.

// Get the search keyword from the user input
$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";

// Define the SQL query to fetch products based on the search keyword
$sql = "SELECT * FROM product WHERE name LIKE '%" . $key . "%' OR barcode LIKE '%" . $key . "%'";

// Execute the SQL query
$result = $con->query($sql);
?>

<!-- Add a search input field -->


<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Buy Price</th>
            <th scope="col">Sell Price</th>
            <th scope="col">Stock</th>
            <th scope="col">Barcode</th>
            <th scope="col">Supplier</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through the results and display the products
        while ($row = $result->fetch_assoc()) {
            $product = new Product($row["id"], $con); // Create a Product object for each product.

            // Output product information in each table row.
        ?>
            <tr>
                <th scope="row"><?php echo $product->id; ?></th>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->buyprice; ?></td>
                <td><?php echo $product->sellprice; ?></td>
                <td><?php echo $product->stock; ?></td>
                <td><?php echo $product->barcode; ?></td>
                <td><?php echo $product->supplierobj->name; ?></td>
                <td>
                    <a href="editproduct.php?id=<?php echo $product->id; ?>">
                        <svg width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>