<?php

    class client {

        private $id;
        private $dog_name;
        private $owner_name;
        private $frequency_of_visits;
        private $appointment_date;


        public function __get($var){

            return $this->$var;
        }

        public function __set($var, $value){

            $this->$var = $value;
        }

        public function __toString(){

            $format = "<hr>ID: %s<br/>Dog Name: %s<br/>Owner Name: %s<br/>Frequency: %s<br/>Appointment Date: %s<br/>";

            return sprintf($format, $this->__get('id'), $this->__get('dog_name'), $this->__get('owner_name'), 
                    $this->__get('frequency_of_visits'), $this->__get('appointment_date'));
        }

    }

?>