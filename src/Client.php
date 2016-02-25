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
    }

?>
