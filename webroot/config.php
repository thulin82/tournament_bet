<?php
/**
 * Set the error reporting.
 *
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
 
/**
 * Include bootstrapping functions.
 *
 */
include('../src/bootstrap.php');

/**
 * Include autoloader.
 *
 */
include('../vendor/autoload.php');

/**
 * Start the session.
 *
 */
session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
session_start();

/**
* Settings for the database.
*
*/
$db_options['dsn']         = 'sqlite:../db/tournament.sqlite';
$db_options['fetch_style'] = PDO::FETCH_OBJ;
