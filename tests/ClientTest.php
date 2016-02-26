<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $id = null;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $id = 1;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $id2 = 2;
            $client_name2 = "Joe";
            $phone2 = "203-456-9987";
            $email2 = "bye@gmail.com";
            $stylist_id2 = 2;

            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id2, $id2);
            $test_client2->save();


            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_getClients()
        {
            //Arrange
            $name = "Adam";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $stylist_id = $test_stylist->getId();

            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $client_name2 = "Joe";
            $phone2 = "203-456-9987";
            $email2 = "bye@gmail.com";

            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id, $id);

            $test_client2->save();

            //Act
            $result = $test_stylist->getClients();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }


        function testUpdateClientName()
        {
            //Arrange
            $id = null;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $new_name = "Bob";

            //Act
            $test_client->updateClientName($new_name);

            //Assert
            $this->assertEquals("Bob", $test_client->getClientName());

        }

        function testUpdatePhone()
        {
            //Arrange
            $id = null;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $new_phone = "345-678-9876";

            //Act
            $test_client->updatePhone($new_phone);

            //Assert
            $this->assertEquals("345-678-9876", $test_client->getPhone());

        }

        function testUpdateEmail()
        {
            //Arrange
            $id = null;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);
            $test_client->save();

            $new_email = "Bob@google.com";

            //Act
            $test_client->updateEmail($new_email);

            //Assert
            $this->assertEquals("Bob@google.com", $test_client->getEmail());

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

        function test_find()
        {
            //Arrange
            $id = 1;
            $client_name = "Fred";
            $phone = "203-456-9876";
            $email = "hi@gmail.com";
            $stylist_id = 1;

            $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);

            $test_client->save();

            $id2 = 2;
            $client_name2 = "Joe";
            $phone2 = "203-456-9987";
            $email2 = "bye@gmail.com";
            $stylist_id2 = 2;

            $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id2, $id2);

            $test_client2->save();

            //Act
            $result = Client::find($test_client2->getId());

            //Assert
            $this->assertEquals($test_client2, $result);

        }

        function test_delete()
        {
         //Arrange
         $id = 1;
         $client_name = "Fred";
         $phone = "203-456-9876";
         $email = "hi@gmail.com";
         $stylist_id = 1;

         $test_client = new Client($client_name, $phone, $email, $stylist_id, $id);

         $test_client->save();

         $id2 = 2;
         $client_name2 = "Joe";
         $phone2 = "203-456-9987";
         $email2 = "bye@gmail.com";
         $stylist_id2 = 2;

         $test_client2 = new Client($client_name2, $phone2, $email2, $stylist_id2, $id2);

         $test_client2->save();


         //Act
         $test_client->delete();

         //Assert
         $this->assertEquals([$test_client2], Client::getAll());
        }

        function test_deleteAll()
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
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

    }

?>
