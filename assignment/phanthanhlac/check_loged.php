<?php
    function check_loged() {
        $is_loged = isset($_SESSION['username']) ? 1 : 0 ;
        return $is_loged;
    }

