<?php

    require 'NewUser.php';
 
    class NewUserTest extends PHPUnit_Framework_TestCase {
        private $newuser;
     
        protected function setUp() { $this->newuser = new NewUser(); }
     
        protected function tearDown() { $this->newuser = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->newuser->validate("Harshit", "male", 21, "IEM", "badiyaniharshit@gmail.com", "ht", "1234", "student", $db);
            $this->assertEquals(array(), $result);
        }
    }

?>