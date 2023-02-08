<?php

require_once "databaseFunctions.php";
require_once "htmlFunctions.php";

$db=createDBConnection('rpg-books','root','password');
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
            <li><a href="index.php">Collection</a></li>
            <lis><a href="add-new-book.php">Add</a></lis>
        </ul>
    </nav>
    <?=outputCollection($collection)?>
</body>
</html>