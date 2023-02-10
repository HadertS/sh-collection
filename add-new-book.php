<?php
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
            <li><a href="add-new-book.php">Add</a></li>
        </ul>
    </nav>
    <div class="addForm">
        <form action="insert-book.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
            <label for="price_paid">Price Paid (GBP)</label>
            <input type="number" name="price_paid" id="price_paid" required>
            <label for="acquisition_date">Acquisition Date (or approximate)</label>
            <input type="date" name="acquisition_date" id="acquisition_date" required>
            <label for="image_source">Image Source URL</label>
            <input type="url" name="image_source" id="image_source" required>
            <input type="submit" value="Add">
        </form>
    </div>
</body>
</html>