<?php

/**
 * This class provides methods to handle PHP Sessions
 * Sessions can be started and closed
 */
class Session
{
    /**
     * Get a PHP Session
     */
    public static function get()
    {
        if(self::status() === PHP_SESSION_NONE)
            self::start();  
    }

    /**
     * Closes an active PHP Session
     */
    public static function close()
    {
        if(self::status() === PHP_SESSION_ACTIVE)
            return session_destroy();

        return false;
    }

    /**
     * Start a session
     * @return bool
     */
    private static function start()
    {
        return session_start();
    }

    private static function status()
    {
        return session_status();
    }

    private static function unset($variable)
    {
        if(self::status() === PHP_SESSION_ACTIVE)
        {
            return session_unset($_SESSION[$variable]);
        }

        return false;
    }
}
