<?php

    require 'SearchPG.php';
 
    class PGVacancyTest extends PHPUnit_Framework_TestCase {
        private $searchpg;
     
        protected function setUp() { $this->searchpg = new SearchPG(); }
     
        protected function tearDown() { $this->searchpg = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->searchpg->validate("male", "Kolkata", 4500, $db);
            $this->assertEquals(array(), $result);
        }
    }

?>