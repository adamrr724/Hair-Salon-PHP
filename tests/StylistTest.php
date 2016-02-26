<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);



    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Adam";
            $test_stylist = new Stylist($name);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Adam";
            $id = 1;
            $test_stylist = new Stylist($name, $id);

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_find()
        {
            //Arrange
            $name = "Adam";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Paul";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist2->getId());

            //Assert
            $this->assertEquals($test_stylist2, $result);

        }

        function test_delete()
        {
         //Arrange
         $name = "Adam";
         $id = null;
         $test_stylist = new Stylist($name);
         $test_stylist->save();

         $name2 = "Paul";
         $test_stylist2 = new Stylist($name2);
         $test_stylist2->save();


         //Act
         $test_stylist->delete();

         //Assert
         $this->assertEquals([$test_stylist2], Stylist::getAll());
        }

        function test_deleteAll()
        {
            //Arrange
            $name = "Adam";
            $id = 1;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }


    }

 ?>
