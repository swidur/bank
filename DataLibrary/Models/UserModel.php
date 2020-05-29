<?php

namespace DataLibrary {
    class UserModel
    {
        protected $userId;
        protected $userToken;
        protected $firstName;
        protected $secondName;
        protected $lastName;
        protected $password;
        protected $emailAddress;
        protected $userStatus;

        public function getFullName()
        {
            return htmlspecialchars($this->firstName . ' ' . $this->lastName);
        }

        /**
         * @return mixed
         */
        public function getUserId()
        {
            return htmlspecialchars($this->userId);
        }

        /**
         * @param mixed $userId
         */
        public function setUserId($userId)
        {
            $this->userId = $userId;
        }


        /**
         * @return mixed
         */
        public function getUserToken()
        {
            return htmlspecialchars($this->userToken);
        }


        /**
         * @return mixed
         */
        public function getSecondName()
        {
            return $this->secondName;
        }

        /**
         * @param mixed $secondName
         */
        public function setSecondName($secondName)
        {
            $this->secondName = $secondName;
        }

        /**
         * @param mixed $userToken
         */
        public function setUserToken($userToken)
        {
            $this->userToken = $userToken;
        }

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return htmlspecialchars($this->firstName);
        }

        /**
         * @param mixed $firstName
         */
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return htmlspecialchars($this->lastName);
        }

        /**
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return htmlspecialchars($this->password);
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getEmailAddress()
        {
            return strtolower(htmlspecialchars($this->emailAddress));
        }

        /**
         * @param mixed $emailAddress
         */
        public function setEmailAddress($emailAddress)
        {
            $this->emailAddress = strtolower($emailAddress);
        }

        /**
         * @return mixed
         */
        public function getUserStatus()
        {
            return htmlspecialchars($this->userStatus);
        }

        /**
         * @param mixed $userStatus
         */
        public function setUserStatus($userStatus)
        {
            $this->userStatus = $userStatus;
        }
    }
}