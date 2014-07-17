<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com
 * Date: 6/28/14
 * Time: 5:29 PM
 */


class Database {
    private $connection = null;
    private $conn = null;
    private $sql = '';
    private $errorMsg = '';

    /*
     * @var Database
     */
    static private $instance = null;

    /**
     * Singleton implementation - create database instance
     * @return Database|null
     */
    static public function createInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->connect();
    }

    /**
     * Connect to database with params provided by configuration file
     * Show error if connect failed and exit
     */
    private function connect()
    {
        $this->conn = mysql_connect(DB_HOST, DB_USER, DB_PASS);
        if (!$this->conn) {
            die(mysql_errno($this->conn) . ": " . mysql_error($this->conn));
        }

        $result = mysql_select_db(DB_NAME, $this->conn);

        if (!$result) {
            die(mysql_errno($this->conn) . ": " . mysql_error($this->conn));
        }
    }

    /**
     * Query into database to select data
     * @FIXME Should escape sql before doing querying
     * @param string $sql
     * @return array $rows
     */
    public function select($sql = '')
    {
        $this->errorMsg = '';
        if ($sql == '') {
            return false;
        }
        $this->sql = $sql;
        $res = mysql_query($sql, $this->conn);
        if ($res === false) {
            $this->errorMsg = mysql_errno($this->conn) . ": " . mysql_error($this->conn);
            return false;
        }

        $rows = array();
        while ($row = mysql_fetch_array($res, MYSQL_ASSOC))
        {
            $rows[] = $row;
        }
        mysql_free_result($res);
        return $rows;
    }

    /**
     * Insert into database with sql query
     * @param string $sql
     * @return bool|int
     */
    public function insert($sql = '')
    {
        $this->errorMsg = '';
        if ($sql == '') {
            return false;
        }
        $this->sql = $sql;
        $res = mysql_query($sql, $this->conn);
        if ($res === false) {
            $this->errorMsg = mysql_errno($this->conn) . ": " . mysql_error($this->conn);
            return false;
        }
        return mysql_insert_id();
    }

    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    public function getLastQuery()
    {
        return $this->sql;
    }
}