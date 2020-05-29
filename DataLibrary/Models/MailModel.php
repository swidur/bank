<?php

namespace DataLibrary {
    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'DataLibrary/Models/NotificationModelAbstract.php';


    class MailModel extends NotificationModelAbstract
    {
        protected $subject;
        protected $header;

        //region Getters and Setters

        /**
         * @return mixed
         */
        public function getSubject()
        {
            return $this->subject;
        }

        /**
         * @param mixed $subject
         */
        public function setSubject($subject)
        {
            $this->subject = $subject;
        }

        /**
         * @return mixed
         */
        public function getHeader()
        {
            return $this->header;
        }

        /**
         * @param mixed $header
         */
        public function setHeader($header)
        {
            $this->header = $header;
        }
//        endregion

    }
}
