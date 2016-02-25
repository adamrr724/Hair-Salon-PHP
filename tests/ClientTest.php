<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Stylist::deleteAll();
        //     Client::deleteAll();
        // }

        function test_getClientName()
        {
            $client_name = "Fred";
            $id = 1;
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);

            //Act
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Adam";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getStylistId()
        {
            //Arrange
            $name = "Adam";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;
            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

    }

?>
