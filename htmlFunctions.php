<?php

function outputCollection(array $collection):string
{
    $output = "";
    foreach ($collection as $item) {
        $output .= "<div class='collectionItemContainer'>";
        $output .=  "<img src='" . $item['image_source'] . "'>";
        $output .=  "<div class ='collectionItemInfo'>";
        $output .=  "<p>Title: " . $item['title'] . "</p>";
        $output .=  "<p>Price Paid: £" . $item['price_paid'] . "</p>";
        $output .=  "<p> Date Acquired (Aproximate): " . $item['acquisition_date'] . "</p>";
        $output .=  "<button type='button'>Delete</button>";
        $output .=  "</div>";
        $output .=  "</div>";
    }
    return $output;
}