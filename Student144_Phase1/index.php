<?php 
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
$name = $_SESSION["username"];
$loginDetail = "Login";
$loginURL = "login.php";
if ($name != "") {
	$loginDetail = "Logout";
	$loginURL = "checkLogout.php?redirected=index";
	$name = "Welcome " . $name . "!";
}
else {
	$loginDetail = "Login";
	$loginURL = "login.php";
	$name = " ";
}
?>
<!doctype html>
<!--Student144 | Period 6 | Phase 3-->
<html lang="en">

<head>
  <title>Stamp World.</title>
  <meta charset="UTF-8">
  <meta name="description" content="Stamp World. Here you can find information about unique stamps all around the world that might guide you through your stamp journey.">
  <meta name="keywords" content="Stamp, Stamps, Collection, Hobby, Collections, Information, Database">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="font.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" href="images/favicon.png">
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <link rel="stylesheet" href="styleCheck.css">

 <script>
 //the following is to position the nav button right next to the side nav when resizing the window
 var check = "hidden";
 function beforeTranslate(){
	if (check=="shown"){
	var navWidth2 = document.getElementById("sideNav").offsetWidth;
	var nav2 = document.getElementById("sideNav"),
		button2 = document.getElementById("checkButton");
	button2.style.transform = "translate(" + navWidth2 + "px)";
	}
}
//the following is to show and hide the side navigation bar
function toggleNavBar(){
	var navWidth = document.getElementById("sideNav").offsetWidth;
	var nav = document.getElementById("sideNav"),
		button = document.getElementById("checkButton");
	if (check == "hidden"){
		nav.style.transform = "translate(0px)";
		button.style.transform = "translate(" + navWidth + "px)";
		check = "shown";
	}
	else if (check == "shown"){
		nav.style.transform = "translate(-290px)";
		button.style.transform = "translate(0px)";
		check = "hidden";
	}
}

//the following JavaScript code is to insert the extra-information material if clicked by user; done by replacing the text itself
    var checkMore = "False"; //to check whether the extra text is added or not

    function toggleText() {
      var lessText = "Stamps might not be a big part in our modern day life, but it was one of the most important things for some one to communicate with another before e-mails or cell phones were introduced (or before they became common in everyday life). It was one of the most important ways through which the government got revenue and through which people were, in a way, express their feelings through different stamps. It was a big deal to get a stamp that was newly released or was declared to be only produced in few amount, so the race for stamp collection started way before it became extinct, and is still going on.";
      var moreText = " It started as a sportive thing to do, like as a hobby, but over the course of two-three decades, those ancient stamps were worth a lot because of their rareness. Of course one can simply replicate the stamps and sell them for low cost (some even cheat by selling them as the real ones!), but business people see these trades seriously; they have teams that study those stamps, who verify the validity of the specific stamp, before buying it. Why? Well their cost would eventually increase over time, which is a profit for the buyer, and it is also a way to showcase their wealth.";

	  //triggered when the user clicks on the underlined text, appearing as a link button
      if (checkMore == "False") {
        document.getElementById("text_area").innerText = lessText + moreText;
        document.getElementById("toggler").innerText = "Show Less-";
        checkMore = "True";
				//the above code adds the new information, sets the checker to True and changes the text button to Show Less
      } else if (checkMore == "True") {
        document.getElementById("text_area").innerText = lessText;
        document.getElementById("toggler").innerText = "Show More+";
        checkMore = "False";
				//the above code removes the new information, sets the checker to False and changes the text button to Show More
      }
    }
//end more/less text code

//this following code checks the scroll position of the document, and if it is more than 100, the small header is displayed while the big is hidden, and vice versa if the scroll position is less than or equal to 100
    function smallHeaderSet() {
      var yPosition = window.pageYOffset,
        bigHeader = document.querySelector("header"), //selects the whole header
        smallHeader = document.getElementById("headerSmall"), //selects the whole small header set
        positionLimit = 100;
      if (yPosition > positionLimit) {
        smallHeader.style.display = "block";
        bigHeader.style.display = "none";
      } else if (yPosition <= positionLimit) {
        smallHeader.style.display = "none";
        bigHeader.style.display = "block";
      }
    }
    window.addEventListener("scroll", function(e) {
      smallHeaderSet();
    }); //this code checks for the scroll position and initiated if changed
//end the small/big header code

