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
 * Sanitizes array input
 * @param array $dirtyArray uncleaned array to be sanitized
 * @return array the sanitized array
 */
function sanitiseInput(array $dirtyArray):array{
    $sanitisedArray['title'] = filter_var($dirtyArray['title'], FILTER_SANITIZE_STRING);
    $sanitisedArray['price_paid'] = filter_var($dirtyArray['price_paid'], FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $sanitisedArray['acquisition_date'] = filter_var($dirtyArray['acquisition_date'], FILTER_SANITIZE_STRING);
    $sanitisedArray['image_source'] = filter_var($dirtyArray['image_source'], FILTER_SANITIZE_URL);
    return $sanitisedArray;
}

/**
 * Validates a sanitised array and adds an error message to the returned array if any fail
 * @param array $sanitisedArray a pre-sanitized array
 * @return array the validated array with any applicable error messages
 */
function validateInput(array $sanitisedArray):array{
    $sanitisedArray['errorMessage'] = "";
    if (!preg_match('/^.{1,255}$/',$sanitisedArray['title'])){
        $sanitisedArray['errorMessage'].= '<p>There is an error with your title.</p>';
    }
    if (!filter_var($sanitisedArray['price_paid'], FILTER_VALIDATE_FLOAT,['options' =>['min_range'=>0,'max_range'=>999]])){
        $sanitisedArray ['errorMessage'].= '<p>There is an error with your price.</p>';
    }
    if (!preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/',$sanitisedArray['acquisition_date'])){
        $sanitisedArray['errorMessage'].="<p>There is an error with your date.</p>";
    }
    if (!(preg_match('/^https?:\/\/[^\/\s]+\/\S+\.(jpg|png)$/',$sanitisedArray['image_source']))){
        $sanitisedArray['errorMessage'].="<p>There is an error with your image url.</p>";
    }

    if (empty($sanitisedArray['errorMessage'])){
        unset($sanitisedArray['errorMessage']);
    }
    return $sanitisedArray;
}

