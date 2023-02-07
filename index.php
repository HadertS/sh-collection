<?php

require_once "databaseFunctions.php";

$db=createDBConnection('RPG-Books','root','password');
$collection = retrieveCollectionData($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="shResets.css">
    <link rel="stylesheet" href="styles.css">
    <title></title>
</head>
<body>
    <nav>
        <ul>
            <li>Collection</li>
            <li>Add</li>
        </ul>
    </nav>
    <?php
        foreach ($collection as $item){
            echo '<div class="collectionItem">';
            echo "<img src='".$item['image_source']."'>";
            echo "<p>Title: ".$item['title']."</p>";
            echo "<p>Price Paid: £".$item['price_paid']."</p>";
            echo "<p> Date Acquired (Aproximate): ".$item['acquisition_date']."</p>";
            echo '<button type="button">Delete</button>';
            echo '</div>';
        }
    ?>
</body>
</html>