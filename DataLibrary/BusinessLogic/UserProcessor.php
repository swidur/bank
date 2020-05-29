<?php

namespace DataLibrary {
    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'DataLibrary/DataAccess/SqlDataAccess.php';
    include_once 'DataLibrary/Models/UserModel.php';


    class UserProcessor
    {
        public static function returnNullUser()
        {
            return new UserModel();
        }

        public static function createUserBasic($firstName, $secondName, $lastName, $password, $emailAddress)
        {

            $sql = 'INSERT INTO users (userToken, firstName, secondName, lastName, passHash, email, userStatus) 
                    VALUES (?,?,?,?,?,?,?)';

            do {
                $userToken = GUIDGenerator::getGUID();
            } while (self::getUserByToken($userToken) != UserProcessor::returnNullUser());

            $rowCount = SqlDataAccess::SaveData($sql,
                [
                    $userToken,
                    $firstName,
                    $secondName,
                    $lastName,
                    $password,
                    $emailAddress,
                    'M']);
        }


        public static function getUserByEmail($email)
        {
            $sql = 'SELECT id, userToken, firstName, secondName, lastName, email, passHash, userStatus from users where email = ?';

            $result = SqlDataAccess::LoadData($sql, [$email]);
            if (!$result) {
                return self::returnNullUser();
            } else {
                $data = new UserModel();
                $data->setUserId($result['id']);
                $data->setUserToken($result['userToken']);
                $data->setFirstName($result['firstName']);
                $data->setSecondName($result['secondName']);
                $data->setLastName($result['lastName']);
                $data->setEmailAddress($result['email']);
                $data->setPassword($result['passHash']);
                $data->setUserStatus($result['userStatus']);
                return $data;
            }
        }

        public static function getUserById($id)
        {
            $sql = 'SELECT id, userToken, firstName, secondName, lastName, email, passHash, userStatus from users where id = ?';

            $result = SqlDataAccess::LoadData($sql, [$id]);
            if (!$result) {
                return self::returnNullUser();
            } else {
                $data = new UserModel();
                $data->setUserId($result['id']);
                $data->setUserToken($result['userToken']);
                $data->setFirstName($result['firstName']);
                $data->setSecondName($result['secondName']);
                $data->setLastName($result['lastName']);
                $data->setEmailAddress($result['email']);
                $data->setPassword($result['passHash']);
                $data->setUserStatus($result['userStatus']);
                return $data;
            }
        }

        public static function getUserByToken($token)
        {
            $sql = 'SELECT id, userToken, firstName, secondName, lastName, email, passHash, userStatus from users where userToken = ?';

            $result = SqlDataAccess::LoadData($sql, [$token]);
            if (!$result) {
                return self::returnNullUser();
            } else {
                $data = new UserModel();
                $data->setUserId($result['id']);
                $data->setUserToken($result['userToken']);
                $data->setFirstName($result['firstName']);
                $data->setSecondName($result['secondName']);
                $data->setLastName($result['lastName']);
                $data->setEmailAddress($result['email']);
                $data->setPassword($result['passHash']);
                $data->setUserStatus($result['userStatus']);
                return $data;
            }
        }

        public static function updateUserStatus($newStatus, $userId)
        {
            $sql = 'UPDATE users set userStatus = ? where id = ?';
            SqlDataAccess::SaveData($sql, [$newStatus, $userId]);
        }

        public static function updateUserPassword($newPassword, $userId)
        {
            $sql = 'UPDATE users set passHash = ? where id = ?';
            SqlDataAccess::SaveData($sql, [$newPassword, $userId]);
        }

        public static function updateUserDetails($userId, \UserInterface\UserModel $userModel)
        {
            $sql = 'UPDATE users set PESEL = ?, phoneNumber = ?, birthDate = ?, sex = ? where id = ?';
            return SqlDataAccess::SaveData($sql, [
                $userModel->getPESEL(),
                $userModel->getPhoneNumber(),
                $userModel->getBirthDate(),
                $userModel->getSex(),
                $userId]);

        }

        public static function getUsers()
        {
            $sql = 'SELECT id, userToken, firstName, secondName, lastName, email,  userStatus from users';

            $users = [];

            $result = SqlDataAccess::LoadData($sql, [], 1);
            if (!$result) {
                return array(self::returnNullUser());
            } else {
                foreach ($result as $data) {
                    $user = new UserModel();
                    $user->setUserId($data['id']);
                    $user->setUserToken($data['userToken']);
                    $user->setFirstName($data['firstName']);
                    $user->setSecondName($data['secondName']);
                    $user->setLastName($data['lastName']);
                    $user->setEmailAddress($data['email']);
                    $user->setUserStatus($data['userStatus']);

                    array_push($users, $user);
                }
                Helpers::addToSession('users', $users);
            }
        }

    }

}

