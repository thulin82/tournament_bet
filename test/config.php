<?php
/**
 * Config
 *
 * Get all configuration details to be able to execute the test suite.
 *
 * PHP version 7
 *
 * @category Config
 * @package  Tournament_Bet
 * @author   Markus Thulin <macky_b@hotmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/thulin82/tournament_bet
 */

define('DB_HOST', 'sqlite:../db/tournament.sqlite');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_FETCH_STYLE', PDO::FETCH_OBJ);

require __DIR__ . '/../vendor/autoload.php';