//This following function is using jQuery to accomplish the hover over effect in the last section with images, where text shows up is mouse enters (hovers) the image
    $(document).ready(function() {
      $("#checking").mouseenter(function() {
        $("#checking .checktext").fadeIn(450);
      });
      $("#checking").mouseleave(function() {
        $("#checking .checktext").fadeOut(200);
      });

      $("#checking2").mouseenter(function() {
        $("#checking2 .checktext").fadeIn(450);
      });
      $("#checking2").mouseleave(function() {
        $("#checking2 .checktext").fadeOut(200);
      });

      $("#checking3").mouseenter(function() {
        $("#checking3 .checktext").fadeIn(450);
      });
      $("#checking3").mouseleave(function() {
        $("#checking3 .checktext").fadeOut(200);
      });

      $("#checking4").mouseenter(function() {
        $("#checking4 .checktext").fadeIn(450);
      });
      $("#checking4").mouseleave(function() {
        $("#checking4 .checktext").fadeOut(200);
      });

      $("#checking5").mouseenter(function() {
        $("#checking5 .checktext").fadeIn(450);
      });
      $("#checking5").mouseleave(function() {
        $("#checking5 .checktext").fadeOut(200);
      });
    });
// End the hover jQuery
 </script>
   
  <style>
  <!--very specific small CSS for this document-->
    #toggler {
      text-decoration: underline;
    }
    #toggler:hover {
      cursor: pointer;
    }
  </style>
 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69880928-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body onresize = "beforeTranslate()">
<div id="navButton">
<button id="checkButton" class="c-hamburger c-hamburger--htx" onclick="toggleNavBar()">
  <span>toggle menu</span>
</button>
</div> <!--nav button-->
<script>
//This section is also driven from callmenick.com (cited) is used to change the shape of the nav button
  (function() {

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
      var toggle = toggles[i];
      toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
      toggle.addEventListener( "click", function(e) {
        e.preventDefault();
        (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
      });
    }

  })();

$(function() {
    $(window).bind("resize", function()
    {
        resizeMe();
        }).trigger("resize");
    });

	function resizeMe(){
	//Standard height, for which the body font size is correct
var preferredHeight = 24;
var preferredHeightNav = 127;
//Base font size for the page
var fontsize = 3;
var widthOfPage = $(window).width();
	if (widthOfPage <= 1067){
		preferredHeightNav = 130;
	}
	if (widthOfPage <= 993){
		preferredHeightNav = 133;
	}
	if (widthOfPage <= 760){
		preferredHeight = 27;
		preferredHeightNav = 135;
	}
	if (widthOfPage <= 596){
		preferredHeight = 32;
		preferredHeightNav = 150;
	}
var displayHeight = $(window).height();
var percentage = displayHeight / preferredHeight;
var percentageNav = displayHeight / preferredHeightNav;
var newFontSize = Math.floor(fontsize * percentage) - 1;
var newFontSizeNav = Math.floor(fontsize * percentageNav) - 1;
$("#mainHeading").css("font-size", newFontSize);
$("#sideNav").css("font-size", newFontSizeNav);
}
</script>
<div id = "sideNav">
<p id="navLogo">SW.</p>
<p style="font-size: 2.3em; text-align:center;"><?php echo $name ?></p>
<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="collection.php">Stamp Collection</a></li>
		<li><a href="<?php echo $loginURL ?>"><?php echo $loginDetail ?></a></li>
		<li><a href="about.php">About</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</nav>
</div><!--side Nav-->
<!--big header-->
    <header>
      <h1 id="mainHeading">Stamp World.</h1>
    </header>
<!--close Big header-->

<!--Small Header-->
    <div id="headerSmall">
      <div id="hOneSmall">Stamp World.</div>
    </div>
<!--close small header-->

      <div id="background_one">
        <div class="small_head">Stamps.</div>
        <br>
        <br>
        <span id="text_area">Stamps might not be a big part in our modern day life, but it was one of the most important things for some one to communicate with another before e-mails or cell phones were introduced (or before they became common in everyday life). It was one of the most important ways through which the government got revenue and through which people were, in a way, express their feelings through different stamps. It was a big deal to get a stamp that was newly released or was declared to be only produced in few amount, so the race for stamp collection started way before it became extinct, and is still going on.</span>  <span style="text-decoration: underline;"><a id="toggler" onClick="toggleText()">See More+</a></span>
        <!--this is where the extra text is added or removed-->
      </div>      <!--bg 1-->

      <div id="background_two">
        <div class="small_head">What is this Website?</div>
        <br>
        <br>
        <span style="margin-left: 1%; margin-right: 1%;">
