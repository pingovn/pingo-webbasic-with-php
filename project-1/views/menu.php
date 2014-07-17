<?php
/**
 * Created by PhpStorm.
 * User: Tuan Duong <bacduong[at]gmail[dot]com
 * Date: 6/28/14
 * Time: 2:38 PM
 */
$userModel = new User();
?>
<ul id="nav">
    <li
        <?php if ($menu == "index") : ?>
            class="current"
        <?php endif ?>
    >
        <a href="./index.php">Homepage</a>
    </li>
    <li
        <?php if ($menu == "categories") : ?>
            class="current"
        <?php endif ?>
    >
        <a href="categories.php">Categories</a>
    </li>
    <li><a href="#">Discussion</a></li>
    <li><a href="#">Authors</a></li>
    <li><a href="#">Contact</a></li>
    <?php if (!$userModel->isLogged()) : ?>
        <li
            <?php if ($menu == "register") : ?>
                class="current"
            <?php endif ?>
            >
            <a href="register.php">Register</a>
        </li>
        <li
            <?php if ($menu == "login") : ?>
                class="current"
            <?php endif ?>
            >
            <a href="login.php">Login</a>
        </li>
    <?php else : ?>
        <li
            <?php if ($menu == "user") : ?>
                class="current"
            <?php endif ?>
            >
            <a href="user.php">Account</a>
        </li>
        <li><a href="logout.php">Logout</a></li>
    <?php endif ?>
</ul>