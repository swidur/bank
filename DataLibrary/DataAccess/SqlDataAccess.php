<?php


namespace DataLibrary {

    use PDO;
    use PDOException as Exception;

    include_once 'DataLibrary/BusinessLogic/Helpers.php';

    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');


    class SqlDataAccess
    {
        private static $host;
        private static $db;
        private static $port;
        private static $user;
        private static $password;
        private static $charset;
        private static $options;

        private static $_didInit = false;

        public static function _init_()
        {
            if (!self::$_didInit) {
                $databaseAuthPath = $_SERVER['SERVER_NAME'] == 'wikomp.edu.pl' ? 'DataLibrary/DataAccess/DatabaseAuth.php' : 'DataLibrary/DataAccess/DatabaseAuthLocal.php';
                self::$_didInit = true;
                include $databaseAuthPath;
                self::$host = $_host;
                self::$db = $_db;
                self::$port = $_port;
                self::$user = $_user;
                self::$password = $_password;
                self::$charset = $_charset;
                self::$options = $_options;
            }
        }

        private static function getConnectionString()
        {
            self::_init_();
            return "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset . ";port=" . self::$port;
        }

        public static function loadData($sql, $bind, $multipleRows = 0)
        {
            self::_init_();
            try {
                $pdo = new PDO(self::getConnectionString(), self::$user, self::$password, self::$options);
            } catch (Exception $e) {
                echo 'Caught sqlDataAccess exception: ' . $e->getTraceAsString() . "\r" . $e->getMessage();
                die();
            }
            try {
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute($bind)) {
                    if ($multipleRows) {
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    return $result;
                } else {
                    return false;
                }

            } catch (Exception $e) {
                echo 'Caught sqlDataAccess exception: ' . $e->getTraceAsString() . "\r" . $e->getMessage();
                die();
            }
        }

        public static function saveData($sql, $bind)
        {
            try {
                $pdo = new PDO(self::getConnectionString(), self::$user, self::$password, self::$options);
            } catch (Exception $e) {
                echo 'Caught sqlDataAccess exception: ' . $e->getTraceAsString() . "\r" . $e->getMessage() . "\r";
                die();
            }
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute($bind);
//                var_dump( $stmt->queryString, $stmt->_debugQuery() );

                return $stmt->rowCount();

            } catch (Exception $e) {
                echo 'Caught sqlDataAccess exception: ' . $e->getTraceAsString() . "\r" . $e->getMessage();
                die();
            }
        }
    }
}