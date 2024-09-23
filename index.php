<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Music mangment</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.error').delay(1200).fadeOut('normal');
    $('.success').delay(1200).fadeOut('normal');    
});
</script>
<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ($active.length == 0) $active = $('#slideshow DIV:last');

    var $next = $active.next().length ? $active.next() : $('#slideshow DIV:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval("slideSwitch()", 5000);
});
</script>

<!--CSS Style-->
<style type="text/css">
#slideshow {
    position: relative;
    height: 272px;
}

#slideshow DIV {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 8;
    opacity: 0.0;
    height: 272px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index: 10;
    opacity: 1.0;
}

#slideshow DIV.last-active {
    z-index: 9;
}

#slideshow DIV IMG {
    height: 272px;
    width: 630px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}

.news_content ul { padding: 0px; margin: 0px; }
.news_content ul li {
    padding-top: 10px;
    padding-left: 5px;
    list-style: none;
    font-size: 11px;
}
.news_content ul li a {
    text-decoration: none;
    color: #7E7E7E;
    font-family: Georgia, "Times New Roman", Times, serif;
}
.news_content ul li a:hover {
    text-decoration: underline;
    color: #09F;
}
#table {
    color: #7E7E7E;
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 11px;
}

#apDiv1 {
    position: absolute;
    width: 630px;
    height: 272px;
    z-index: 1;
    border: 1px solid #FFF;
    left: 31px;
    top: 23px;
}
</style>
</head>

<body>

<div class="header_wrapper">
    <div class="login">
        <?php
        $today = date('F j, Y');
        echo '&nbsp;Today is '.$today;
        ?>
        &nbsp;&nbsp;&nbsp;<a href="Frontend/FeedbackForm.php" id="fback">Submit Feedback</a>
        <ul>
            <li><a href="loginpage.php">Admin Login</a></li>                
        </ul>
    </div>
</div>
<!--Start Menu-->
<div class="header_menu">
    <div class="menu">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="Frontend/Albums.php">ALBUMS</a></li>
            <li><a href="Frontend/Licensing.php">LICENSING</a></li>
            <li><a href="Frontend/Songs.php">VOTE</a></li>
            <li><a href="Frontend/AboutUs.php">ABOUT US</a></li>   
            <li><a href="Frontend/News.php">NEWS</a></li>
        </ul>
    </div>
</div>

<div class="container_wrapper">
    <div class="home_content">
        <div class="banner">
            <div id="apDiv1">
                <div id="slideshow">
                    <div class="active">
                        <img src="image/Callalily.jpg" alt="Slideshow Image 1" />
                    </div>
                    <div>
                        <img src="image/kmkz.jpg" alt="Slideshow Image 2" />
                    </div>
                    <div>
                        <img src="image/slapshock.jpg" alt="Slideshow Image 3" />
                    </div>
                    <div>
                        <img src="image/updharmadown.jpg" alt="Slideshow Image 4" />
                    </div>
                </div>
            </div>
        </div>

        <div class="vote_container">
            <form id="vote" name="vote" method="post" action="vote.php">
                <div class="header_vote">
                    <div id="header_vote_title">Community Poll Survey</div>
                    <div id="message">Please Vote for your favorite Waray song genre listed below.
                        <a href="ShowVoteStat.php" id="link">See Statistic here!</a>
                    </div>
                    <br />
                    <?php
                    require_once('Administrator/PHP/connect.php');
                    $getVote = mysqli_query($conn, "SELECT * FROM tblvotes"); // Replace mysql_query with mysqli_query
                    while ($row = mysqli_fetch_array($getVote)) {
                    ?>
                        <input type="radio" name="id" value="<?php echo $row['vid'] ?>" />&nbsp;
                        <label><?php echo $row['vname'] ?></label><br />
                    <?php } ?>
                    <input type="submit" value="Vote" id="vote" name="vote" />
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 1) {
                    ?> 
                        <div class="error">Wait after 24 hours</div> 
                    <?php 
                    }
                    if (isset($_GET['success']) && $_GET['success'] == 1) {
                    ?>
                        <div class="success">Thank you</div> 
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    <!--Other content here...-->
</div>

<div class="footer_wrapper">
    <div class="footer_menu">
        <ul>
            <li>Find us at the <a href="Frontend/Contacts.php">Music Mangment</a> or <a href="Frontend/Contacts.php">contact us</a> for more information.</li>  
        </ul>
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;Music, Inc.</span>
    </div>
</div>

</body>
</html>
