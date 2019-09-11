<?php 
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
$name = $_SESSION["username"];
$loginDetail = "Login";
$loginURL = "login.php";
if ($name != "") {
	$loginDetail = "Logout";
	$loginURL = "checkLogout.php?redirected=collection";
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
  <title>Stamp Collection.</title>
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

var checkXMLButton = "hidden";
function buttonXML() {
	if (checkXMLButton == "hidden") {
		displayXML();
		checkXMLButton = "shown";
		document.querySelector("footer").style.marginTop = "0vh";
	}
	else if (checkXMLButton == "shown"){
		document.getElementById("XMLInformation").innerHTML = "";
		checkXMLButton = "hidden";
		document.querySelector("footer").style.marginTop = "47.75vh";
	}
}
//the following code is modified version that is available from W3C (http://www.w3schools.com/xml/tryit.asp?filename=tryxml_display_table) 
function displayXML() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { //4 means that the request is finished and has been loaded while 200 means that the execution is a success - main reason why it works only when uploaded to server
      myFunction(xmlhttp); //calls in myFunction with xmlhttp as the parameter
    }
  }
  xmlhttp.open("GET", "collection.xml", true); //gets the XML document
  xmlhttp.send(); //sends the request to the server to get the xml file
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML; //xml is xmlhttp from the previous function. xmlDoc is the XML document itself that is given by the server through xmlhttp.send
  var table="<tr><th>Stamp Name</th><th>Price</th><th>Year</th><th>Country</th><th>Facevalue</th><th>Description</th></tr>"; //sets the base of the table head
  var x = xmlDoc.getElementsByTagName("Stamp"); //gets everything under each Stamp tag from the XML document
  for (i = 0; i <x.length; i++) { //created the variable i, which is set to the number of 'Stamp' tags available. Then it acts as a parameter which specifies individual stamp tag through which each element (tag, price) is retrieved. Then i is incremented by 1 after it loops one time until it goes through all Stamp tags
    table += "<tr><td>" +
    x[i].getElementsByTagName("Title")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("Price")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("Year")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("Country")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("FaceValue")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("Description")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("XMLInformation").innerHTML = table; //writes the whole code between the table tags, which is then read by HTML as a normal table set and is displayed as a table.
}
 </script>

<style>
 
table,th,td {
  border : 0px;
  border-radius: 5px;
  font-size: .94em;
  font-weight: bold;
  font-family: Caviar, Arial, sans-serif;
}
table{
	margin-bottom: 3vh;
}
th,td {
  padding: 10px;
}
th{
	background-color: #FF87BA;
}
td{
	background-color: #B1FF7F;
}
tr:hover{
	background-color: #000000;
}
#background_one button{
font-size: 1.1em;
border-radius: 4.9px;
border: 0px;
height: 30px;
box-shadow: 1px 1px 5px #000000;
background-color: #B1EDE8;
text-align: center; 
margin-top: 5vh;
}
figure img{
	border: 1px solid black;
}
footer {
	margin-top: 47.75vh;
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
<div>
<p style="margin-top: 23vh;">Welcome to our collection! You will be able to view our description to different sets of stamps and their cost, description, worth-value, and their country of origin. These are few of the most unique and rare stamps and their details will help you when buying one of the listed stamp or will act as a guide while buying new stamps. Proceed below to the table with information by clicking the button.</p>
<div>
<figure>
<p style="font-size: 1.1em; font-style: italic;">Fun Fact:</p><img src="images/British_Guiana_13.jpg" alt="British 1-Cent Guiana Stamp" width="300">
<figcaption>British 1-Cent Guiana Stamp: This is considered as the rarest stamp in the world. <br>It was put up for sale at the record breaking cost of $9,500,000.00!</figcaption></div>
</figure>
	<button type="button" onclick="buttonXML()">Most Unique Stamp Collection (Data)</button> <br> <br>
</div>
<br><br>
<table id="XMLInformation"></table>
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