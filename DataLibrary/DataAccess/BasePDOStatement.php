<?php

///\brief Class that extends PDOStatement to add exception handling
class BasePDOStatement extends PDOStatement
{
    protected $_debugValues = null;
    protected $_ValuePos = 0;

    protected function __construct()
    {
        // need this empty construct()!
    }

    ///\brief overrides execute saving array of values and catching exception with error logging
    public function execute($values = array())
    {
        $this->_debugValues = $values;
        $this->_ValuePos = 0;

        try {
            $t = parent::execute($values);
        } catch (PDOException $e) {
            // Do some logging here
            print $this->_debugQuery() . PHP_EOL;
            throw $e;
        }

        return $t;
    }

    ///\brief Retrieves query text with values for placeholders
    public function _debugQuery($replaced = true)
    {
        $q = $this->queryString;

        if (!$replaced) {
            return $q;
        }

        return preg_replace_callback('/(:([0-9a-z_]+)|(\?))/i', array(
            $this,
            '_debugReplace'
        ), $q);
    }

    ///\brief Replaces a placeholder with the corresponding value
    //$m is the name of a placeholder
    protected function _debugReplace($m)
    {
        if ($m[1] == '?') {
            $v = $this->_debugValues[$this->_ValuePos++];
        } else {
            $v = $this->_debugValues[$m[1]];
        }
        if ($v === null) {
            return "NULL";
        }
        if (!is_numeric($v)) {
            $v = str_replace("'", "''", $v);
        }

        return "'" . $v . "'";
    }
}

