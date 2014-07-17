<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Pingo - PHP Project 01 | Register</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/skin.css"/>
    <script type="text/javascript" src="javascript/cufon-yui.js"></script>
    <script type="text/javascript" src="javascript/font.font.js"></script>
    <script type="text/javascript">
        Cufon.replace('h1, h2, h3, h4, h5, h6', {
            hover: true
        });
    </script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
    <div id="header" class="box">
        <h1 id="logo">Pingo<span>Project</span> 01</h1>
        <?php include('./views/menu.php'); ?>
    </div>
    <div id="section" class="box">
        <div id="content">
            <h2>Registration</h2>
            <?php if ($success === true) : ?>
                <div>You have successfully registered for new account. Please click <a href="login.php">here</a> to login.</div>
            <?php else : ?>
                <?php if ($errorMsg != '') : ?>
                    <div><span style="color: red; font-style: italic;"><?php echo $errorMsg;?></span></div>
                <?php endif ?>
                <form action="register.php" method="post" class="form">
                    <ul>
                        <li>
                            <label for="input-01">Username (required):</label>
                            <input type="text" size="45" class="input-text" id="txtUsername" name="txtUsername"/>
                        </li>
                        <li>
                            <label for="input-01">Password (required):</label>
                            <input type="password" size="45" class="input-text" id="txtPassword" name="txtPassword"/>
                        </li>
                        <li>
                            <label for="input-01">Confirm password (required):</label>
                            <input type="password" size="45" class="input-text" id="txtConfirmPassword" name="txtConfirmPassword"/>
                        </li>
                        <li>
                            <label for="input-01">Your Name (required):</label>
                            <input type="text" size="45" class="input-text" id="txtFullname" name="txtFullname"/>
                        </li>
                        <li>
                            <label for="input-02">E-mail Address (required):</label>
                            <input type="text" size="45" class="input-text" id="txtEmail" name="txtEmail"/>
                        </li>
                        <li>
                            <label for="input-04">About me (required):</label>
                            <textarea cols="75" rows="10" class="input-text" id="txtAboutme" name="txtAboutme"></textarea>
                        </li>
                        <li>
                            <input type="submit" value="Register" class="input-submit" name="btnRegister"/>
                            <input type="reset" value="Clear" class="input-submit"/>
                        </li>
                    </ul>
                </form>
            <?php endif ?>
        </div>
        <div id="aside">
            <form action="#" method="get" id="search">
                <p>
                    <input type="text" size="20" class="input-text" value="Search our website"
                           onfocus="if(this.value=='Search our website') this.value=''"/>
                    <input type="submit" value="Search" class="input-submit"/>
                </p>
            </form>
            <h3>Sidebar Menu</h3>
            <ul class="menu">
                <li><a href="#">Discussion</a></li>
                <li><a href="#">Authors</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <h3>About</h3>

            <p class="box"><img src="tmp/about-01.jpg" alt="" class="f-left"/> My name is Jessie Doe. I´m 26 years old
                and I´m living in the New York City.<br/>
                <a href="#">More about me</a></p>

            <h3 class="nomb">Sponsors</h3>
            <ul class="sponsors">
                <li><a href="#">Lorem ipsum dolor</a><br/>
                    Donec libero. Suspendisse bibendum
                </li>
                <li><a href="#">Dui pede condimentum</a><br/>
                    Phasellus suscipit, leo a pharetra
                </li>
                <li><a href="#">Condimentum lorem</a><br/>
                    Tellus eleifend magna eget
                </li>
                <li><a href="#">Donec mattis</a><br/>
                    purus nec placerat bibendum
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="footer">
    <div class="main box">
        <p class="f-right t-right"><a href="http://all-free-download.com/free-website-templates/">Free CSS Templates</a>
            by <a href="http://www.templatesdock.com/">TemplatesDock</a></p>

        <p class="f-left">Copyright &copy;&nbsp;2010 <a href="#">SimpleMagazine</a></p>
    </div>
</div>
<script type="text/javascript">Cufon.now();</script>
<!-- END PAGE SOURCE -->
<div align=center>This template downloaded form <a href='http://all-free-download.com/free-website-templates/'>free
        website templates</a></div>
</body>
</html>
