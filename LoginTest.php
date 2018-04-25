<?php

    require 'Login.php';
 
    class LoginTest extends PHPUnit_Framework_TestCase {
        private $login;
     
        protected function setUp() { $this->login = new Login(); }
     
        protected function tearDown() { $this->login = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->login->validate("cv", 124, $db);
            $this->assertEquals(array(), $result);
        }
    }

?>