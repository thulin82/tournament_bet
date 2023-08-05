<?php

use \PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * Database description
     *
     * @var mixed $_database Should contain a description
     */
    private $_db;

    /**
     * Test Setup
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->_db = new Database(true);
    }
    
    /**
     * Test Teardown
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->_db);
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testAllowMultipleCallToConnect() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateObject() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Testcase
     *
     * @expectedException Exception
     *
     * @return void
     */
    public function testMissingDSN() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Testcase
     *
     * @expectedException PDOException
     *
     * @return void
     */
    public function testPDOExeption() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateTable() : void
    {
        $this->_db->query('CREATE TABLE test (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, age INTEGER, text VARCHAR(20))');
        $res = $this->_db->execute();
        $this->assertTrue($res);
    }

    /**
     * Test Dummy
     *
     * @return void
     */
    public function testExecuteQueryFetchAll() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Test Dummy
     *
     * @return void
     */
    public function testExecuteQueryFetch() : void
    {
        $this->markTestIncomplete('Not written yet.');
    }
}
