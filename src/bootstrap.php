<?php
/**
 * Exception handler.
 *
 */
function myExceptionHandler($exception)
{
    echo "Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader
 *
 */
function Autoloader($class)
{
    $path = "../src/{$class}/{$class}.php";
    if (is_file($path)) {
        include($path);
    } else {
        throw new Exception("Classfile '{$class}' does not exists.");
    }
}
spl_autoload_register('Autoloader');

/**
 * Print
 *
 */
function prePrint($content)
{
    echo "<pre>" . print_r($content, 1) . "</pre>";
}
