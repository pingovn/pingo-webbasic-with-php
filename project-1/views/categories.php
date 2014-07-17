<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Pingo - PHP Project 01 | Categories</title>
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
            <h1>Heading H1</h1>

            <h2>Heading H2</h2>

            <h3>Heading H3</h3>
            <h4>Heading H4</h4>
            <h5>Heading H5</h5>
            <h6>Heading H6</h6>

            <p class="box"><img src="tmp/article-01.jpg" alt="" class="f-left"/>Suspendisse posuere, metus eget pharetra
                adipiscing, arcu velit lobortis augue, quis pharetra mauris ante a velit. Duis feugiat, odio a mattis
                gravida, velit est euismod urna, vitae gravida elit turpis sit amet elit. Phasellus ac hendrerit tortor.
                Aliquam erat volutpat. Donec laoreet viverra sapien et luctus. Cras fringilla commodo nulla sit amet
                congue. Donec aliquam gravida elit, in fringilla urna adipiscing in. Sed vel risus id urna luctus
                eleifend. Morbi ut fringilla magna. Curabitur lobortis molestie tellus ac ultricies. Maecenas tempus
                rutrum mauris in auctor. Ut interdum diam a justo malesuada dignissim.</p>

            <h2>List</h2>
            <ul class="ul">
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet
                    <ul>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet
                            <ul>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                </li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
                <li>Lorem ipsum dolor sit amet</li>
            </ul>
            <h2>Table</h2>
            <table class="table">
                <tr>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                    <th>Header</th>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                </tr>
                <tr class="even">
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                </tr>
                <tr class="even">
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                    <td>Cell</td>
                </tr>
            </table>
            <h2>Image gallery</h2>
            <ul class="gallery box">
                <li><a href="#"><img src="tmp/gallery-01.jpg" alt=""/></a></li>
                <li><a href="#"><img src="tmp/gallery-02.jpg" alt=""/></a></li>
                <li><a href="#"><img src="tmp/gallery-03.jpg" alt=""/></a></li>
            </ul>
            <h2>Form</h2>

            <form action="#" method="post" class="form">
                <ul>
                    <li>
                        <label for="input-01">Your Name (required):</label>
                        <input type="text" size="45" class="input-text" id="input-01"/>
                    </li>
                    <li>
                        <label for="input-02">E-mail Address (required):</label>
                        <input type="text" size="45" class="input-text" id="input-02"/>
                    </li>
                    <li>
                        <label for="input-03">Website:</label>
                        <input type="text" size="45" class="input-text" id="input-03"/>
                    </li>
                    <li>
                        <label for="input-04">Your Message (required):</label>
                        <textarea cols="75" rows="10" class="input-text" id="input-04"></textarea>
                    </li>
                    <li>
                        <input type="submit" value="Submit" class="input-submit"/>
                    </li>
                </ul>
            </form>
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
