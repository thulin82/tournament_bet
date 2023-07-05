<?php

/**
 * Redirect page
 *
 * @param string $page Page
 *
 * @return void
 */
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}
