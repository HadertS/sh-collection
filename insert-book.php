<?php
require_once "databaseFunctions.php";

function validateAndSanitize(array $formInput):string {
    if (!isset($formInput['title'],$formInput['price_paid'],$formInput['acquisition_date'],$formInput['image_source'])){
        header('Location: add-new-book.php');
        die();
    }

    $formInput = sanitiseInput($formInput);
    $formInput = validateInput($formInput);
    if (isset($formInput['errorMessage'])){
        return $formInput['errorMessage'];
    }
    else {
        $db=createDBConnection('rpg-books','root','password');
        insertNewBook($db,$formInput);
        header('Location: add-new-book.php');
        die();
    }
}

$formInput = $_POST;
echo validateAndSanitize($formInput);
