<?php

    require 'ProvideCoaching.php';
 
    class ProvideCoachingTest extends PHPUnit_Framework_TestCase {
        private $providecoaching;
     
        protected function setUp() { $this->providecoaching = new ProvideCoaching(); }
     
        protected function tearDown() { $this->providecoaching = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->providecoaching->validate("Kolkata", "Computer", 1000, 2, "Evening", $db);
            $this->assertEquals(array(), $result);
        }
    }

?>