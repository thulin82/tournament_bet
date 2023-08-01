<?php
/**
 * Config
 *
 * PHP version 7
 *
 * @category Config
 * @package  Tournament_Bet
 * @author   Markus Thulin <macky_b@hotmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/thulin82/tournament_bet
 */

// Set the error reporting.
// Report all type of errors.
error_reporting(-1);
// Display all errors.
ini_set('display_errors', 1);
// Do not buffer outputs, write directly.
ini_set('output_buffering', 0);

// Start the session.
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

// Settings for the database.
$db_options['dsn']         = 'sqlite:../db/tournament.sqlite';
$db_options['username']    = '';
$db_options['password']    = '';
$db_options['fetch_style'] = PDO::FETCH_OBJ;

define ('DB_HOST', 'sqlite:../db/tournament.sqlite');
define ('DB_USERNAME', '');
define ('DB_PASSWORD', '');
define ('DB_FETCH_STYLE', PDO::FETCH_OBJ);

// App Root.
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root.
define('URLROOT', 'http://localhost:4000');
// Application Name.
define('APPNAME', 'Tournament Bet');
