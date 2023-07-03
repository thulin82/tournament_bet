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
        $array = array(
                  'dsn'         => 'sqlite::memory:',
                  'username'    => '',
                  'password'    => '',
                  'fetch_style' => PDO::FETCH_OBJ,
                 );
        $this->_db = new Database($array);
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
    public function testAllowMultipleCallToConnect() : void
    {
        $db = $this->_db->connect();
        $db = $this->_db->connect();
        $this->assertInstanceOf("Database", $db);
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateObject() : void
    {
        $db = new Database([]);
        $this->assertInstanceOf("Database", $db);
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
        $this->expectException(Exception::class);
        $db = new Database([]);
        $db->connect();
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
        $this->expectException(PDOException::class);
        $array = array(
                  'dsn'         => 'pdo:::::',
                  'username'    => '',
                  'password'    => '',
                  'fetch_style' => PDO::FETCH_OBJ,
                 );
        $db = new Database($array);
        $db->connect();
    }

    /**
     * Testcase
     *
     * @return void
     */
    public function testCreateTable() : void
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
