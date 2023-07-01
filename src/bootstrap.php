<?php

require_once 'config/config.php';

/**
 * Autoloader for classes.
 *
 * @param mixed $className The name of the class.
 *
 * @return void
 */
spl_autoload_register(function($className){
    require_once $className . '.php';
});

/**
 * Exception handler.
 *
 * @param mixed $exception Exception
 *
 * @return void
 */
function myExceptionHandler($exception)
{
    echo "Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');

/**
 * Print
 *
 * @param mixed $content Stuff to print
 *
 * @return void
 */
function prePrint($content)
{
    echo "<pre>" . print_r($content, 1) . "</pre>";
}
