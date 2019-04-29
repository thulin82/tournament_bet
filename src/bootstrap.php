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
 * Print
 *
 */
function prePrint($content)
{
    echo "<pre>" . print_r($content, 1) . "</pre>";
}
