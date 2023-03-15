<?php

    class task {

        private $id;
        private $description;
        private $priority;
        private $time_created;

        public function __get($var){

            return $this->$var;
        }

        public function __set($var, $value){

            $this->$var = $value;
        }

        public function __toString(){

            $format = 'ID: %s<br>Task: %s<br>Priortity: %s<br>Created: %s<hr class="border-small border-black">';

            return sprintf($format, $this->__get('id'), $this->__get('description'),
                    $this->__get('priority'), $this->__get('time_created'));
        }

    }

?>