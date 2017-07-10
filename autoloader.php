<?php
/**
* Autoloader
*
* PHP version 7
*
* @param string $class The name of the class.
*
* @category Autoloader
* @package  Tournament Bet
* @author   Markus Thulin <macky_b@hotmail.com>
* @license  http://www.opensource.org/licenses/mit-license.php MIT
* @link     https://github.com/thulin82/tournament_bet
*
* @return void
 */
function myAutoloader($class)
{
    $path = "/src/{$class}/{$class}.php";
    if (is_file($path)) {
        include $path;
    } else {
        throw new Exception("Classfile '{$class}' does not exists.");
    }
}
spl_autoload_register('myAutoloader');
