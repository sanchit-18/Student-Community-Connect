<?php

    require 'SearchTutor.php';
 
    class SearchTutorTest extends PHPUnit_Framework_TestCase {
        private $searchtutor;
     
        protected function setUp() { $this->searchtutor = new SearchTutor(); }
     
        protected function tearDown() { $this->searchtutor = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->searchtutor->validate("Kolkata", "", $db);
            $this->assertEquals(array(), $result);
        }
    }

?>