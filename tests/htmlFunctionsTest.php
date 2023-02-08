<?php


require_once '../htmlFunctions.php';

use PHPUnit\Framework\TestCase;

class htmlFunctionsTest extends TestCase
{
    /**
     * Success test case for outputCollection
     * @return void
     */
    public function testSuccessOutputCollection()
    {
        $expected = "<div class='collectionItemContainer'><img src='https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif'><div class ='collectionItemInfo'><p>Title: The Riddle of Steel</p><p>Price Paid: £53.95</p><p> Date Acquired (Approximate): 2017-06-21</p><button type='button'>Delete</button></div></div>";
        $input = [["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif"]];
        $case = outputCollection($input);
        $this->assertEquals($expected, $case);
    }

    /**
     * Failure test case for outputCollection - missing keys and empty arrays
     * @return void
     */
    public function testFailureOutputCollectionMissingKeys()
    {
        $expected = "";
        $input = [[]];
        $case = outputCollection($input);
        $this->assertEquals($expected, $case);
    }
    /**
     * Failure test case for outputCollection - array not nested
     * @return void
     */
    public function testFailureOutputCollectionNotNestedArray()
    {
        $expected = "";
        $input = [];
        $case = outputCollection($input);
        $this->assertEquals($expected, $case);
    }

    /**
     * Malformed test case for OutputCollection - type error handling
     * @return void
     */
    public function testMalformedOutputCollectionTypeError()
    {
        $this->expectException(TypeError::class);
        $input = 2;
        $case = outputCollection($input);
    }
}