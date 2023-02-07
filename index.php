<?php

require_once "databaseFunctions.php";

$db=createDBConnection('RPG-Books','root','password');

echo '<pre>';
var_dump(retrieveCollectionData($db));
echo '</pre>';