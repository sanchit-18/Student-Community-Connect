<?php

    require 'NeedPG.php';
 
    class NeedPGTest extends PHPUnit_Framework_TestCase {
        private $needpg;
     
        protected function setUp() { $this->needpg = new NeedPG(); }
     
        protected function tearDown() { $this->needpg = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->needpg->validate("male", "Kolkata", 6500, 2, $db);
            $this->assertEquals(array(), $result);
        }
    }

?>