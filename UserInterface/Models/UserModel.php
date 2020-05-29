<?php

namespace UserInterface {

    class UserModel
    {
        protected $firstName;
        protected $secondName;
        protected $lastName;
        protected $email;
        protected $confirmEmail;
        protected $password;
        protected $confirmPassword;
        protected $PESEL;
        protected $birthDate;
        protected $phoneNumber;
        protected $sex;
        protected $error;


//        region Getters and Setters

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return htmlspecialchars($this->firstName, ENT_QUOTES, 'UTF-8');
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
            return htmlspecialchars($this->lastName, ENT_QUOTES, 'UTF-8');
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
         * @param mixed $lastName
         */
        public function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return strtolower(htmlspecialchars($this->email, ENT_QUOTES, 'UTF-8'));
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = strtolower($email);
        }

        /**
         * @return mixed
         */
        public function getConfirmEmail()
        {
            return strtolower(htmlspecialchars($this->confirmEmail, ENT_QUOTES, 'UTF-8'));
        }

        /**
         * @param mixed $confirmEmail
         */
        public function setConfirmEmail($confirmEmail)
        {
            $this->confirmEmail = strtolower($confirmEmail);
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
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
        public function getConfirmPassword()
        {
            return $this->confirmPassword;
        }

        /**
         * @param mixed $confirmPassword
         */
        public function setConfirmPassword($confirmPassword)
        {
            $this->confirmPassword = $confirmPassword;
        }

        /**
         * @return mixed
         */
        public function getError()
        {
            return $this->error;
        }

        /**
         * @param mixed $error
         */
        public function setError($error)
        {
            $this->error = $error;
        }

        /**
         * @return mixed
         */
        public function getPESEL()
        {
            return $this->PESEL;
        }

        /**
         * @param mixed $PESEL
         */
        public function setPESEL($PESEL)
        {
            $this->PESEL = $PESEL;
        }

        /**
         * @return mixed
         */
        public function getBirthDate()
        {
            return $this->birthDate;
        }

        /**
         * @param mixed $birthDate
         */
        public function setBirthDate($birthDate)
        {
            $this->birthDate = $birthDate;
        }

        /**
         * @return mixed
         */
        public function getPhoneNumber()
        {
            return $this->phoneNumber;
        }

        /**
         * @param mixed $phoneNumber
         */
        public function setPhoneNumber($phoneNumber)
        {
            $this->phoneNumber = $phoneNumber;
        }

        /**
         * @return mixed
         */
        public function getSex()
        {
            return strtoupper($this->sex);
        }

        /**
         * @param mixed $sex
         */
        public function setSex($sex)
        {
            $this->sex = $sex;
        }

//        endregion
    }
}
