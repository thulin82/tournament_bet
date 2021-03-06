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

// Include bootstrapping functions.
require '../src/bootstrap.php';

// Include autoloader.
require '../vendor/autoload.php';

// Start the session.
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

// Settings for the database.
$db_options['dsn']         = 'sqlite:../db/tournament.sqlite';
$db_options['username']    = '';
$db_options['password']    = '';
$db_options['fetch_style'] = PDO::FETCH_OBJ;
