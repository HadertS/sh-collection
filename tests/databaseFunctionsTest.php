<?php

require_once '../databaseFunctions.php';

use PHPUnit\Framework\TestCase;

class databaseFunctionsTest extends TestCase
{
    public function testSuccessSanitizeInput()
    {
        $expected = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif"];
        $input = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif"];
        $case = sanitiseInput($input);
        $this->assertEquals($expected, $case);
    }
    public function testMalformedSanitizeInput()
    {
        $this->expectException(TypeError::class);
        $input = 2;
        $case = sanitiseInput($input);
    }

    public function testSuccessValidateInput()
    {
        $expected = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.png"];
        $input = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.png"];
        $case = validateInput($input);
        $this->assertEquals($expected, $case);
    }

    public function testFailureValidateInput()
    {
        $expected = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif","errorMessage" =>"<p>There is an error with your image url.</p>"];
        $input = ["title"=>"The Riddle of Steel","price_paid"=>"53.95","acquisition_date"=>"2017-06-21","image_source"=>"https://upload.wikimedia.org/wikipedia/en/2/2a/Riddle_of_steel_rpg_cover.gif"];
        $case = validateInput($input);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedValidateInput()
    {
        $this->expectException(TypeError::class);
        $input = 2;
        $case = validateInput($input);
    }
}

