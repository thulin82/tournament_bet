<?php

use \PHPUnit\Framework\TestCase;

class CDatabaseTest extends TestCase
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
        $array = array(
                  'dsn'         => 'sqlite::memory:',
                  'username'    => '',
                  'password'    => '',
                  'fetch_style' => PDO::FETCH_OBJ,
                 );
        $this->_db = new CDatabase($array);
        $this->_db->connect();
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
    public function testAllowMultipleCallToConnect()
    {
        $db = $this->_db->connect();
        $db = $this->_db->connect();
        $this->assertInstanceOf("CDatabase", $db);
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateObject()
    {
        $db = new CDatabase([]);
        $this->assertInstanceOf("CDatabase", $db);
    }

    /**
     * Testcase
     *
     * @expectedException Exception
     *
     * @return void
     */
    public function testMissingDSN()
    {
        $db = new CDatabase([]);
        $db->connect();
    }

    /**
     * Testcase
     *
     * @expectedException PDOException
     *
     * @return void
     */
    public function testPDOExeption()
    {
        $array = array(
                  'dsn'         => 'pdo:::::',
                  'username'    => '',
                  'password'    => '',
                  'fetch_style' => PDO::FETCH_OBJ,
                 );
        $db = new CDatabase($array);
        $db->connect();
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateTable()
    {
        $sql = 'CREATE TABLE test (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, age INTEGER, text VARCHAR(20))';
        $res = $this->_db->execute($sql);
        $this->assertTrue($res);
    }

    /**
     * Test Dummy
     *
     * @return void
     */
    public function testExecuteQueryFetchAll()
    {
        $this->markTestIncomplete('Not written yet.');
    }

    /**
     * Test Dummy
     *
     * @return void
     */
    public function testExecuteQueryFetch()
    {
        $this->markTestIncomplete('Not written yet.');
    }
}
