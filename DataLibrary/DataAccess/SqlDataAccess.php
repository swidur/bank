<?php


namespace DataLibrary {

    use PDO;
    use PDOException as Exception;

    include_once 'DataLibrary/BusinessLogic/Helpers.php';

    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');


    class SqlDataAccess
    {
        private static $databaseAuthPath;
        private static $_didInit = false;


        public static function _innit_()
        {
            if (!self::$_didInit) {
                self::$databaseAuthPath = $_SERVER['SERVER_NAME'] == 'wikomp.edu.pl' ? 'DataLibrary/DataAccess/DatabaseAuth.php' : 'DataLibrary/DataAccess/DatabaseAuthLocal.php';
                require self::$databaseAuthPath;
                self::$_didInit = true;
            }
        }

        private static function getConnectionString()
        {
            self::_innit_();
            require self::$databaseAuthPath;
            return "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        }

        public static function LoadData($sql, $bind, $multipleRows = 0)
        {
            self::_innit_();
            try {
                $pdo = new PDO(self::getConnectionString(), $user, $pass, $options);
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

        public static function SaveData($sql, $bind)
        {
            self::_innit_();
            try {
                $pdo = new PDO(self::getConnectionString(), $user, $pass, $options);
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