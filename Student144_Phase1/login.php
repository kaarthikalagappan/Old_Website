<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
$problem = $_GET["problem"];
$errorMessage = "ERROR: ";
if ($problem == "invalid") {$errorMessage = $errorMessage . "Invalid username and/or password";}
else if ($problem == "notLogged") {$errorMessage = $errorMessage . "Please login first";}
else if ($problem == "illegal") {$errorMessage = $errorMessage . "Unauthorized access";}
else if ($problem == "created") {$errorMessage = "User created! Now please login.";}
$name = $_SESSION["username"];
$loginDetail = "Login";
$loginURL = "login.php";
if ($name != "") {
	$loginDetail = "Logout";
	$loginURL = "checkLogout.php";
	$name = "Welcome, " . $name;
	$url = "Location: checkLogout.php";
	header($url);
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
  <title>Contact.</title>
  <meta charset="UTF-8">
  <meta name="description" content="Stamps World. Login">
  <meta name="keywords" content="Stamp, Stamps, Login, Register">
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

//contact form validation/citation
function validateForm() {
	var name = document.forms["LogIn"]["username"].value;
	var password = document.forms["LogIn"]["password"].value;
	if (name == null || name == "" || name == " ") {
		alert("The username field should be completed");
        return false;
	}
	else if (password == null || password == "" || password == " ") {
		alert("The password must be entered");
        return false;
	}
}
 </script>
<style>
footer {
	margin-top: 54.98vh;
}
input, textarea{
	 padding:.4%;
	 border: 1px dashed #37CC00;
}
#submit {
	width: 10%;
	margin: 0 auto;
	text-align: center;
	background-color: #55FFAE;
}
#registerNow a{
	text-decoration: none;
	background-color: #FFFF3D;
	color: #000000;
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
<div id="containerMain">
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
var preferredHeightNav = 123;
//Base font size for the page
var fontsize = 3;
var widthOfPage = $(window).width();
	if (widthOfPage <= 760){
		preferredHeight = 27;
	}
	if (widthOfPage <= 596){
		preferredHeight = 32;
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
        <div class="small_head">Login.</div>
		<br><br> 
				<div id="logInSection">
				<?php if($problem != "") { print($errorMessage);} ?>
					<form method="post" name="LogIn" action="checkLogin.php"><br>
						Username: <input type="text" name="username"><br><br>
						Password: <input type="password" name="password"><br><br>
						<input type="submit" name="submit" id="submit" value="Login" style="border:none;" onclick="return validateForm()">
					</form>
				</div> <br>
			<span style="font-size: 1.3em; font-weight: bold;" id="registerNow">Not a user? <a href="register.php">Register now!</a> It's free!</span>
		<br>
      </div>      <!--bg 1-->
</div><!--containerMain-->
    <footer>
      <div id="footerText">
        <a href="validation/citation.pdf" target= "_blank">Citations</a>
        <br>Copyright &copy; owned by Student144 of Seminole State College and Crooms AoIT
      </div>
    </footer>
</body>
</html>