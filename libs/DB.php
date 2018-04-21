<?php


class DB {
    /**
     * @var null|mysqli
     */
    var $_conn = null;
    /**
     * @var mysqli_result
     */
    var $_res = null;
    var $_last_error = null;

    function __construct() {
        if ($this->_conn) {
            mysqli_close($this->_conn) or die('Could not close: ' . mysqli_error($this->_conn));
            unset($this->_res);
        }

        $this->connect();
    }

    public function connect() {
        if (!$this->_conn || !$this->_conn->connect_errno) {
            $this->_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Error :: Unable to connect to database");
            mysqli_select_db($this->_conn, DB_NAME) or die("Error :: Unable to select database");
            mysqli_query($this->_conn, "SET NAMES UTF8");
            mysqli_set_charset($this->_conn, 'utf8');
        }
    }

    function disconnect() {
        if ($this->_conn) {
            mysqli_close($this->_conn);
            $this->_conn = null;
            unset($this->_res);
        }
    }

    function query($query) {
        $result = false;
        unset($this->_res);
        if ($this->_conn) {
            $result = mysqli_query($this->_conn, $query);
            if (!$result) {
                $result = false;
                $this->_last_error = mysqli_error($this->_conn);
            }
        }

        $this->_res = $result;

        return ($this->_res);
    }//END: function send_query($query)

    /**
     * @param int $row_index
     * @param string $field_name
     * @return null|string
     */
    function get_data($row_index, $field_name) {
        if (is_numeric($field_name) && $field_name < 0) {
            $field_name = '';
        }
        if ($this->_res && $row_index >= 0)//&& $field_name != '')
        {
            $this->_res->data_seek($row_index);
            $row = mysqli_fetch_assoc($this->_res);
            $resdata = $row[$field_name];
            if ($resdata === false) {
                $this->_last_error = mysqli_error($this->_conn);
            }

            return $resdata;
        }

        return $this->_last_error;
    }

    function get_row() {
        if ($this->_res) {
            $resdata = mysqli_fetch_row($this->_res);
            if (!$resdata) {
                $this->_last_error = mysqli_error($this->_conn);
            }

            return $resdata;
        }

        return $this->_last_error;
    }

    function get_assoc() {
        if ($this->_res) {
            $resdata = mysqli_fetch_assoc($this->_res);
            if (!$resdata) {
                $this->_last_error = mysqli_error($this->_conn);
            }

            return $resdata;
        }

        return $this->_last_error;
    }

    function num_cols() {
        if ($this->_res != '') {
            return mysqli_num_fields($this->_res);
        }
    }

    function num_rows() {
        if ($this->_res != '') {
            return mysqli_num_rows($this->_res);
        }
    }

    function get_last_id() {
        return mysqli_insert_id($this->_conn);
    }

    function affected_rows() {
        return mysqli_affected_rows($this->_conn);
    }

    public function escape($string) {
        return mysqli_real_escape_string($this->_conn, $string);
    }
}

?>
