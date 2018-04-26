<?php

    require 'SellItems.php';
 
    class SellItemsTest extends PHPUnit_Framework_TestCase {
        private $sellitems;
     
        protected function setUp() { $this->sellitems = new SellItems(); }
     
        protected function tearDown() { $this->sellitems = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->sellitems->validate("Something", "Notes", "Hello", 450, $db);
            $this->assertEquals(array(), $result);
        }
    }

?>