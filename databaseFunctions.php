<?php

/**
 * creates and returns a mysql db PDO
 * @param string $dbName the database ID to connect to
 * @param string $username the username
 * @param string $password the password
 * @return PDO returns the database connection with assoc array fetch mode
 */
function createDBConnection(string $dbName,string $username,string $password):PDO{
    $db = new PDO("mysql:host=db; dbname=$dbName", $username, $password);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}


/**
 * returns all items in the collection that are not deleted
 * @param PDO $db a database connection
 * @return array returns an array of all collection items
 */
function retrieveCollectionData(PDO $db):array{
    $stmnt = $db->prepare('SELECT `title`,`price_paid`,`acquisition_date`,`image_source`FROM `books` WHERE `deleted`=0;');
    $stmnt->execute();
    return $stmnt->fetchAll();
}

/**
 * @param array $dirtyArray
 * @return array
 */
function sanitiseInput(array $dirtyArray):array{
    $sanitisedArray['title'] = filter_var($dirtyArray['title'], FILTER_SANITIZE_STRING);
    $sanitisedArray['price_paid'] = filter_var($dirtyArray['price_paid'], FILTER_SANITIZE_NUMBER_FLOAT);
    $sanitisedArray['acquisition_date'] = filter_var($dirtyArray['acquisition_date'], FILTER_SANITIZE_STRING);
    $sanitisedArray['image_source'] = filter_var($dirtyArray['image_source'], FILTER_SANITIZE_URL);
    return $sanitisedArray;
}

/**
 * @param array $sanitisedArray
 * @return array
 */
function validateInput(array $sanitisedArray):array{
    $validatedArray['title'] = filter_var($sanitisedArray['title'], FILTER_SANITIZE_STRING);
    $validatedArray['price_paid'] = filter_var($sanitisedArray['price_paid'], FILTER_SANITIZE_NUMBER_FLOAT);
    $validatedArray['acquisition_date'] = filter_var($sanitisedArray['acquisition_date'], FILTER_SANITIZE_STRING);
    $validatedArray['image_source'] = filter_var($sanitisedArray['image_source'], FILTER_SANITIZE_URL);
}