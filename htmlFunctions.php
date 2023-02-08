<?php

/**
 * Takes array of collection items and returns it as a concatenated html string
 * @param array $collection array of collection data
 * @return string
 */
function outputCollection(array $collection):string
{
    $output = "";
    foreach ($collection as $item) {
        if (isset($item['image_source'],$item['title'],$item['price_paid'],$item['acquisition_date'])) {
            $output .= "<div class='collectionItemContainer'>";
            $output .= "<img src='" . $item['image_source'] . "'>";
            $output .= "<div class ='collectionItemInfo'>";
            $output .= "<p>Title: " . $item['title'] . "</p>";
            $output .= "<p>Price Paid: £" . $item['price_paid'] . "</p>";
            $output .= "<p> Date Acquired (Approximate): " . $item['acquisition_date'] . "</p>";
            $output .= "<button type='button'>Delete</button>";
            $output .= "</div>";
            $output .= "</div>";
        }
    }
    return $output;
}