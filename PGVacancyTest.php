<?php

    require 'PGVacancy.php';
 
    class PGVacancyTest extends PHPUnit_Framework_TestCase {
        private $pgvacancy;
     
        protected function setUp() { $this->pgvacancy = new PGVacancy(); }
     
        protected function tearDown() { $this->pgvacancy = NULL; }
     
        public function test() {
            require 'dbconnect.php';
            $result = $this->pgvacancy->validate("TestPG", "male", "", "Kolkata", 4500, $db);
            $this->assertEquals(array(), $result);
        }
    }

?>