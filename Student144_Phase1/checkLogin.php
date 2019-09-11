<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $check = false;
  $information = fopen("user_information.txt", "r");
  while (!feof($information)) {
    $content = explode(":", rtrim(fgets($information, 1024)));
    if ($username == $content[0] && ($password) == $content[1]) {
		 $check = true;
         break;
    }
  }
  fclose($information);
$problem = "";
  if ($check) {
	 $problem = "";
	 $url = "Location: index.php";
	 header($url);
	 $_SESSION["username"] = $username;
	}
  else {
	 $problem = "invalid";
	 $url = "Location: login.php?problem=$problem";
	 header($url);
  }
	}

else {
	 $url = "Location: index.php?";
	 header($url);
}
?>