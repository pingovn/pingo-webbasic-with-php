<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com
 * Date: 6/29/14
 * Time: 4:29 AM
 */

class User extends Model {
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $table = 'user';

    /**
     * @param string $username
     * @param string $password
     * @param string $fullname
     * @param string $email
     * @param string $aboutme
     * @return bool|int
     */
    public function add($username, $password, $fullname, $email, $aboutme)
    {
        // Escape input before querying
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        $email = mysql_real_escape_string($email);
        $fullname = mysql_real_escape_string($fullname);
        $aboutme = mysql_real_escape_string($aboutme);
        $encryptedPassword = md5($password);
        $status = self::STATUS_ACTIVE;

        // By default, status of new user should be active
        $sql = "
            INSERT INTO user (username, password, email, fullname, aboutme, status)
            VALUES ('{$username}', '{$encryptedPassword}', '{$email}', '{$fullname}', '{$aboutme}', '{$status}')
        ";

        $insertedId = $this->db()->insert($sql);
        if ($insertedId === false && $this->db()->getErrorMsg() != '') {
            die("Error when inserting to databse: " . $this->db()->getErrorMsg());
        }
        return $insertedId;
    }

    /**
     * Login with given username and password
     * @param string $username
     * @param string $password
     * @return string|bool
     */
    public function login($username = "", $password = "")
    {
        if ($username == "" || $password == "") {
            session_destroy();
            return "Please input username or password to login";
        }

        $encryptedPassword = md5($password);
        $sql = "SELECT * FROM user
                WHERE username = '{$username}'
                    AND password = '{$encryptedPassword}'
                    AND status = '1'
                ";
        $rows = $this->db()->select($sql);

        if (count($rows) == 0) {
            session_destroy();
            return "Username or password is incorrect. Please try again.";
        }

        // Login successfully, continue process with sessions and cookies
        $row = $rows[0];
        // Store user info into session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        return true;
    }

    /**
     * Logout user - remove session and return homepage
     * @return bool
     */
    public function logout()
    {
        if (!$this->isLogged()) {
            return false;
        }
        session_destroy();
        return true;
    }
    /**
     * Check if user is logged in or not
     * @return bool
     */
    public function isLogged()
    {
        return isset($_SESSION['user_id']) && $_SESSION['user_id'] !== false;
    }

    /**
     * Get userId from session, return false if user isn't loggged in
     * @return bool
     */
    public function getId()
    {
        if (!$this->isLogged()) {
            return false;
        }
        return $_SESSION['user_id'];
    }

    /**
     * Get username from session, return false if user isn't logged in
     * @return bool
     */
    public function getUsername()
    {
        if (!$this->isLogged()) {
            return false;
        }
        return $_SESSION['username'];
    }
}