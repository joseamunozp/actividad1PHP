<?php

function connection(){
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "northwind";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}

$con = connection();

$sql = "SELECT ProductName, UnitsInStock, CategoryID FROM products";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a datos</title>
</head>
<body>
    <div class="container d-flex justify-content-center .align-items-center gap-3">
        <table border="1">
            <tr>
                <th>CategoryID</th>
                <th>ProductName</th>
                <th>UnitsInStock</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($query)): ?>
                    
            <tr>
                <td><?=$row["CategoryID"] ?></td>
                <td><?=$row["ProductName"] ?></td>
                <td><?=$row["UnitsInStock"] ?></td>
            </tr>
                <?php endwhile; ?>
        </table>

    </div>
</body>
</html>