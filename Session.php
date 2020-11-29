<?php

/**
 * Singleton?
 */
class Session
{ 
    public static function get()
    {
        if(self::status() === PHP_SESSION_NONE)
            self::start();
        
        
    }

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
