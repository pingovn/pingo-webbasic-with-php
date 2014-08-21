<?php
    function connect() {
        $conn = mysql_connect("localhost", "root" , "") or die("Error:". mysql_error());
        mysql_select_db("lacphan_db") or die("Could not select database");
        return $conn;
    }
