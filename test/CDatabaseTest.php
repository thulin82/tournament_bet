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