We, the people of <em>Stamp World.</em>, provide the rarest, best of the best, and unique postage stamps to our customers at the best price. We have been on the field for 15 years and have gained a lot of trust from our customers, who have helped us grow in those years, making us extend to other products and clients.
</span>
      </div>      <!--bg 2-->

      <div id="background_three">
        <div class="small_head">Why Trust Us?</div>
        <br>
        <br>
        <div id="first_left" style="font-size: 1.23em;"> <!--Left-Floating element-->
          There are thousands of websites out there that sell stamps to the public, and there are people who auction the stamps, and then there are the swindlers. We are certified dealers of stamps (certified pawn dealers to be specific) and have a lot of experience
          since we started 15 years ago; from a small business just meant for stamp collectors to a huge dealer of many unique items, all of which wouldn't have happened without our customer's trust and support.
        </div>
        <div id="first_right" style="font-size: 1.23em;"> <!--Right-Floating element-->
          We give all our customers a limited time through which they can return the purchased product (undamaged or changed in any way) if they are not happy with it. We guarantee the product's originality along with a brief detail of its background/history. We
          make sure that what we provide is legit with our consultants before selling them, and by any chance if the product is found to be a counterfeit or replica with evidence*, a check of $500.00 is given as a compensation.
          <br>Our customer's happiness is our happiness.
        </div>
      </div>      <!--bg 3-->
	  
      <div id="background_four">
        <div class="small_head">Still Curious?</div>
        <br>
        <br>
			<!--Each checking* id is different for each image to set different margin-left and for the mouse over element; checktext is unchanged as it for the display mouse over text-->
	<div id="container_Checking">
        <div id="checking">
          <img src="images/penny_black_stamp.jpg" alt="Queen Victoria Stamp" height="200">
          <div class="checktext"><strong>Penny Black <br> $3,000.00 USD (unused)</strong>
            <br>
            <br>The first stamp in the world! Most valued if it's unused. Produced in Great Britain on 1 May 1840 and has a picture of Queen Victoria. It's face value at its time was 1 penny (UK).</div>
        </div>

        <div id="checking2">
          <img src="images/Hawaiian_Missionary_stamps.jpg" alt="Hawaiian Missionary stamps" height="200">
          <div class="checktext"><strong>Hawaii Missionary Stamps<br>$100,000.00 USD (unused set)</strong>
            <br>The first set of stamps in Hawaii. Called missionary because it was mostly used by missionaries when it was produced in 1851. It's face value at its time was 2 cents.</div>
        </div>

        <div id="checking3">
          <img src="images/Dag_Hammarskjold_invert.jpg" alt="Dag Hammarskjold stamps" height="200">
          <div class="checktext"><strong>1962 Dag Hammarskjold "Error Stamp"<br><br>Cost depends on quality</strong>
            <br>Stamps similar to this exist, but this is unique because of the error made in 2 of its sheets in 1962, U.S. (the yellow background was inverted).</div>
        </div>

        <div id="checking4">
          <img src="images/Inverted_Jenny_airmail_stamp.jpg" alt="Inverted Jenny airmail stamp" height="200">
          <div class="checktext"><strong>The U.S. "Inverted Airmail" Stamp<br><br>$42,500.00 (unused)</strong>
            <br>These stamps are unique because only the airplane part was accidentally printed upside-down, giving its uniqueness. Its face value is 24 cents.</div>
        </div>

        <div id="checking5">
          <img src="images/Treskilling_yellow_rare_stamp.jpg" alt="Treskilling yellow stamp" height="200">
          <div class="checktext"><strong>Treskilling Yellow [rare]<br>$2.88 million Swiss Franc (unused)</strong>
            <br>The most expensive collector stamps! It is also known for its mistaken printing: usually in green color, only few exist in yellow color. Face value is 3 Swedish skillings.</div>
        </div>
	</div>
      </div>      <!--bg 4-->
    <footer>
      <div id="footerText">
        <a href="validation/citation.pdf" target= "_blank">Citations</a>
        <br>Copyright &copy; owned by Student144 of Seminole State College and Crooms AoIT
      </div>
    </footer>
</body>
</html>