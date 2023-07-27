<?php

/**
 * Flash message helper
 *
 * @param mixed $name  Name of the message
 * @param mixed $msg   The message
 * @param mixed $class The class to apply to the message
 *
 * @return void
 */
function flash($name = '', $msg = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($msg) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $msg;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($msg) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_classs']);
        }
    }
}

/**
 * Check if user is logged in
 *
 * @return bool
 */
function isLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}
