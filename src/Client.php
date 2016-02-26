<?php
    class Client
    {
        private $client_name;
        private $phone;
        private $email;
        private $stylist_id;
        private $id;

        function __construct($client_name, $phone, $email, $stylist_id, $id = null)
        {
            $this->client_name = $client_name;
            $this->phone = $phone;
            $this->email = $email;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function setClientName($new_client_name)
        {
            $this->client_name = $new_client_name;
        }

        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = $new_stylist_id;
        }

        function getClientName()
        {
            return $this->client_name;
        }

        function getPhone()
        {
            return $this->phone;
        }

        function getEmail()
        {
            return $this->email;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (client_name, phone, email, stylist_id) VALUES ('{$this->getClientName()}', '{$this->getPhone()}', '{$this->getEmail()}', {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function updateClientName($new_client_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET client_name = '{$new_client_name}' WHERE id = {$this->getId()};");
            $this->setClientName($new_client_name);
        }

        function updatePhone($new_phone)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET phone = '{$new_phone}' WHERE id = {$this->getId()};");
            $this->setPhone($new_phone);
        }

        function updateEmail($new_email)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET email = '{$new_email}' WHERE id = {$this->getId()};");
            $this->setEmail($new_email);
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = [];

            foreach ($returned_clients as $client) {
                $client_name = $client['client_name'];
                $phone = $client['phone'];
                $email = $client['email'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($client_name, $phone, $email, $stylist_id, $id);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();

            foreach ($clients as $client) {
                if ($client->getId() == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }

        function deleteOneClient()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients");
        }
    }

?>
