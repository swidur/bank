<?php


namespace DataLibrary;


class Helpers
{
    public static function redirect($url, $time = 0, $useJs = false)
    {
        if (!headers_sent() && !$useJs) {
            if (!$time) {
                header('Location: ' . $url);
                exit;
            } else {
                header("refresh:" . $time . ";url=" . $url);
            }

        } else {
            if (!$time) {
                echo '<script type="text/javascript">';
                echo 'window.location.href="' . $url . '";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
                echo '</noscript>';
                exit;
            } else {
                $msTime = (int)$time * 1000;
                echo '<script type="text/javascript">';
                echo 'setTimeout(function(){window.location.href="' . $url . '";},' . $msTime . ');';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="' . $time . ';url=' . $url . '" />';
                echo '</noscript>';
                exit;
            }
        }
    }

    private static function inactivityLogout($sessionLength = 10 * 60)
    {
        if (isset($_SESSION['timeout'])) {
            $duration = time() - (int)$_SESSION['timeout'];
            if ($duration > $sessionLength) {
                session_destroy();
                Helpers::redirect('/gr4/redirect/inactivityLogout?r=30');
                return 0;
            }
        }
        return 1;
    }

    public static function isUserLoggedIn()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn']) {
            if (self::inactivityLogout()) {
                session_write_close();
                return 1;
            }
        }
        session_write_close();
        return 0;
    }

    public static function addToSession($fieldName, $value)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[$fieldName] = $value;
        session_write_close();
    }

    public static function unsetFromSession($fieldName)
    {
        self::__init__();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION[$fieldName])) unset($_SESSION[$fieldName]);
        session_write_close();
    }

}