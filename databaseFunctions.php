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