<?php
include 'session.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
echo "<h1>Wellcome ".$_SESSION['username']."</h1>";
?>
<h2>Available products</h2>
<table>
    <tr>
    <th>Ma san pham</th>
    <th>Ten san pham</th>
    <th>Cong ty</th>
    <th>Gia</th>
    </tr>
<?php
$products=include "../db/product.php";

foreach ($products as $product){
    ?>
    <tr>
        <td><?= $product["id"];?></td>
        <td><?= $product["name"]?></td>
        <td><?= $product["kaisha"];?></td>
        <td><?=$product["cost"];?></td>
        <td><a href="#" name="addtocart" onclick="function addToCart() {

        }
        addToCart()" value="<?=$product["id"];?>">Add to cart</a></td>
    </tr>
<?
}
?>
</table>
</body>
</html>