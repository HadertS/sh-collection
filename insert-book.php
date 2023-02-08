<?php
require_once "databaseFunctions.php";

$formInput = $_POST;
if (!isset($formInput['title'],$formInput['price_paid'],$formInput['acquisition_date'],$formInput['image_source'])){
    header('Location: add-new-book.php');
    die();
}
