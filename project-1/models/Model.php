<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com>
 * Date: 6/29/14
 * Time: 4:30 AM
 */

class Model {
    protected $table = '';
    /*
     * Database
     */
    public $db = null;
    public function __construct()
    {
        $this->db = Database::createInstance();
    }

    /**
     * @return Database
     */
    protected function db()
    {
        return $this->db;
    }

    /**
     * Get row by id
     * Id should be an integer number
     * @param $id
     * @return bool|array
     */
    public function getById($id)
    {

        $id = intval($id);
        if ($id == 0) {
            return false;
        }
        $sql = "SELECT * FROM {$this->table} WHERE id = '{$id}'";
        $rows = $this->db()->select($sql);
        if (count($rows) == 0) {
            return fasle;
        }

        return $rows[0];
    }
}